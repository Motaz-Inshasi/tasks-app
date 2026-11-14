# Task List

A simple task list built with Laravel 11 and MySQL, using the Query Builder (`DB::table`) to add, list, edit, update and delete tasks.

## Setup

```bash
git clone https://github.com/Motaz-Inshasi/tasks-app.git
cd tasks-app
composer install
cp .env.example .env
php artisan key:generate
```

Set the MySQL connection in `.env` (`DB_CONNECTION=mysql`, `DB_DATABASE=tasks_app`, ...), then:

```bash
php artisan migrate
php artisan serve
```

Open http://127.0.0.1:8000/tasks
