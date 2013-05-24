rt-extends [![Build Status](https://travis-ci.org/remithomas/rt-extends.png?branch=master)](https://travis-ci.org/remithomas/rt-extends)
==========

A list of ZF2 useful tools. To provide some utilities to generate list of languages, Sql query (on duplicate key update), flashmessenger, countries states and more

---------------------------------------
# Features / Goals


* **Sql** : Db\Sql\DuplicateInsert ON DUPLICATE KEY UPDATE option
* **Validators** : Date is later, is Earlier
* **Useful**
    * **Location** : List of countries, states list, zipcode search
    * **I18n** : continents list, languages list, Timezones list
    * **Data** : Fake data *Lorem Ipsum* generator
    * **File** : create Zip Archive, unzip archive, get Favicon
    * **PHP** : [sprintf](http://php.net/manual/en/function.sprintf.php) with dynamic variables
* **View\Helper** : extended Flash messenger (sub-message and messages are translated)
* **Snippets** : create basic CSRF quickly

---------------------------------------
# Ask for contributions
Some ideas [to implement](https://github.com/remithomas/rt-extends/pulls) to this useful code ? Or ups [some errors appear](https://github.com/remithomas/rt-extends/issues) 


# Requirements

* [Zend Framework 2](https://github.com/zendframework/zf2) (latest master)
* [umpirsky/country-list](https://github.com/umpirsky/country-list) (latest master)
* ZipArchive
* CURL extension

# Installation
---------------------------------------
## How to install ?

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
---------------------------------------
## Db\Sql\DuplicateInsert

```php
<?php
$value = array(
    'user_id' => 2,
    'value' => 'myvalue'
);
            
$DuplicateInsert = new RtExtends\Db\Sql\DuplicateInsert("user");
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

## Validator\Date\IsLater

```php
public function getInputFilterSpecification()
{
    return array(
        'datestart' => array(
            'required' => true,
            'validators' => array(
                array(
                    'name' => "RtExtends\Validator\Date\IsLater",
                    'options' => array(
                        'min' => date ("d F Y - H:i", mktime()),
                        'format' => 'd F Y - H:i',
                        'timezone' => 'Europe/London'
                    )
                )
            ),
        ),
    );
}
```

## Validator\Date\IsEarlier

```php
public function getInputFilterSpecification()
{
    return array(
        'dateend' => array(
            'required' => true,
            'validators' => array(
                array(
                    'name' => "RtExtends\Validator\Date\IsEarlier",
                    'options' => array(
                        'max' => date ("d F Y - H:i", mktime()),
                        'format' => 'd F Y - H:i',
                        'timezone' => 'Europe/London'
                    )
                )
            ),
        ),
    );
}
```

## Useful\I18n\Languages
List of languages
```php
var_dump(RtExtends\Useful\I18n\Languages::getSimpleCodeLanguages());
// array("fr"=>"Français","en"=>"English",'pt'=>'Português',....)
```

```php
var_dump(RtExtends\Useful\I18n\Languages::getLanguages());
// array('lv_LV'=>'Latvija - Latviešu','en_LB'=>'Lebanon - English','lt_LT'=>'Lietuva - Lietuvių','fr_LU'=>'Luxembourg - Français',,....)
```

## Useful\Location
List of countries (array returned)
```php
\RtExtends\Useful\Location\Countries::getCountries();
```

Zipcode
```php
\RtExtends\Useful\Location\Ziptastic::dataLocation("US", "33330");
/*
Return a stdClass object
object(stdClass)#748 (3) {
  ["city"] => string(15) "Fort Lauderdale"
  ["state"] => string(7) "Florida"
  ["country"] => string(2) "US"
}
*/
```

States of countries (US, FR are available)
```php
\RtExtends\Useful\Location\Country\Us::states();
\RtExtends\Useful\Location\Country\Us::statesFIPS(); // FIPS codes
\RtExtends\Useful\Location\Country\Fr::states();
```

Counties of countries (US, FR are available)
```php
\RtExtends\Useful\Location\Country\Fr::counties();
\RtExtends\Useful\Location\Country\Fr::countiesStructured(); // by states
\RtExtends\Useful\Location\Country\Us::counties();
\RtExtends\Useful\Location\Country\Us::countiesStructured(); // by states
```

## Useful\File\Zip
Create zip file

```php
<?php
$files=array('file1.jpg', 'file2.jpg', 'file3.gif');
/**
 *
 * @param array $files
 * @param string $destination
 * @param bool $overwrite
 * @return boolean 
 */
RtExtends\Useful\File\Zip::createZip($files, 'path/destination/myzipfile.zip', true); 
?> 
```

Unzip archive
```php
<?php
RtExtends\Useful\File\Zip::unzip('path/to/archive', 'path/destination'); 
?> 
```

## Useful\Data\Fake

### Lorem Ipsum : Paragraph
Generate paragraphs
```php
<?php 
// simple use : generate only one paragraph (element p)
echo \RtExtends\Useful\Data\Fake::getParagraphLoremIpsum(); 

// generate 3 paragraphs (element <p>) with class 'lead'
echo \RtExtends\Useful\Data\Fake::getParagraphLoremIpsum(3,"p",array("class"=>"lead")); 

// generate 2 divs (element <div>) with class 'alert alert-info'
echo \RtExtends\Useful\Data\Fake::getParagraphLoremIpsum(2,"div",array("class"=>"alert alert-info")); 
?>
```

If you don't need to get a list of random paragraphs, just do like that
```php
echo \RtExtends\Useful\Data\Fake::getParagraphLoremIpsum(2,"div",array("class"=>"alert alert-info"),false); 
?>
```

### Lorem Ipsum : Words
```php
// simple use : 10 words
echo \RtExtends\Useful\Data\Fake::getWordLoremIpsum(10);

// include in tag (ex: <p class='lead>>)
echo \RtExtends\Useful\Data\Fake::getWordLoremIpsum(10,"p",array("class"=>"lead"),"!");

// no random option
echo \RtExtends\Useful\Data\Fake::getWordLoremIpsum(10,"p",array("class"=>"lead"),"!", false);

// no random option but a special line
echo \RtExtends\Useful\Data\Fake::getWordLoremIpsum(10,"p",array("class"=>"lead"),"!", 3);
```

## Useful\Php\String
```php
$data = array("this", "cool");
echo RtExtends\Useful\Php\String::sprintfArray("%s is %s", $data);

$data = array(
    "otherway" => "Or",
    "second" => "like that"
);
echo RtExtends\Useful\Php\String::sprintfArray("%(otherway)s maybe %(second)s !", $data);
```

## View\Helper\ExtendedFlashMessenger

### In your layout
```php
echo $this->extendedFlashMessenger(true); // true is to get also current messages
```

### In your controller
```php
// Success !
$flashMessage = new FlashMessage();
$flashMessage->setTitle("bravo");
$flashMessage->setMessages("Yes you did");

$this->flashmessenger()->addSuccessMessage($flashMessage);
```
With variable
```php
    
// Ups error ! (with sub messages
$subMessage = new FlashMessageSub();
$subMessage->setMessage("Ups %(name)s"); // first message
$subMessage->setVariables(array(
    'name' => "John Doe"
));

$subMessageSecond = new FlashMessageSub();
$subMessageSecond->setMessage("Please  check here %(url)s"); // first message
$subMessageSecond->setVariables(array(
    'url' => "http://php.net"
));

$flashMessage = new FlashMessage();
$flashMessage->setTitle("Sorry");
$flashMessage->setMessages(array($subMessage,$subMessageSecond));
                
$this->flashmessenger()->addErrorMessage($flashMessage);
```

## Snippets
Some quick snippets
### Snippets\Form\Element
```php
$form = new Form('my-form');
$form->add(\RtExtends\Snippets\Form\Element\Csrf::getCreateElementArray("crsf", 60*60));
/* generate
$form->add(array(
    'type' => 'Zend\Form\Element\Csrf',
    'name' => 'crsf',
    'options' => array(
        'csrf_options' => array(
            'timeout' => '3600'
        )
    )
));*/
```

### Snippets\Js
Jquery
```php
<?php 
echo \RtExtends\Snippets\Js\Jquery::getUrl(); 
echo "http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js";

echo \RtExtends\Snippets\Js\Jquery::getUrl("2.0.0"); 
echo "http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js";
?>
```
Jquery UI
```php
<?php 
echo \RtExtends\Snippets\Js\Jqueryui::getUrl(); 
echo "http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js";
?>
```

# Thanks
---------------------------------------
* To [Saša Stamenković](https://github.com/umpirsky) for [his great module](https://github.com/umpirsky/country-list).
* To [Thomas Schultz](https://twitter.com/#!/daspecster) for [Ziptastic](http://daspecster.github.io/ziptastic/index.html) and don't foget to support this module!

# Todo
---------------------------------------
* many other validators
* Fake data (more tool)
* some good helpers
* Currency
* More countries
