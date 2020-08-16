<p align="center"><img src="https://images.mucts.com/image/exp_def_white.png" width="400"></p>
<p align="center">
    <a href="https://scrutinizer-ci.com/g/mucts/laravel-sobot"><img src="https://scrutinizer-ci.com/g/mucts/laravel-sobot/badges/build.png" alt="Build Status"></a>
    <a href="https://scrutinizer-ci.com/g/mucts/laravel-sobot"><img src="https://scrutinizer-ci.com/g/mucts/laravel-sobot/badges/code-intelligence.svg" alt="Code Intelligence Status"></a>
    <a href="https://scrutinizer-ci.com/g/mucts/laravel-sobot"><img src="https://scrutinizer-ci.com/g/mucts/laravel-sobot/badges/quality-score.png" alt="Scrutinizer Code Quality"></a>
    <a href="https://packagist.org/packages/mucts/laravel-sobot"><img src="https://poser.pugx.org/mucts/laravel-sobot/d/total.svg" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/mucts/laravel-sobot"><img src="https://poser.pugx.org/mucts/laravel-sobot/v/stable.svg" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/mucts/laravel-sobot"><img src="https://poser.pugx.org/mucts/laravel-sobot/license.svg" alt="License"></a>
</p>

# Laravel AMQP
> Sobot Open API SDK for Laravel 7

## Installation

### Server Requirements
>you will need to make sure your server meets the following requirements:

- `php ^7.4`
- `JSON PHP Extension`
- `mucts/sobot ^5.0`
- `laravel/framework ^7.0`


### Laravel Installation
```
composer require mucts/laravel-sobot

```

## Usage
> Please refer to [mucts/sobot](https://github.com/mucts/sobot)
>
```php
<?php

use MuCTS\Laravel\Sobot\Facades\Sobot;

$res = Sobot::connection('default')
->tickets()
->ticketList()
->whereCreateStartDatetime('2020-08-01 00:00:00')
->whereCreateEndDatetime('2020-08-16 00:00:00')
->whereTicketStatus(0)
->request();
```


## Configuration
If `config/sobot.php` not exist, run below:
```
php artisan vendor:publish
```
