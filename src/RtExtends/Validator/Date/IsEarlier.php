<?php

namespace RtExtends\Validator\Date;

use Zend\Validator\Date as ZendDate;
use DateTime;

class IsEarlier extends ZendDate
{
  
    const DATE_NOT_EARLIER   = 'dateNotEarlier';
    
    /**
     *
     * @var array 
     */
    protected $messageTemplates = array(
        self::INVALID        => "Invalid type given. String, integer, array or DateTime expected",
        self::INVALID_DATE   => "The input does not appear to be a valid date",
        self::FALSEFORMAT    => "The input does not fit the date format '%format%'",
        self::DATE_NOT_EARLIER  => "The date is not earlier than '%max%'",
    );
    
    /**
     * @var array
     */
    protected $messageVariables = array(
        'format'  => 'format',
        'max'     => 'max'
    );
    
    /**
     *
     * @var string 
     */
    protected $max;


    /**
     * Sets validator options
     * 
     * @param array|Traversable $options OPTIONAL
     */
    public function __construct($options = array())
    {
        parent::__construct($options);
        
        if (array_key_exists('max', $options)) {
            $this->setMax($options['max']);
        }
    }
    
    /**
     *
     * @return string|null 
     */
    public function getMax(){
        return $this->max;
    }
    
    /**
     *
     * @param type $max
     * @return \RtExtends\Validator\Date\IsEarlier
     */
    public function setMax($max = null){
        $this->max = $max;
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
            $this->error(self::FALSEFORMAT); 
            return false;
        }
        
        // test if is later
        $dateA = DateTime::createFromFormat($this->format, $this->max);
        $dateB = DateTime::createFromFormat($this->format, $this->value);
        
        if($dateA > $dateB){
            return true;
        }else{
            $this->error(self::DATE_NOT_EARLIER);
            return false;
        }
    }
}