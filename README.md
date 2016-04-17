# Laraworld
Countries, Languages and Time Zones Package for Laravel 5.*

## Installation
This package can be installed through Composer.

```bash
composer require ernysans/laraworld
```

When using Laravel there is a service provider that you can make use of.

```php
// app/config/app.php

'providers' => [
    '...',
    ErnySans\Laraworld\LaraworldServiceProvider::class
];
```

Publish Migrations

```bash
php artisan vendor:publish --provider="ErnySans\Laraworld\LaraworldServiceProvider"
```

Prepare Seed.

```php
// database/seeds/DatabaseSeeder.php

use ErnySans\Laraworld\Database\seeds\CountriesTableSeeder;
use ErnySans\Laraworld\Database\seeds\TimeZonesTableSeeder;
use ErnySans\Laraworld\Database\seeds\LanguagesTableSeeder;

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

## Use
These methods is provided:

* `getCountries()`: Get all the countries from the JSON file, you don't need to run migrations to get all the data in JSON format.

When using Laravel you can work with the [Collection Available Methods](https://laravel.com/docs/master/collections).

## Credits

- [Erny Sans](http://erny.co)

## License
This package is open-sourced licensed under the [MIT license](http://opensource.org/licenses/MIT).