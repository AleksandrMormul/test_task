# Lucky Game Application

A Laravel-based web application that implements a simple game where users can test their luck and view their game history.

## 🚀 Tech Stack

- **PHP 8.2+**
- **Laravel 12.x**
- **SQLite** (default, can be changed to other databases)

## 📋 Features

- User registration system
- Unique game link generation
- Lucky number game functionality
- Game history tracking
- Secure link management (regenerate/deactivate)

## 🛠️ Installation

1. **Clone the repository**
   ```bash
   git clone [repository-url]
   cd test-task
   git checkout test
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Set up environment file**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Set up the database**
   ```bash
   touch database/database.sqlite
   ```
   Update `.env` to use SQLite:
   ```
   DB_CONNECTION=sqlite
   # Comment out other DB_* settings
   ```

6. **Run migrations**
   ```bash
   php artisan migrate
   ```

7. **Compile assets**
   ```bash
   npm run build
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```

9. **Access the application**
   Visit `http://127.0.0.1:8000/` in your browser
