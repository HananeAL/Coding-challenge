# Coding Challenge

> Laravel 8.0 API that uses the API resources with a Vue.js frontend

## Quick Start

### Create Data Base

```SQL
CREATE USER 'codingchallenge_user'@'localhost' IDENTIFIED BY 'codingchallenge';
GRANT ALL PRIVILEGES ON 'codingchallenge_db'.* TO 'codingchallenge_user'@'localhost';
CREATE DATABASE 'codingchallenge_db';
```

### Launch the server

```BASH
# Install Dependencies
composer install

# Run Migrations
php artisan migrate

# Import Data
php artisan db:seed

# Serve Application
php artisan serve
```

## Endpoints categories

### List all categories

```HTTP
GET http://127.0.0.1:8000/api/category
```

### Create category

```HTTP
POST http://127.0.0.1:8000/api/category
```

### Delete category by id

```HTTP
DELETE http://127.0.0.1:8000/api/category/id
```

## Endpoints products

### List all products

```HTTP
GET http://127.0.0.1:8000/api/product
```

### Sort products by name

```HTTP
GET http://127.0.0.1:8000/api/product?sort=name,desc
```

### Sort products by price

```HTTP
GET http://127.0.0.1:8000/api/product?sort=price
```

-   **Note** that when you're not defining `sort_type`, It'll be `asc` by default.

### Sort products by name & price

```HTTP
GET http://127.0.0.1:8000/api/product?sort[0]=name,desc&sort[1]=price,desc
```

### Filter by category

```HTTP
GET http://127.0.0.1:8000/api/product?category=category_name
```

-   **Note** we can filter by category and sort by name and by price.

### Create product

```HTTP
POST http://127.0.0.1:8000/api/product
```

### Delete product by id

```HTTP
DELETE http://127.0.0.1:8000/api/product/id
```

## Artisan Commands

```BASH
# Create category
create:category

# Delete category
delete:category

# Create product
create:product

# Delete product
delete:product
```
