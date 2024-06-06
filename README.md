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
8. run the seeder for append dumy data in tables, use the command:
   ```bash
   php artisan db:seed
   ```
9. run the seeder for features , use the command:
  ```bash
   php artisan test
   ```
10. Enjoy your experience!!

**************Apis***********

--- Login --- 
![Screenshot_84](https://github.com/OmarHesham66/BlogApplication/assets/62832339/cb98bf68-fa1f-4c93-97f7-1f1d32c5850c)

--- Example Request as php ---
![Screenshot_85](https://github.com/OmarHesham66/BlogApplication/assets/62832339/c9762fb7-ae8d-4334-9fa8-296dc49d47f3)

--- Example Response --- 
![Screenshot_86](https://github.com/OmarHesham66/BlogApplication/assets/62832339/f4854f5e-a580-4449-a386-fd25253ececb)



--- Register --- 
![Screenshot_87](https://github.com/OmarHesham66/BlogApplication/assets/62832339/145257ad-0b65-4149-a503-dc4c301f7549)

--- Example Request as php ---
![Screenshot_88](https://github.com/OmarHesham66/BlogApplication/assets/62832339/de59e3ab-d7ea-4bb4-b320-7c8e9ab0584b)

--- Example Response ---

![Screenshot_89](https://github.com/OmarHesham66/BlogApplication/assets/62832339/ce5afcb4-a806-4021-b43d-5b455ec90f59)



--- Refresh Token --- 
![Screenshot_90](https://github.com/OmarHesham66/BlogApplication/assets/62832339/9a18617b-f883-4d7c-8ce4-0b7e381444df)

--- Example Request as php ---
![Screenshot_91](https://github.com/OmarHesham66/BlogApplication/assets/62832339/d8241773-3db8-4b24-b778-80414cf8d972)

--- Example Response ---
![Screenshot_92](https://github.com/OmarHesham66/BlogApplication/assets/62832339/da72b40f-9092-4a92-acc8-abb1269df319)


--- Logout --- 
![Screenshot_93](https://github.com/OmarHesham66/BlogApplication/assets/62832339/5a55565e-1f1c-46cc-a9d6-848d03d4b49b)

--- Example Request as php ---
![Screenshot_94](https://github.com/OmarHesham66/BlogApplication/assets/62832339/7674bcb2-7817-454c-ba78-28c35e3703ea)

--- Example Response ---

![Screenshot_95](https://github.com/OmarHesham66/BlogApplication/assets/62832339/8085801f-2f71-4e46-9c77-4ae620bca6db)



--- Get All Posts --- 
![Screenshot_96](https://github.com/OmarHesham66/BlogApplication/assets/62832339/9e80927a-4b8e-4da2-abdc-dbb3fa716a0b)

--- Example Request as php ---
![Screenshot_97](https://github.com/OmarHesham66/BlogApplication/assets/62832339/2e608af4-61d6-43c9-9989-47b4b034e094)

--- Example Response ---
![Screenshot_98](https://github.com/OmarHesham66/BlogApplication/assets/62832339/890bc20a-b4b5-4f55-94ee-7ab042b082cf)



--- Find Post By ID --- 
![Screenshot_99](https://github.com/OmarHesham66/BlogApplication/assets/62832339/cd09fd07-c0d4-4b18-bbc1-49e5ea6483b5)

--- Example Request as php ---
![Screenshot_99](https://github.com/OmarHesham66/BlogApplication/assets/62832339/cd09fd07-c0d4-4b18-bbc1-49e5ea6483b5)

--- Example Response ---





