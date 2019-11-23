# XcutionSociety PHP Tools

[![Build Status](https://img.shields.io/badge/packagist-v0.1-blue.svg)](https://packagist.org/packages/xcutionsociety/php-tools)

## Install
```composer
composer require xcutionsociety/php-tools
```

## Usage CI

```php
<?php 

$rupiah = \XcutionSociety\XcTools::rupiah(5000);

echo $rupiah;
//Rp. 5.000
```

## Usage Laravel

```php
<?php 
use XcutionSociety\XcTools;

class HomeController extends Controller
{
   
    public function __construct()
    {
        /****/
    }

    public function index()
    {
        $rupiah = XcTools::rupiah("5000");
        echo $rupiah;
        //Rp. 5.000
    }

}
```
## Available Function

| Function | Example | Result |
| ------ | ------ | ------ |
| stringCapitalAndNumber($lenght) | stringCapitalAndNumber("5") | 6L8P1
| stringAndNumber($lenght) | stringAndNumber("5") | IPDeT
| encrypt($value) | encrypt("09882") | RjdDMjA5ODgyTWJ6RA==
| decrypt($value) | decrypt("RjdDMjA5ODgyTWJ6RA==") | 09882
| rupiah($value) | rupiah("10000") | Rp. 10.000
| removeRupiah($value) | removeRupiah("Rp. 10.000") | 10000
| indoDate($date,$day) | indoDate("2019-04-09",false) | 09 April 2019
| indoDate($date,$day) | indoDate("2019-04-09",true) | Selasa, 09 April 2019


## License
Read [MIT License](LICENSE)
