# Farmer Tracking System API

Farmer tracking system API is developed by Laravel, Support also for farmer group management   

## Live demo

## Requirements
| Requirement | Version support |
|-------------|-----------------|
| Laravel     | 9.x             |
| PHP         | 8.1             |
| Composer    | 2.x             |

## Installation
After download got to project root and run composer update


```composer
composer install
```

#### Database seed for test
If you want to install data for test in your PC, in project root run.
```
php artisan db:seed
```
By default, this will generate data to your database with tables relations see php file 
`` DatabaseSeeder.php `` from database/seeder folder for customization

## Run server
`` php artisan serve ``  then you can visit http://localhost:8000/v1/.... 

### Versioning API
Route for API route all route prefixed with versioning  .../v1/...
but be free to customize from 

>.../app/Providers/RouteServiceProvider.php
```php
public function boot()
    {
        ...
        
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('v1')
                ->group(base_path('routes/v1/api.php'));
        ...
    }
```
