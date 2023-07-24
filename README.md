<h1 align="center">PHP Package Boilerplate</h1>

[![PHP Composer](https://github.com/tomkyle/boilerplate-php/actions/workflows/php.yml/badge.svg)](https://github.com/tomkyle/boilerplate-php/actions/workflows/php.yml)

**A template repository for PHP package.**

---

## Start new project

```bash
$ composer create-project tomkyle/boilerplate-php new-project  
$ cd new-project
$ composer install
```



---

## Requirements and suggestions

| PSR standard                        | require                                                      | suggest                                                      |
| ----------------------------------- | ------------------------------------------------------------ | ------------------------------------------------------------ |
| PSR-3 Logger implementation         | [psr/log](https://packagist.org/packages/psr/log)            | [Monolog Logger](https://github.com/Seldaek/monolog)         |
| PSR-6 Cache Implementation          | [psr/cache](https://packagist.org/packages/psr/cache)        | [Symfony Cache component](https://symfony.com/components/Cache) |
| PSR-17 HTTP factory* implementation | [psr/http-factory](https://packagist.org/packages/psr/http-factory) | [nyholm/psr7](nyholm/psr7)                                   |
| PSR-18 HTTP client                  | [psr/http-client](https://packagist.org/packages/psr/http-client) | [Guzzle 7](https://packagist.org/packages/guzzlehttp/guzzle) |


```bash
$ composer require monolog/monolog
$ composer require symfony/cache
$ composer require nyholm/psr7
$ composer require guzzlehttp/guzzle
```



---

## Development

### Run all tests

This packages has predefined test setups for code quality, code readability and unit tests. Check them out at the `scripts` section of **[composer.json](./composer.json)**.

```bash
$ composer test
# ... which includes
$ composer phpstan
$ composer phpcs
$ composer phpunit
```

### Unit tests

Default configuration is **[phpunit.xml.dist](./phpunit.xml.dist).** Create a custom **phpunit.xml** to apply your own settings. 
Also visit [phpunit.readthedocs.io](https://phpunit.readthedocs.io/) · [Packagist](https://packagist.org/packages/phpunit/phpunit)

```bash
$ composer phpunit
# ... or
$ vendor/bin/phpunit
```

### PhpStan

Default configuration is **[phpstan.neon.dist](./phpstan.neon.dist).** Create a custom **phpstan.neon** to apply your own settings. Also visit [phpstan.org](https://phpstan.org/) · [GitHub](https://github.com/phpstan/phpstan) · [Packagist](https://packagist.org/packages/phpstan/phpstan)

```bash
$ composer phpstan
# ... which includes
$ vendor/bin/phpstan analyse
```

### PhpCS

Default configuration is **[.php-cs-fixer.dist.php](./.php-cs-fixer.dist.php).** Create a custom **.php-cs-fixer.php** to apply your own settings. Also visit [cs.symfony.com](https://cs.symfony.com/) ·  [GitHub](https://github.com/FriendsOfPHP/PHP-CS-Fixer) · [Packagist](https://packagist.org/packages/friendsofphp/php-cs-fixer)

```bash
$ composer phpcs
# ... which aliases
$ vendor/bin/php-cs-fixer fix --verbose --diff --dry-run
```

Apply all CS fixes:

```bash
$ composer phpcs:apply
# ... which aliases 
$ vendor/bin/php-cs-fixer fix --verbose --diff
```





