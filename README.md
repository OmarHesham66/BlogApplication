<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Blog Application API

This documentation provides a comprehensive guide to the Blog Application API built with Laravel. The API includes endpoints for user authentication, CRUD operations for posts and categories, logging of post operations, and comprehensive unit tests.


## Key Features

- Supplier and customer management.
- Product categorization and unit tracking.
- Creation of sales invoices and purchase operations.
- Daily reports for operations and inventory status.
- Intuitive and user-friendly interface.

## Getting Started

1. Install project dependencies using Composer:

   ```bash
   composer install
   ```

2. Copy the .env.example file and rename it to .env:
   ```bash
   cp .env.example .env
   ```
3. Generate the application key:
   ```bash
   php artisan key:generate
   ```
4. Configure the .env file with your database connection details
5. Run the database migrations to create tables:
   ```bash
   php artisan migrate
   ```
6. Start the local server:
   ```bash
   php artisan serve
   ```
7. Open the project in the browser at http://localhost:8000.
8. To run the seeder for the users table, use the command:
   ```bash
   php artisan db:seed
   ```
9. To login as an admin, use the following credentials:
   Username: Admin
   Password: 123456789
10. Enjoy your experience!

