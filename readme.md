# Jarvin Product — Product API (Lumen)

RESTful API for product management built with **Lumen 6**. Uses Repository pattern, Form Requests, custom API response helper, SKU/Slug handling, and Product model with accessors, mutators, scopes, and an observer.

## What it does

- **List products** — Paginated index (15 per page)
- **Create product** — Store with validation (and optional SKU/slug logic)
- **Show product** — Get single product by ID
- **Update product** — Partial update (PATCH)
- **Update status** — Change product status
- **Delete product** — Remove product by ID

## Tech stack

- **PHP** ^7.2
- **Lumen** ^6.0
- **waavi/sanitizer** — Input sanitization
- **urameshibr/lumen-form-request** — Form validation

## Requirements

- PHP >= 7.2
- Composer
- Database (SQLite/MySQL/PostgreSQL; configure in `.env`)

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
# Set DB_* in .env
php artisan migrate
```

## API base & routes

Base prefix: `/v1`.

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET    | `/v1/products`           | List products (paginated) |
| POST   | `/v1/products`           | Create product |
| GET    | `/v1/products/{product}` | Show product |
| PATCH  | `/v1/products/{product}` | Update product |
| DELETE | `/v1/products/{product}` | Delete product |
| GET    | `/v1/products/status/{product}` | Get/update status |

(Optional: wrap in `auth` middleware for protected access.)

## Project structure (high level)

- `app/Http/Controllers/V1/ProductController.php` — Product API
- `app/Repositories/Eloquent/Product/` — Product repository + interface
- `app/Models/Product/` — Product model, Accessor, Mutator, Scope
- `app/Http/Requests/Product/` — ProductCreateRequest, ProductUpdateRequest, ProductUpdateStatusRequest
- `app/Services/Helpers/ApiResponse.php` — Consistent API responses
- `app/Services/Helpers/SKUHandler.php`, `SlugHandler.php` — SKU & slug helpers
- `app/Observers/ProductObserver.php` — Product model observer

## Run tests

```bash
composer test
# or
./vendor/bin/phpunit
```

## License

MIT
