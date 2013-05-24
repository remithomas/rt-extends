<?php
/**
 * Validator is later
 * @author Remi THOMAS
 */

namespace RtExtends\Validator\Date;

use Zend\Validator\Date as ZendDate;
use DateTime,
    DateTimeZone;

/**
 * IsLater class
 */
class IsLater extends ZendDate
{
  
    const DATE_NOT_LATER   = 'dateNotLater';
    
    /**
     * Message templates
     * @var array 
     */
    protected $messageTemplates = array(
        self::INVALID        => "Invalid type given. String, integer, array or DateTime expected",
        self::INVALID_DATE   => "The input does not appear to be a valid date",
        self::FALSEFORMAT    => "The input does not fit the date format '%format%'",
        self::DATE_NOT_LATER  => "The date is not later than '%min%' %timezone%",
    );
    
    /**
     * Message variables
     * @var array
     */
    protected $messageVariables = array(
        'format'  => 'format',
        'min'     => 'min',
        'timezone'=> 'timezone'
    );
    
    /**
     * Min date
     * @var string 
     */
    protected $min;

    /**
     * Timezone
     * @var string 
     */
    protected $timezone = "";

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
        
        if (array_key_exists('timezone', $options)) {
            $this->setTimezone($options['timezone']);
        }
    }
    
    /**
     * Return min date
     * @return string|null 
     */
    public function getMin(){
        return $this->min;
    }
    
    /**
     * Set min date
     * @param string $min
     * @return \RtExtends\Validator\Date\IsLater 
     */
    public function setMin($min = null){
        $this->min = $min;
        return $this;
    }
    
    /**
     * Set timezone
     * @param string $timezone
     * @return \RtExtends\Validator\Date\IsLater 
     */
    public function setTimezone($timezone = null){
        $this->timezone = $timezone;
        return $this;
    }
    
    /**
     * Return tiezone
     * @return string 
     */
    public function getTimezone(){
        return $this->timezone;
    }
    
    /**
     * Valid a value
     * @param string|array|int|DateTime $value
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
        
        // timezone
        if(!$this->timezone != ""){
            $timezone = new \DateTimeZone($this->timezone);
            $dateA = DateTime::createFromFormat($this->format, $this->min, $timezone);
        $dateB = DateTime::createFromFormat($this->format, $this->value, $timezone);
        }else{
            $dateA = DateTime::createFromFormat($this->format, $this->min);
            $dateB = DateTime::createFromFormat($this->format, $this->value);
        }
        
        // test if is later
        if($dateA < $dateB){
            return true;
        }else{
            $this->error(self::DATE_NOT_LATER);
            return false;
        }
    }
}