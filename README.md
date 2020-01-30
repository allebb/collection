# Collection

[![Build Status](https://travis-ci.org/allebb/collection.svg)](https://travis-ci.org/allebb/collection)
[![Code Coverage](https://scrutinizer-ci.com/g/allebb/collection/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/allebb/collection/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/allebb/collection/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/allebb/collection/?branch=master)
[![Code Climate](https://codeclimate.com/github/allebb/collection/badges/gpa.svg)](https://codeclimate.com/github/allebb/collection)
[![Latest Stable Version](https://poser.pugx.org/ballen/collection/v/stable)](https://packagist.org/packages/ballen/collection)
[![Latest Unstable Version](https://poser.pugx.org/ballen/collection/v/unstable)](https://packagist.org/packages/ballen/collection)
[![License](https://poser.pugx.org/ballen/collection/license)](https://packagist.org/packages/ballen/collection)

This Collection library is an OOP replacement for the traditional array data structure. Much like an array, a collection contains member elements, although these tend to be objects rather than simpler types such as strings and integers.

This library is developed and maintained by myself for various personal projects where I don't want to rely on third-party collection packages for licensing reasons or maintainability etc.

Requirements
------------

This library is developed and tested for PHP 5.6+

This library is unit tested against PHP 5.6, 7.0, 7.1, 7.2, 7.3 and 7.4!

License
-------

This client library is released under the MIT license, a [copy of the license](https://github.com/allebb/collection/blob/master/LICENSE) is provided in this package.

Setup
-----

To install the package into your project (assuming you are using the Composer package manager) you can simply execute the following command from your terminal in the root of your project folder:

```composer require ballen/collection```

Alternatively you can manually add this library to your project using the following steps, simply edit your project's composer.json file and add the following lines (or update your existing require section with the library like so):

```json
"require": {
        "ballen/collection": "^1.0"
}
```

Then install the package like so:

```composer install --no-dev```

Usage
-----

A simple example of adding, sorting and iterating data in a collection.

```php
<?php

use Ballen\Collection\Collection;



```

Tests and coverage
------------------

This library is fully unit tested using [PHPUnit](https://phpunit.de/).

I use [TravisCI](https://travis-ci.org/) for continuous integration, which triggers unit tests each time a commit is pushed.

If you wish to run the tests yourself you should run the following:

```shell
# Install the Collection Library
composer install


# Now we run the unit tests (from the root of the project) like so:
./vendor/bin/phpunit
```

Code coverage can also be ran but requires XDebug installed...

```shell
./vendor/bin/phpunit --coverage-html ./report
```

Support
-------

I am happy to provide support via. my personal email address, so if you need a hand drop me an email at: [ballen@bobbyallen.me]().


