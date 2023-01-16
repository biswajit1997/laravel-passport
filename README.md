# Laravel Passport




## Requirement 
php 7.4
Composer

## Installation

```
cd /path/to/laravel-passport
composer install
```

**First Time Installation Only**
```
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh
php artisan passport:install
```

**Run Development Environment**
```
php artisan serve


