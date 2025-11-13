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
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pets_vet
DB_USERNAME=root
DB_PASSWORD=
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