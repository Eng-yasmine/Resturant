# Restaurant Management System

A restaurant management system built with Laravel and Laravel Breeze for authentication. This system allows managing menu items, categories, orders, customers, employees, feedback, and blog posts.

---

## Features

- **Authentication System** using Laravel Breeze.
- Manage:
  - Menu Items & Categories
  - Orders & Order Details
  - Customers & Employees
  - Feedbacks from customers
  - Blog posts
- Role-based access using **Policies**.
- Dummy data using **Factories** and **Seeders**.
- Organized **RESTful API** structure.
- Debugging with **Laravel Debugbar**.
- Monitoring with **Laravel Telescope**.

---

## Tech Stack

- PHP (Laravel)
- MySQL
- Laravel Breeze
- Bootstrap 5
- RESTful API structure
- Laravel Debugbar
- Laravel Telescope

---

## Database Schema Overview

- **categories**: Belongs to menu & menu items.
- **menu_items**: Has many categories & feedbacks.
- **orders**: Belongs to customers.
- **order_details**: Belongs to orders and menu items.
- **employees**: Manages internal data and posts.
- **customers**: Can create orders and give feedback.
- **feedbacks**: From customers on menu items.
- **posts**: Blog articles managed by employees.

---

## Installation

```bash
# 1. Clone the repository
git clone https://github.com/Eng-yasmine/Resturant.git
cd restaurant-system

# 2. Install PHP dependencies
composer install

# 3. Set up environment file
cp .env.example .env
php artisan key:generate

# 4. Set up database
php artisan migrate --seed

# 5. Install front-end dependencies
npm install && npm run dev

# 6. Run the application
php artisan serve
