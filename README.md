# Laravel Project README

This is a Laravel project created to [briefly describe the project's purpose or goal].

## Table of Contents

-   [Prerequisites](#prerequisites)
-   [Getting Started](#getting-started)
-   [Project Structure](#project-structure)
-   [Usage](#usage)
-   [Configuration](#configuration)
-   [Contributing](#contributing)
-   [License](#license)

## Prerequisites

Before you begin, ensure you have met the following requirements:

-   [PHP](https://php.net) (^8.0.2)
-   [Composer](https://getcomposer.org)
-   [Node.js](https://nodejs.org) and [npm](https://www.npmjs.com) (for front-end assets, optional)
-   [Laravel](https://laravel.com) (^9.19)
-   [Database](#configure-database) (MySQL)

## Getting Started

Follow these steps to get the project up and running:

1.  Clone this repository:

    ```bash
    git clone https://github.com/kishan9607/CRMTask.git
    ```

2.  Change into the project directory:

    ```bash
    cd CRMTask
    ```

3.  Install PHP dependencies using Composer:

    ```bash
    composer install
    ```

4.  Create a copy of the .env.example file and rename it to .env:

    ```bash
    cp .env.example .env
    ```

5.  Generate the application key:

    ```bash
    php artisan key:generate
    ```

6.  Configure your database in the .env file:

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

7.  (Optional) Install front-end assets (e.g., JavaScript and CSS):

    ```bash
    npm install
    npm run dev
    npm run build
    ```

8.  Generate database schema:

    ```bash
    php artisan migrate
    ```

9.  Start the development server:

    ```bash
    php artisan serve
    ```
