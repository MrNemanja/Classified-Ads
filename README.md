# Classified Ads Application (Laravel)

A simple application for creating and managing classified ads, developed in **Laravel** as a take-home task for an interview.

## Features

- User registration and login (Breeze package)
- Create, edit, and delete ads with images
- Categorization of ads with subcategories
- Search and filter ads
- Admin panel for managing users and categories
- Main admin automatically created via seeder

## Installation

```bash
1. Clone the repository and enter the folder:

git clone https://github.com/yourusername/ads-app.git
cd ads-app

2. Install dependencies:

composer install
npm install
npm run dev

3. Copy .env and configure your local database:

cp .env.example .env

4. Run migrations and seed the main admin:

php artisan migrate --seed

5. Start the local development server:

php artisan serve

Default admin login:

Email: admin123@gmail.com
Password: 112password556

Notes

The application uses a local database; update the .env file before running.
Uploaded images are stored in storage/app/public/ads.

Technologies
Laravel 12, PHP 8, MySQL, Tailwind CSS, Breeze

This project demonstrates PHP and Laravel skills.
