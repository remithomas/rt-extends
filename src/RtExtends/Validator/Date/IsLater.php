<?php

namespace RtExtends\Validator\Date;

use Zend\Validator\Date as ZendDate;
use DateTime;

class IsLater extends ZendDate
{
  
    const DATE_NOT_LATER   = 'dateNotLater';
    
    /**
     *
     * @var array 
     */
    protected $messageTemplates = array(
        self::INVALID        => "Invalid type given. String, integer, array or DateTime expected",
        self::INVALID_DATE   => "The input does not appear to be a valid date",
        self::FALSEFORMAT    => "The input does not fit the date format '%format%'",
        self::DATE_NOT_LATER  => "The date is not later than '%min%'",
    );
    
    /**
     * @var array
     */
    protected $messageVariables = array(
        'format'  => 'format',
        'min'     => 'min'
    );
    
    /**
     *
     * @var string 
     */
    protected $min;


    /**
     * Sets validator options
     * 
     * @param array|Traversable $options OPTIONAL
     */
    public function __construct($options = array())
    {
        parent::__construct($options);
        
        if (array_key_exists('min', $options)) {
            $this->setMin($options['min']);
        }
    }
    
    /**
     *
     * @return string|null 
     */
    public function getMin(){
        return $this->min;
    }
    
    /**
     *
     * @param type $min
     * @return \RtExtends\Validator\Date\IsLater 
     */
    public function setMin($min = null){
        $this->min = $min;
        return $this;
    }
    
    /**
     *
     * @param  string|array|int|DateTime $value
     * @return bool
     */
    public function isValid($value)
    {
        /// valid date
        $parentTest = parent::isValid($value);
        
        if(!$parentTest){
            return false;
        }
        
        // test if is later
        $dateA = DateTime::createFromFormat($this->format, $this->min);
        $dateB = DateTime::createFromFormat($this->format, $this->value);
        
        if($dateA < $dateB){
            return true;
        }else{
            $this->error(self::DATE_NOT_LATER);
            return false;
        }
    }
}