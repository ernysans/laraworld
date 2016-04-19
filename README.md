[![Build Status](https://travis-ci.org/ernysans/laraworld.svg?branch=master)](https://travis-ci.org/ernysans/laraworld) [![Latest Stable Version](https://poser.pugx.org/ernysans/laraworld/v/stable?format=flat)](https://packagist.org/packages/ernysans/laraworld) [![Total Downloads](https://poser.pugx.org/ernysans/laraworld/downloads?format=flat)](https://packagist.org/packages/ernysans/laraworld) [![Latest Unstable Version](https://poser.pugx.org/ernysans/laraworld/v/unstable?format=flat)](https://packagist.org/packages/ernysans/laraworld) [![License](https://poser.pugx.org/ernysans/laraworld/license?format=flat)](https://packagist.org/packages/ernysans/laraworld)

# Laraworld
Countries, Languages and Time Zones Package for Laravel and Lumen 5.*

Please check the [Known Issues](https://github.com/ernysans/laraworld/issues) section before reporting a new one.

![ScreenShot](../master/src/img/screenshot.jpg?raw=true)

## Installation
This package can be installed through Composer.

```bash
$ composer require ernysans/laraworld
```

When using Laravel there is a service provider that you can make use of.

```php
// app/config/app.php

'providers' => [
    '...',
    ErnySans\Laraworld\LaraworldServiceProvider::class
];
```

Publish Migrations and Seeds

```bash
$ php artisan vendor:publish --provider="ErnySans\Laraworld\LaraworldServiceProvider"
```

Prepare Seeds.

```php
// database/seeds/DatabaseSeeder.php

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // Seed the countries
        $this->call(CountriesTableSeeder::class);
    
        // Seed the Time Zones
        $this->call(TimeZonesTableSeeder::class);
    
        // Seed the Languages
        $this->call(LanguagesTableSeeder::class);
    }
}
```
## Run Migrations and Seed the tables
```bash
$ php artisan migrate
$ php artisan db:seed
```
## Use
These methods are provided:

### Collection Methods
When using Laravel you can work with the [Collection Available Methods](https://laravel.com/docs/master/collections).

### JSON file (Optional)
Use this methods If you want to get all the data from the JSON file:

* `Countries::getCountries()`: Get all the countries from the JSON file.
* `Languages::getCountries()`: Get all the languages from the JSON file.
* `TimeZones::getCountries()`: Get all the time zones from the JSON file.

## Credits

- [Erny Sans](http://erny.co)

## License
This package is open-sourced licensed under the [MIT license](http://opensource.org/licenses/MIT).
