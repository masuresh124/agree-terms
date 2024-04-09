
# Agree Terms and Conditions
This plugin offer an intuitive, user-friendly interface where users can easily add agree terms and conditions component.


## Installation

Install agree terms component with the composer
```bash
 composer require masuresh124/agree-terms
```

Run the following command to publish the service provider
```bash
  php artisan vendor:publish --provider="Masuresh124\AgreeTerms\Providers\AgreeTermsProvider"
```

Run the following command to run the migration 
```bash
  php artisan migrate
```
 
Add the following code in config\app.php
```bash
  /**
  * Package Service Providers...
  */
  Masuresh124\SimpleCrudBuilder\Providers\AgreeTermsProvider::class,
```

In Model user.php
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

Go To resources/views/agree-terms/form.blade.php
- Add layout to this page as per the application design
```javascript
@include('agree-terms.terms')
<form action="{{ route('agree-terms.store') }}" method="post">
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

Go To resources/views/agree-terms/terms.blade.php
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
## Badges
[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)

## Authors
- [@Suresh M A](https://github.com/masuresh124)

## Features

- Accept terms and condition
- Exclude paths
- Add custom conditions
 

