# PetsVet (Laravel)

A Laravel 12 + Vite/Tailwind powered web app for a pet care community. It includes articles, Q&A, community posts, products, consultancy, and profile management with media uploads via Cloudinary and optional Firebase-based login.

## Overview
- Laravel 12 (PHP 8.2)
- Vite 7, TailwindCSS 4, Bootstrap 5 (runtime styles)
- Cloudinary PHP SDK + Cloudinary Laravel package
- Socialite (optional) and Firebase login endpoint
- Dockerized for deployment; Render-friendly setup

## Tech Stack
- **Backend:** `php:^8.2`, `laravel/framework:^12.0`
- **Storage/Media:** `cloudinary/cloudinary_php`, `cloudinary-labs/cloudinary-laravel`
- **Frontend:** `vite`, `laravel-vite-plugin`, `tailwindcss`, `bootstrap@5`
- **Utilities:** `orangehill/iseed` (DB seeding), `laravel/pint` (code style), `phpunit` (tests)

## Features
- Articles with likes and recent listing on home
- Community posts with likes/comments
- Q&A (ask/answer/upvote) with auth protection where needed
- Products listing + details
- Consultancy page with contact actions (WhatsApp/Facebook)
- Profile management and role updates (admin-only)
- Cloudinary uploads for user profile, posts, articles, products
- Secure-by-default setup for HTTPS behind proxies (Render)

## Project Structure
Key folders:
- `app/Http/Controllers/` — controllers like `ArticleController`, `PostController`, `ProductController`, `QnaController`, `UserController`
- `app/Services/` — services like `CloudinaryService`, `ProfileStatsService`
- `resources/views/` — Blade views (`pages`, `components`, `common`)
- `routes/web.php` — web routes
- `config/` — app, cloudinary, session, etc.
- `database/migrations` — schema migrations
- `docker/start.sh` — container startup script (permissions + serve)
- `Dockerfile` — PHP-FPM based image with extensions and Composer

## Local Development
Prereqs: PHP 8.2+, Composer, Node 18+, npm.

1) Install dependencies and set up env
```powershell
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate --force
npm install
```

2) Run dev servers (PHP + Vite)
```powershell
# Start Laravel + queue + logs + Vite via composer script
composer run dev

# Or manually
php artisan serve
npm run dev
```

3) Build assets (production)
```powershell
npm run build
```

## Environment Variables
Set these in `.env` locally and in your hosting environment (Render):

- Core
  - `APP_NAME=PetsVet`
  - `APP_ENV=production` (or `local`)
  - `APP_DEBUG=false`
  - `APP_URL=https://your-domain.com`
  - `APP_KEY=` (generated via `php artisan key:generate`)

- Frontend
  - `FONT_AWESOME_KIT=your_kit_id`

- Session & Cookies
  - `SESSION_DRIVER=database` (recommended)
  - `SESSION_SECURE_COOKIE=true` (on HTTPS)
  - `SESSION_DOMAIN=.your-domain.com` (optional for subdomains)

- Cloudinary
  - `CLOUDINARY_CLOUD_NAME=...`
  - `CLOUDINARY_API_KEY=...`
  - `CLOUDINARY_API_SECRET=...`
  - Optional: `CLOUDINARY_URL=cloudinary://KEY:SECRET@CLOUD_NAME`
  - Optional: `CLOUDINARY_UPLOAD_PRESET`, `CLOUDINARY_UPLOAD_ROUTE`, `CLOUDINARY_UPLOAD_ACTION`, `CLOUDINARY_NOTIFICATION_URL`

- Firebase (optional login endpoint)
  - `FIREBASE_API_KEY=...`
  - `FIREBASE_AUTH_DOMAIN=...`
  - `FIREBASE_PROJECT_ID=...`
  - `FIREBASE_STORAGE_BUCKET=...`
  - `FIREBASE_MESSAGING_SENDER_ID=...`
  - `FIREBASE_APP_ID=...`

- HTTPS forcing (recommended in production)
  - `FORCE_HTTPS=true`

## Database & Migrations
Run migrations and seeds:
```powershell
php artisan migrate --force
php artisan db:seed --force
```

## Media Uploads (Cloudinary)
- Config keys: `config/app.php` under `'cloudinary'`, plus `config/cloudinary.php`
- App service wrapper: `app/Services/CloudinaryService.php`
- Methods:
  - `uploadUserProfileImage($file, $folder)`
  - `uploadProductImages($files, $productName, $folder)`
  - `uploadArticleImage($file, $articleTitle, $folder)`
  - `uploadPostImage($file, $userId, $folder)`

