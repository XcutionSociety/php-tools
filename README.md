# XcutionSociety PHP Tools

[![Build Status](https://img.shields.io/badge/packagist-v0.1.3-blue.svg)](https://packagist.org/packages/xcutionsociety/php-tools)

## Install
```composer
composer require xcutionsociety/php-tools
```

## Usage CI

```php
<?php 

use XcS\XcTools;

$rupiah = XcTools::rupiah(5000);

echo $rupiah;
//Rp. 5.000
```

## Usage Laravel

```php
<?php 
use XcS\XcTools;

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
| XcTools::stringCapitalAndNumber($lenght) | stringCapitalAndNumber("5") | 6L8P1
| XcTools::stringAndNumber($lenght) | stringAndNumber("5") | IPDeT
| XcTools::encrypt($value) | encrypt("09882") | RjdDMjA5ODgyTWJ6RA==
| XcTools::decrypt($value) | decrypt("RjdDMjA5ODgyTWJ6RA==") | 09882
| XcTools::rupiah($value) | rupiah("10000") | Rp. 10.000
| XcTools::removeRupiah($value) | removeRupiah("Rp. 10.000") | 10000
| XcDateTimes::indoDate($date,$day) | indoDate("2019-04-09",false) | 09 April 2019
| XcDateTimes::indoDate($date,$day) | indoDate("2019-04-09",true) | Selasa, 09 April 2019
| XcDateTimes::time24to12($time) | time24to12("13:30") | 01:30 PM
| XcDateTimes::time12to24($time,$suffix) | time12to24("1:30 PM","WIB") | 13:30 WIB


## License
Read [MIT License](LICENSE)
