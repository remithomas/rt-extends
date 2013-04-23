rt-extends
==========

zf2 useful tools

Features / Goals
============

* Sql : Db\Sql\Insert ON DUPLICATE KEY UPDATE option
* Validators : Date is later
* Useful
** Countries : List of countries
** Languages : continents list, languages list, Timezones list

Requirements
============

* 

How to install ?
============
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

Thanks
======



Todo
======
* many other validators
* some good helpers
* devise
