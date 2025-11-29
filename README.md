# PetsVet Laravel Project
## Project Overview

PetsVet is a Laravel-based web application for managing pet-related services. This project uses Laravel 10, PHP, MySQL, and modern frontend tooling (Vite, Bootstrap).

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

