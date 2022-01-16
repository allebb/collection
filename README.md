# Collection
[![Build](https://github.com/allebb/collection/workflows/build/badge.svg)](https://github.com/allebb/collection/actions)
[![Code Coverage](https://codecov.io/gh/allebb/collection/branch/master/graph/badge.svg)](https://codecov.io/gh/allebb/collection)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/allebb/collection/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/allebb/collection/?branch=master)
[![Code Climate](https://codeclimate.com/github/allebb/collection/badges/gpa.svg)](https://codeclimate.com/github/allebb/collection)
[![Latest Stable Version](https://poser.pugx.org/ballen/collection/v/stable)](https://packagist.org/packages/ballen/collection)
[![Latest Unstable Version](https://poser.pugx.org/ballen/collection/v/unstable)](https://packagist.org/packages/ballen/collection)
[![License](https://poser.pugx.org/ballen/collection/license)](https://packagist.org/packages/ballen/collection)

This Collection library is an OOP replacement for the traditional array data structure. Much like an array, a collection contains member elements, although these tend to be objects rather than simpler types such as strings and integers.

This library is developed and maintained by myself for various personal projects where I don't want to rely on third-party collection packages for licensing reasons or maintainability etc.

Requirements
------------

This library is developed and tested for PHP 7.3+

This library is unit tested against PHP 7.3, 7.4, 8.0 and 8.1!

If you need to use an older version of PHP, you should instead install the 1.x version of this library (see below for details).

License
-------

This client library is released under the MIT license, a [copy of the license](https://github.com/allebb/collection/blob/master/LICENSE) is provided in this package.

Setup
-----

To install the latest version of this package into your project (assuming you are using the Composer package manager) you can simply execute the following command from your terminal in the root of your project folder:

```shell
composer require ballen/collection
```

**If you need to use an older version of PHP, version 1.x.x supports PHP 5.6, 7.0, 7.1 and 7.2, you can install this version using Composer with this command instead:**

```shell
composer require ballen/collection ^1.0
```

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

I use [GitHub Actions](https://github.com/) for continuous integration, which triggers unit tests each time a commit is pushed.

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


