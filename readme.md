## Num PHP

This module allows you to calculate mean, standard deviation, Z-score and percentile.

### Installation

1. Run
   ```php   
   composer require girishk/numphp --dev
   ```
   in console to install this module (Notice `--dev` flag - it's recommended to use this package only for development).

2. If you use Laravel < 5.5 open `config/app.php` and in `providers` section add:

	```php
    'providers' => array(
        // ...
        Girishk\Providers\NumphpServiceProvider::class,
    )

    'aliases' => array(
        // ...
        'Numphp' => Girishk\Facades\Numphp::class,
    )
    ```

    Laravel 5.5 uses Package Auto-Discovery and it will automatically load this service provider so you don't need to add anything into above file.

    If you are using Lumen open `bootstrap/app.php` and add:

   ```php
   $app->register(Girishk\Providers\NumphpServiceProvider::class);
   $app->alias('Numphp', Girishk\Facades\Numphp::class);
   ```
