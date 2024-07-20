# SimpleCMS/Laravel 用户昵称生成器

📦 可以生成默认昵称的简易生成器

简体中文 | [English](./README.md)

[![Latest Stable Version](https://poser.pugx.org/simplecms/nickname/v/stable.svg)](https://packagist.org/packages/simplecms/nickname) [![Latest Unstable Version](https://poser.pugx.org/simplecms/nickname/v/unstable.svg)](https://packagist.org/packages/simplecms/nickname) [![Code Coverage](https://scrutinizer-ci.com/g/overtrue/easy-sms/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/hackout/simplecms-nickname/?branch=master) [![Total Downloads](https://poser.pugx.org/simplecms/nickname/downloads)](https://packagist.org/packages/simplecms/nickname) [![License](https://poser.pugx.org/simplecms/nickname/license)](https://packagist.org/packages/simplecms/nickname)

## 环境需求

- PHP >= 8.2
- [Laravel/Framework](https://packagist.org/packages/laravel/framework) >= 11.0

## 安装

```bash
composer require simplecms/nickname
```

## 使用方法

```php
use SimpleCMS\Nickname\Facades\Nickname; 

Nickname::generate(int $num = 1); //当num 等于小于1时 返回为string,其余返回array

```

## 自定义昵称字典

你可以通过```cms_nickname.php```自定义自己的数据。

### JSON数据格式

数据结构参考遵循以下格式:

```bash
["昵称","昵称2","昵称3"]
```

## License

MIT
