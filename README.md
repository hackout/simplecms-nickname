# SimpleCMS/Laravel User Nickname Generator

📦 A simple generator that can generate default nicknames

English | [简体中文](./README.md)

[![Latest Stable Version](https://poser.pugx.org/simplecms/nickname/v/stable.svg)](https://packagist.org/packages/simplecms/nickname) [![Latest Unstable Version](https://poser.pugx.org/simplecms/nickname/v/unstable.svg)](https://packagist.org/packages/simplecms/nickname) [![Code Coverage](https://scrutinizer-ci.com/g/overtrue/easy-sms/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/hackout/simplecms-nickname/?branch=master) [![Total Downloads](https://poser.pugx.org/simplecms/nickname/downloads)](https://packagist.org/packages/simplecms/nickname) [![License](https://poser.pugx.org/simplecms/nickname/license)](https://packagist.org/packages/simplecms/nickname)

## Requirements

- PHP >= 8.2
- [Laravel/Framework](https://packagist.org/packages/laravel/framework) >= 11.0

## Installation

```bash
composer require simplecms/nickname
```

## Usage

Includes a distance method.

```php
use SimpleCMS\Nickname\Facades\Nickname; 
Nickname::generate(int $num = 1); // When num is less than or equal to 1, it returns a string; otherwise, it returns an array
```

## Customizing Nickname Dictionary

You can customize your own data through  ```cms_nickname.php``` .

### JSON Data Format

The data structure should follow the format below:

```bash
["Nickname","Nickname2","Nickname3"]
```

## License

MIT
