# Countries
Countries Package for Laravel 5.*

## Installation

This package can be installed through Composer.

```bash
composer require ernysans/countries
```

When using Laravel there is a service provider that you can make use of.

```php

// app/config/app.php

'providers' => [
    '...',
    ErnySans\Countries\CountriesServiceProvider::class
];
```

Publish Migrations and Seeds

```bash
php artisan vendor:publish --provider="ErnySans\Countries\CountriesServiceProvider"
```

## Use



## Credits

- [Erny Sans](http://erny.co)

## License

This package is open-sourced licensed under the [MIT license](http://opensource.org/licenses/MIT).