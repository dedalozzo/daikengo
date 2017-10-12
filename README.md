[![Latest Stable Version](https://poser.pugx.org/3f/daikengo/v/stable.png)](https://packagist.org/packages/3f/daikengo)
[![Latest Unstable Version](https://poser.pugx.org/3f/daikengo/v/unstable.png)](https://packagist.org/packages/3f/daikengo)
[![Build Status](https://scrutinizer-ci.com/g/dedalozzo/daikengo/badges/build.png?b=master)](https://scrutinizer-ci.com/g/dedalozzo/daikengo/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dedalozzo/daikengo/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/dedalozzo/daikengo/?branch=master)
[![License](https://poser.pugx.org/3f/daikengo/license.svg)](https://packagist.org/packages/3f/converter)
[![Total Downloads](https://poser.pugx.org/3f/daikengo/downloads.png)](https://packagist.org/packages/3f/converter)


Daikengo
========
Daikengo is an open source social network platform.


Composer Installation
---------------------

To install Daikengo, you first need to install [Composer](http://getcomposer.org/), a Package Manager for
PHP, following these few [steps](http://getcomposer.org/doc/00-intro.md#installation-nix):

```sh
curl -s https://getcomposer.org/installer | php
```

You can run this command to easily access composer from anywhere on your system:

```sh
sudo mv composer.phar /usr/local/bin/composer
```


Daikengo Installation
--------------------
Once you have installed Composer, it's easy install Daikengo.

1. Edit your `composer.json` file, adding Daikengo to the require section:
```sh
{
    "require": {
        "3f/daikengo": "dev-master"
    },
}
```
2. Run the following command in your project root dir:
```sh
composer update
```


Documentation
-------------
The documentation can be generated using [Doxygen](http://doxygen.org). A `Doxyfile` is provided for your convenience.


Authors
-------
Filippo F. Fadda - <filippo.fadda@programmazione.it> - <http://www.linkedin.com/in/filippofadda>


Copyright
---------
Copyright (c) 2016-2017, Filippo Fadda
All rights reserved.


License
-------
Daikengo is licensed under the Apache License, Version 2.0 - see the LICENSE file for details.