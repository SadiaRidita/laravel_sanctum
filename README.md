# Laravel API Authentication using JWT Tokens

This Laravel project provides a simple example of API authentication using JSON Web Tokens (JWT). It includes features such as user registration, login, user authentication, and logout.

## Prerequisites

Before you begin, ensure you have the following installed:

- [PHP](https://www.php.net/) (>= 7.4)
- [Composer](https://getcomposer.org/)
- [Laravel](https://laravel.com/) (>= 8)
- [SQLite](https://www.sqlite.org/index.html) (or any other database of your choice)

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/yourusername/laravel-api-jwt-auth.git
    ```

2. Navigate to the project directory:

    ```bash
    cd laravel-api-jwt-auth
    ```

3. Install dependencies:

    ```bash
    composer install
    ```

4. Create a copy of the `.env` file:

    ```bash
    cp .env.example .env
    ```

5. Configure your database settings in the `.env` file:

    ```env
    DB_CONNECTION=sqlite
    ```

6. Generate the application key:

    ```bash
    php artisan key:generate
    ```

7. Run the database migrations:

    ```bash
    php artisan migrate
    ```

8. Start the development server:

    ```bash
    php artisan serve
    ```



