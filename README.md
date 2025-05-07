
# 🎟️ Ticket Booking System – Setup Instructions

Follow these steps to set up and run the Ticket Booking System on your local machine.

---

## ✅ Prerequisites

Make sure the following are installed on your system:

* PHP (>=8.1 recommended)
* Composer
* Node.js
* npm

---

## ⚙️ Installation Steps

### 1. Clone the Repository

```bash
git clone https://github.com/sharafhusain/EventManagement.git
cd EventManagement
```

### 2. Copy `.env` File

```bash
cp .env.example .env
```

Edit the `.env` file and update the following database credentials:

```env
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 3. Install PHP Dependencies

```bash
composer install
```

### 4. Install JavaScript Dependencies

```bash
npm install
```

### 5. Migrate and Seed the Database

```bash
php artisan migrate:fresh --seed
```

This command:

* Creates all necessary tables
* Seeds the database with:

  * 🧑‍💼 Admin

    * **Email:** `admin@gmail.com`
    * **Role:** `admin`
  * 👤 User

    * **Email:** `test@gmail.com`

> Both accounts use a default password (e.g., `password`). Change it if needed in the seeder.

### 6. Run Development Server

```bash
php artisan serve
```

### 7. Compile Frontend Assets

In a separate terminal:

```bash
npm run dev
```

---

## 📌 You're All Set!

Visit [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser to view the application.

---
