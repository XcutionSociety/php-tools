# XcutionSociety PHP Tools

[![Build Status](https://img.shields.io/badge/packagist-v0.1.5-success.svg)](https://xcutionsociety.github.io/php-tools/)

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
| XcTools::rupiah($value,$decimal) | rupiah("10000",2) | Rp. 10.000,00
| XcTools::removeRupiah($value) | removeRupiah("Rp. 10.000,00") | 10000
| XcDateTimes::indoDate($date,$day) | indoDate("2019-04-09",false) | 09 April 2019
| XcDateTimes::indoDate($date,$day) | indoDate("2019-04-09",true) | Selasa, 09 April 2019
| XcDateTimes::indoDateMedium($date,$day) | indoDateMedium("2019-04-09",false) | 09 Apr 2019
| XcDateTimes::indoDateMedium($date,$day) | indoDateMedium("2019-04-09",true) | Selasa, 09 Apr 2019
| XcDateTimes::indoDateTime($date, $day, $time, $suffixTime, $type) | indoDateTime("2019-04-09 08:30:00", true, true, "WIB", "M") | Selasa, 09 Apr 2019 08:30 WIB
| XcDateTimes::time24to12($time) | time24to12("13:30") | 01:30 PM
| XcDateTimes::time12to24($time,$suffix) | time12to24("1:30 PM","WIB") | 13:30 WIB

## Updated

|From|To|
|-----|-----|
|XcTools::rupiah($value)|XcTools::rupiah($value,$decimal)

## Added

New Function for Tree Arrays <br>
Example :
```php
<?php 

$data = array(
    array(
        'id' => 1,
        'nama' => "Joni",
        'parent_id' => 0
    ),
    array(
        'id' => 2,
        'nama' => "Joko",
        'parent_id' => 0
    ),
    array(
        'id' => 3,
        'nama' => "Jotte",
        'parent_id' => 0
    ),
    array(
        'id' => 4,
        'nama' => "Doni",
        'parent_id' => 1
    ),
    array(
        'id' => 5,
        'nama' => "Doko",
        'parent_id' => 4
    ),
    array(
        'id' => 6,
        'nama' => "Dotte",
        'parent_id' => 5
    ),
    array(
        'id' => 7,
        'nama' => "Darius",
        'parent_id' => 1
    ),
);

$result = XcTrees::getTreeList($data, $parent = 'parent_id', $son = 'id', $pid = 0, $child = 'childs');
echo json_encode($result);
```
And Result :

```json
[
   {
      "id":1,
      "nama":"Joni",
      "parent_id":0,
      "child":[
         {
            "id":4,
            "nama":"Doni",
            "parent_id":1,
            "child":[
               {
                  "id":5,
                  "nama":"Doko",
                  "parent_id":4,
                  "child":[
                     {
                        "id":6,
                        "nama":"Dotte",
                        "parent_id":5,
                        "child":[

                        ]
                     }
                  ]
               }
            ]
         },
         {
            "id":7,
            "nama":"Darius",
            "parent_id":1,
            "child":[

            ]
         }
      ]
   },
   {
      "id":2,
      "nama":"Joko",
      "parent_id":0,
      "child":[

      ]
   },
   {
      "id":3,
      "nama":"Jotte",
      "parent_id":0,
      "child":[

      ]
   }
]
````


## License
Read [MIT License](LICENSE)
