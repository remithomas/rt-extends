rt-extends
==========

zf2 useful tools

Features / Goals
============

* **Sql** : Db\Sql\Insert ON DUPLICATE KEY UPDATE option
* **Validators** : Date is later
* **Useful**
    * **Countries** : List of countries
    * **Languages** : continents list, languages list, Timezones list

Requirements
============

* [Zend Framework 2](https://github.com/zendframework/zf2) (latest master)
* [umpirsky/country-list](https://github.com/umpirsky/country-list) (latest master)

# Installation

How to install ?
================
### Using composer.json

```json
{
    "name": "zendframework/skeleton-application",
    "description": "Skeleton Application for ZF2",
    "license": "BSD-3-Clause",
    "keywords": [
        "framework",
        "zf2"
    ],
    "minimum-stability": "dev",
    "homepage": "http://framework.zend.com/",
    "require": {
        "php": ">=5.3.3",
        "zendframework/zendframework": "dev-master",
        "remithomas/rt-extends": "dev-master"
    }
}
```

### Activate the module :

application.config.php
```php
<?php
return array(
    'modules' => array(
        'Application',
        'RtExtends',
    )
);
?>
```

# Examples

## Db\Sql\Insert

```php
<?php

$value = array(
    'user_id' => 2,
    'value' => 'myvalue'
);
            
$DuplicateInsert = new RtExtends\Db\Sql\Insert("user");
$DuplicateInsert->values($value);

$statment = $this->dbAdapter->createStatement(); 
$DuplicateInsert->prepareStatement($this->dbAdapter, $statment); 
$statment->execute(); 

?>
```

the above code generates this query

```sql
INSERT INTO `user` (`user_id`, `value`) 
VALUES (2, 'myvalue')
  ON DUPLICATE KEY UPDATE `user_id`=VALUES(`user_id`), `value`=VALUES(`value`);
```


Thanks
======
To [Saša Stamenković](https://github.com/umpirsky) for [his great module](https://github.com/umpirsky/country-list).


Todo
====
* many other validators
* some good helpers
* devise
