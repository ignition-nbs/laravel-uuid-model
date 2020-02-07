# Laravel UUID Model

[![Latest Version on Github](https://img.shields.io/github/v/tag/ignition-nbs/laravel-uuid-model?style=plastic)](https://github.com/ignition-nbs/laravel-uuid-model)
[![Latest version on Packagist](https://img.shields.io/packagist/v/ignition-nbs/laravel-uuid-model?style=plastic)](https://packagist.org/packages/ignition-nbs/laravel-uuid-model)
[![Total Downloads](https://img.shields.io/packagist/dt/ignition-nbs/laravel-uuid-model?style=plastic)](https://packagist.org/packages/ignition-nbs/laravel-uuid-model)

laravel-uuid-model provides 1 PHP Trait that will overwrite the `__construct`
for any class that extends the `Illuminate\Database\Eloquent\Model` class.

It is important to note that this Trait works better then UUID Model classes
that extend Laravel's `Model` class: Classes that have intermediate parent
classes (e.g. `App\User`) will not work with those type of UUID Model classes.

The new constructor will set `$incrementing` to `FALSE`, the `$keyType` to
`'string'`, and it will automatically make sure that the `id` attribute can be
mass-assigned.

Then it generates a version 4 universally unique identifier for the `id`
attribute, and calls the parent's calls `__construct`.

## Installation

```shell script
$ composer require ignition-nbs/laravel-uuid-model
```

## Usage

There are two things that you must do in order to make successful use of this
`UuidModel`:
* Use `IgnitionNbs\LaravelUuidModel\UuidModel` inside your model class:
```php
<?php

namespace App;

use IgnitionNbs\LaravelUuidModel\UuidModel;
use Illuminate\Database\Eloquent\Model;

class MyModel extends Model
{
	use UuidModel;
}
```
* Set the `id` field in the corresponding migration by using the `uuid()`
function:
```php
class CreateMyModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_models', function (Blueprint $table) {
            $table->uuid('id')->primary();
        });
    }
}
``` 

##Changelog
Please see [CHANGELOG](./CHANGELOG.md) for information on what has changed
recently.

##Contributing
Pull requests are welcome. For major changes, please open an issue first to
discuss what you would like to change.

Please make sure to update tests as appropriate.

##Security
If you discover any security related issues, please email
[guusleeuw@ignitionnbs.co.uk](mailto:guusleeuw@ignitionnbs.co.uk) instead of
using the issue tracker.

##Credits
* [Guus Leeuw](https://twitter.com/PHPGuus)

##License
[MIT](./LICENSE.md)