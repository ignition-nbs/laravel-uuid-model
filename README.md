# Laravel UUID Model

[![Latest Version on Github](https://img.shields.io/github/v/tag/ignition-nbs/laravel-uuid-model?style=plastic)](https://github.com/ignition-nbs/laravel-uuid-model)
[![Latest version on Packagist](https://img.shields.io/packagist/v/ignition-nbs/laravel-uuid-model?style=plastic)](https://packagist.org/packages/ignition-nbs/laravel-uuid-model)
[![Total Downloads](https://img.shields.io/packagist/dt/ignition-nbs/laravel-uuid-model?style=plastic)](https://packagist.org/packages/ignition-nbs/laravel-uuid-model)

laravel-uuid-model provides 1 PHP Trait that implements the initialization
function and is thus called by the `Illuminate\Database\Eloquent\Model`
constructor. The `initializeUuidModel` sets `$incrementing` to FALSE, `$keyType`
to`"string"`, and it will ensure that the `id` attribute can be mass-assigned.

Then it generates a version 4 universally unique identifier for the `id`
attribute and sets that value already in `$this->attributes['id']`.

It is important to note that this Trait works better then UUID Model classes
that extend Laravel's `Model` class: Classes that have intermediate parent
classes (e.g. `App\User`) will not work with those type of UUID Model classes.

This package works with Laravel 5.7, 5.8, 6.x and 7.x.

## Installation

```shell script
$ composer require ignition-nbs/laravel-uuid-model
```

If you do install and use this package, please send a postcard to
```text
Ignition NBS Ltd
5th Floor
82 King Street
Manchester
M2 4WQ
United Kingdom
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