Ensure valid env keys and that the incoming files are real file uploads (use `$file->getRealPath()` as implemented).

## Routing Summary
See `routes/web.php`. Highlights:
- Public: `/`, `/about`, `/articles`, `/community`, `/consultancy`, `/privacy-and-policy`, `/products`, `/product/{id}`, `/qna`
- Auth: `/auth/firebase-login`, `/logout`
- Protected: `/profile`, updates, QnA actions, likes, comments, add articles
- Admin-only: add products

## HTTPS on Render (Proxy-aware)
To prevent browser warnings like “form is not secure” and ensure secure cookies:

1) Enable TLS for your Render service/custom domain.
2) Set env vars: `APP_URL=https://your-domain.com`, `SESSION_SECURE_COOKIE=true`, optionally `FORCE_HTTPS=true`.
3) Trust proxies and force HTTPS:
   - `app/Http/Middleware/TrustProxies.php` trusts `'*'` and uses `HEADER_X_FORWARDED_ALL`.
   - `app/Providers/AppServiceProvider.php` calls `URL::forceScheme('https')` in production or when `FORCE_HTTPS=true`.
4) Optionally add HSTS middleware to send `Strict-Transport-Security`.
5) Clear caches on deploy:
```powershell
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:clear
```

## Docker (Local/Render)
Image is based on `php:8.2-fpm` with required PHP extensions, Composer, and a startup script.

Build and run locally:
```powershell
docker build -t petsvet-app .
docker run -p 8000:8000 petsvet-app
```

Key files:
- `Dockerfile` — installs deps, copies project, sets up permissions
- `docker/start.sh` — ensures `storage/framework/*`, `bootstrap/cache` exist & writable, optionally runs migrations/seeds, starts server

If you mount volumes from Windows, ensure permissions are handled (the startup script attempts to fix at runtime).

## Frontend (Vite/Tailwind)
- Entry points: `resources/css/app.css`, `resources/js/app.js` via `laravel-vite-plugin`
- Dev: `npm run dev`
- Build: `npm run build`

## Testing
Run test suite:
```powershell
composer test
```
Or directly:
```powershell
php artisan test
```

## Troubleshooting
- **Class not found on Render (case sensitivity):**
  - Ensure PSR-4 path casing matches namespaces (e.g., `app/Services` not `app/services`).
  - Use two-step git rename so Git records case-only changes:
    ```powershell
    git mv app/services app/Services_temp
    git mv app/Services_temp app/Services
    git add -A
    git commit -m "Rename app/services -> app/Services"
    git push
    ```
  - Then: `composer dump-autoload -o` and redeploy.

- **Invalid cache path / compiled views error:**
  - Ensure `storage/framework/{cache,sessions,views}` and `bootstrap/cache` exist & are writable.
  - The `docker/start.sh` script creates and fixes permissions each start.

- **Insecure form submission warning:**
  - Set `APP_URL` to `https://...`, trust proxies, and force HTTPS as above.

## Useful Artisan Commands
```powershell
php artisan migrate --force
php artisan db:seed --force
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:clear
php artisan tinker
```


## Prerequisites

Before running the project, make sure you have installed:

-   **PHP 8.x**
-   **Composer**
-   **Node.js & npm**
-   **MySQL**
-   **XAMPP / Apache** for local server
-   **VS Code** (recommended)

---

## Installation & Setup

### 1. Clone the Project

