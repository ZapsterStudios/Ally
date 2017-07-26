<h1 align="center">Laravel Ally</h1>

## Introduction
Laravel Ally is a fully API based team subscription service currently supporting the [Braintree](https://www.braintreepayments.com) payment system.
The project is heavily inspired by [Laravel Spark](https://spark.laravel.com/) and take advantage of [Laravel Passport](https://github.com/laravel/passport) and [Laravel Cashier](https://github.com/laravel/cashier-braintree).

The project is in a somewhat feature complete state however updating, versioning and various other aspect of the project will most like be changed.

## Documentation
Coming soon.

## Installation
Installation and updating are currently just based on git clone/pull (will be change).

### Clone the Repository
```
git clone git@github.com:ZapsterStudios/Ally.git
```

### Require and Register the Repository in ``composer.json``
```
"require": {
    ...
    "zapsterstudios/ally": "*@dev"
},
"repositories": [
    {
        "type": "path",
        "url": "./Ally"
    }
]
```

### Run Installation
```
php artisan ally:install
```

## Testing
Some tests require a Braintree Sandbox account and are grouped under 'Subscription'.

### Non-Subscription Tests
#### Command
```
vendor/bin/phpunit Ally --exclude-group Subscription
```

### Subscription Tests
#### Braintree Plans
```
valid-first-plan  | Valid First Plan  | $5
valid-second-plan | Valid Second Plan | $10
```

#### Command
```
vendor/bin/phpunit Ally --group Subscription
```

## License
Laravel Ally is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)