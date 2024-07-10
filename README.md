
# Agree Terms and Conditions
This plugin offer an intuitive, user-friendly interface where users can easily add agree terms and conditions component.


## Installation

Install agree terms component with the composer
```bash
 composer require masuresh124/agree-terms
```
Add the following code in config\app.php
```bash
  /**
  * Package Service Providers...
  */
  Masuresh124\AgreeTerms\Providers\AgreeTermsProvider::class,
```
Run the following command to publish the service provider
```bash
  php artisan vendor:publish --provider="Masuresh124\AgreeTerms\Providers\AgreeTermsProvider"
```

Run the following command to run the migration 
```bash
  php artisan migrate
```
 


In `Model\User.php` add the trait 
```javascript
 <?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Masuresh124\AgreeTerms\Traits\AgreeTermsTrait;

class User extends Authenticatable
{
    use AgreeTermsTrait;
   .
   .
   .

}
```
In `app\Http\Kernel.php` add the following middleware 
```javascript
     protected $routeMiddleware = [
        .
        .
        'agree-terms'      => \Masuresh124\AgreeTerms\Http\Middleware\AgreeTermsMiddleware::class,
    ];
```

In `routes/web.php` add the following middleware for routes
```javascript
  Auth::routes();

  Route::middleware(['auth', 'agree-terms'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
});
```

Go To `resources/views/agree-terms/form.blade.php`
- Add layout to this page as per the application design
```javascript
@include('agree-terms.terms')
<form action="{{ route(config('agree-terms.store_route')) }}" method="post">
    @csrf
    <div class="form-check">
        <input name="is_agreed" type="checkbox" class="form-check-input" id="is_agreed">
        <label class="form-check-label" for="is_agreed">Terms and Conditions</label>
        @error('is_agreed')
            <div class="invalid-feedback" role="alert">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Submit">
    </div>
</form>
```

Go To `resources/views/agree-terms/terms.blade.php`
- Add application terms and conditions content
```javascript
<h2>Please agree to our updated Terms of Service.</h2>
<div id="terms">
    This place we can add terms and conditions
.
.
.
.
</div>

```
## Updating 
If the package is already installed and you are trying to update it to the latest version, please follow the instructions below:

 - Take a backup of the existing config file located at app/config/agree-terms.php.
 - Run the following commands:

 <p><b>Note: The commands below will replace the existing config file with the new one. After that, compare the new config file with your backup and add any missing values as needed.</b></p>
 
```bash
  composer require masuresh124/agree-terms
  php artisan vendor:publish --provider="Masuresh124\AgreeTerms\Providers\AgreeTermsProvider"  --tag="agree-terms" --force

```

## Badges
[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)

## Authors
- [@Suresh M A](https://github.com/masuresh124)

## Features

- Accept terms and condition
- Exclude paths
- Add custom conditions
 