```bash
git clone https://github.com/Samius-Sazin/petsvet-laravel.git
cd petsvet-laravel
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node Packages

```bash
npm install
```

### 4. Configure Environment

Copy `.env.example` to `.env`:

```bash
cp .env.example .env
```

Update `.env` with your database and other configuration values.

> For Bootstrap, use your kit in the `.env` file.

### 5. Run Laravel Server

```bash
php artisan serve
```

You should see:

```
Server running on http://127.0.0.1:8000
```

### 6. Run Vite Dev Server

```bash
npm run dev
```

Access frontend at:

```
Local: http://localhost:5173/
APP_URL: http://localhost
```

### 7. Database Setup

Run migrations and seeders:

```bash
php artisan migrate
php artisan db:seed
```

---

## Useful Artisan Commands

-   List all commands:

```bash
php artisan list
```

-   Add new config:

```bash
php artisan config:publish
php artisan config:publish configName
```

-   Create a controller:

```bash
php artisan make:controller WelcomeController
```

-   Create a model with migration:

```bash
php artisan make:model Note -m
```

---

## File Structure Overview

```
petsvet-laravel/
├── app/                 # Application logic
│   ├── Http/Controllers
│   ├── Models
│   └── Providers
├── bootstrap/           # Bootstrapping application
│   └── app.php
├── config/              # Configuration files
├── database/            # Migrations, seeders, factories
├── public/              # Public assets & entry point (index.php)
├── resources/           # Views, CSS, JS
├── routes/              # Web & console routes
├── storage/             # Logs, cached files, framework-generated files
├── tests/               # Unit & Feature tests
├── vendor/              # Composer dependencies
├── .env                 # Environment variables
└── artisan              # Laravel CLI
```

**Key Points:**

-   `app.php` → Creates the application instance.
-   `factories/` → Define seed data structure for models.
-   `public/` → Browser-accessible folder.
-   `views/` → Blade templates for frontend.
-   `storage/` → Generated files and logs.

---

## Recommended VS Code Extensions

| #   | Extension Name                           | Publisher          |
| --- | ---------------------------------------- | ------------------ |
| 1   | PHP                                      | devsense           |
| 2   | Laravel Blade Snippets                   | Winnie Lin         |
| 3   | Laravel Blade Formatter                  | Shuhei Hayashibara |
| 4   | Laravel goto view                        | codingyu           |
| 5   | Auto Rename Tag                          | Jun Han            |
| 6   | Highlight Matching Tag                   | vincaslt           |
| 7   | Prettier - Code formatter                | Prettier           |
| 8   | IntelliSense for CSS class names in HTML | Zignd              |
| 9   | Tailwind CSS IntelliSense                | Tailwind Labs      |
| 10  | Material Icon Theme                      | Philipp Kief       |

---

## Notes

-   Ensure Apache and MySQL/XMPP are running before starting the server.
-   Always run `composer install` and `npm install` after cloning the project.
-   Use `npm run dev` for frontend assets hot reload.

- Some important commands
`php artisan route:clear`
`php artisan cache:clear`
`php artisan config:clear`
`php artisan optimize:clear`

- After running these command use this if any problem occurs
`composer require laravel/socialite`


## **PHP.ini Setup for File Uploads & Cloudinary SSL (Windows)**

1. **Locate php.ini**

```bash
php --ini
```

* Look for **Loaded Configuration File** (e.g., `C:\php\php.ini`).

2. **Open php.ini** in VS Code, Notepad++, or any editor.

3. **Increase upload limits**:

```ini
upload_max_filesize = 10M
post_max_size = 10M
memory_limit = 256M
```

4. **Set cURL/OpenSSL certificate** (for Cloudinary SSL):

```ini
curl.cainfo = "C:\path\to\cacert.pem"
openssl.cafile = "C:\path\to\cacert.pem"
```

* Download the certificate here: [https://curl.se/ca/cacert.pem](https://curl.se/ca/cacert.pem)

5. **Save and restart server**:

* `php artisan serve` → stop & start again
* XAMPP/WAMP → restart Apache

6. **Verify changes**:

* Use `phpinfo()` or `php -i` to check:


# 📌 Database Seeding Guide (Using iSeed)

This project uses **iSeed** to generate seed files directly from existing database tables.
This allows all team members to have **exact same sample data** in their local environment.

Install package:
```bash
composer require orangehill/iseed
```

---

## 🚀 How to Generate Seeds (For the Developer Who Has the Data)

Run these commands to export your current DB data:

```bash
php artisan iseed users
php artisan iseed products
```

This will create:

```
/database/seeders/UsersTableSeeder.php
/database/seeders/ProductsTableSeeder.php
```

---

## 📥 How Team Members Should Use the Seeds

After pulling the project:

### 1. Migrate the database

```bash
php artisan migrate
```

### 2. Run the seeders

```bash
php artisan db:seed --class=UsersTableSeeder
php artisan db:seed --class=ProductsTableSeeder
```

Or run all seeders at once (if linked in `DatabaseSeeder.php`):

```bash
php artisan db:seed
```

---

## 🔄 Updating Seed Data Later

If the database changes and you want to update the seed:

```bash
php artisan iseed users --force
php artisan iseed products --force
```

This overwrites old seed files with fresh DB data.


## License
This project uses the default Laravel skeleton license (MIT).
