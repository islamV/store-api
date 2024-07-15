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

[Instructions for installing your project]

## Usage

[Instructions for using your project]

## Contributing

[Instructions for contributing to your project]

## License

[License information]
