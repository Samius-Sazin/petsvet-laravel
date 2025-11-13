Sure 👍 Here’s a simpler and cleaner version — same content, just straightforward and easy to follow:

---

````markdown
# PetsVet Laravel Project

## Steps to Run

### 1. Start Services
- Open **XAMPP**
- Start **Apache** and **MySQL**

---

### 2. Get the Project
If not created yet:
```bash
composer create-project laravel/laravel pets-vet
````

Or clone from GitHub:

```bash
git clone https://github.com/Samius-Sazin/petsvet-laravel.git
```

Open the project in **VS Code**.

---

### 3. Environment Setup

Edit the `.env` file:

```env
FONT_AWESOME_KIT=Your_kit_from_fontwasome

APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:WEoLPi5goNy2niu1QkzPBM3J/vy9fwNOBFblI6WLUj4=
APP_DEBUG=true
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

PHP_CLI_SERVER_WORKERS=4

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=petsvet
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
# CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"
```

---

### 4. Install Dependencies

```bash
composer install
npm install
```

---

### 5. Run Development Servers

Laravel:

```bash
php artisan serve
```

Vite (for frontend assets):

```bash
npm run dev
```

---

### 6. Database Setup

Create the database `pets_vet` in **phpMyAdmin**.

Then run:

```bash
php artisan migrate --seed
```

---

### 7. Useful Commands

| Command                                      | Purpose                   |
| -------------------------------------------- | ------------------------- |
| `php artisan list`                           | Show all Artisan commands |
| `php artisan make:controller NameController` | Create controller         |
| `php artisan make:model Name -m`             | Create model + migration  |
| `php artisan config:clear`                   | Clear config cache        |

---

### 8. Common Files

| File/Folder           | Description                       |
| --------------------- | --------------------------------- |
| `public/index.php`    | Entry point                       |
| `resources/views/`    | Blade templates                   |
| `database/factories/` | Seed data templates               |
| `storage/`            | App and framework generated files |

---

### 9. Recommended VS Code Extensions

* PHP (devsense)
* Laravel Blade Snippets
* Laravel Blade Formatter
* Laravel Goto View
* Auto Rename Tag
* Highlight Matching Tag
* Prettier
* IntelliSense for CSS
* Tailwind CSS IntelliSense
* Material Icon Theme

---

### Notes

* For **Bootstrap**, use your kit link in `.env`.
* Run `php artisan config:clear` if you edit `.env`.

```

---