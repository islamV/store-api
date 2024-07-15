# E-Commerce

## Introduction

[Introduce your project here]

## API Routes Summary

| HTTP Method | URL Path                         | Middleware            |
|-------------|----------------------------------|-----------------------|
| POST        | /api/v1/register                 | none                  |
| POST        | /api/v1/login                    | none                  |
| POST        | /api/v1/logout                   | auth:api              |
| POST        | /api/v1/refresh                  | auth:api              |
| POST        | /api/v1/me                       | auth:api              |
| POST        | /api/v1/product                  | auth:api              |
| GET         | /api/v1/product                  | auth:api              |
| GET         | /api/v1/product/{product}        | none                  |
| PUT         | /api/v1/product/{product}        | auth:api              |
| DELETE      | /api/v1/product/{product}        | auth:api              |
| GET         | /api/v1/products/all             | none                  |
| GET         | /api/v1/productsWithPageination  | none                  |
| POST        | /api/v1/category                 | auth:api              |
| GET         | /api/v1/category                 | auth:api              |
| GET         | /api/v1/category/{category}      | none                  |
| PUT         | /api/v1/category/{category}      | auth:api              |
| DELETE      | /api/v1/category/{category}      | auth:api              |
| GET         | /api/v1/categories               | none                  |
| POST        | /api/v1/order                    | auth:api              |
| GET         | /api/v1/order                    | auth:api              |
| GET         | /api/v1/order/{order}            | auth:api              |
| PUT         | /api/v1/order/{order}            | auth:api              |
| DELETE      | /api/v1/order/{order}            | auth:api              |

## Installation

To set up the Laravel project, follow these steps:

1. **Clone the repository**:
    ```sh
    git clone https://github.com/your-username/your-repository.git
    cd your-repository
    ```

2. **Install dependencies**:
    ```sh
    composer install
    npm install
    ```

3. **Copy the `.env` file**:
    ```sh
    cp .env.example .env
    ```

4. **Generate an application key**:
    ```sh
    php artisan key:generate
    ```

5. **Set up the database**:
    - Open the `.env` file and configure your database settings.
    - Run the following command to migrate the database:
        ```sh
        php artisan migrate
        ```

6. **Run the development server**:
    ```sh
    php artisan serve
    ```

7. **Compile the assets**:
    ```sh
    npm run dev
    ```

## Usage

To use the API, you can make HTTP requests to the specified endpoints. Below are some examples using `curl`:

### Authentication

- **Register**:
    ```sh
    curl -X POST -d "name=John Doe&email=johndoe@example.com&password=password" http://localhost:8000/api/v1/register
    ```

- **Login**:
    ```sh
    curl -X POST -d "email=johndoe@example.com&password=password" http://localhost:8000/api/v1/login
    ```

- **Logout**:
    ```sh
    curl -X POST -H "Authorization: Bearer {token}" http://localhost:8000/api/v1/logout
    ```

### Products

- **Get All Products**:
    ```sh
    curl -X GET http://localhost:8000/api/v1/products/all
    ```

- **Get Product by ID**:
    ```sh
    curl -X GET http://localhost:8000/api/v1/product/{product_id}
    ```

### Categories

- **Get All Categories**:
    ```sh
    curl -X GET http://localhost:8000/api/v1/categories
    ```

### Orders

- **Create Order**:
    ```sh
    curl -X POST -H "Authorization: Bearer {token}" -d "product_id=1&quantity=2" http://localhost:8000/api/v1/order
    ```

## Contributing

1. Fork the repository.
2. Create your feature branch (`git checkout -b feature/AmazingFeature`).
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`).
4. Push to the branch (`git push origin feature/AmazingFeature`).
5. Open a pull request.

## License

Distributed under the MIT License. See `LICENSE` for more information.

