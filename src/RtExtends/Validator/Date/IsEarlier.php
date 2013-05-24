<?php
/**
 * validator is earlier
 * @author Remi THOMAS 
 */

namespace RtExtends\Validator\Date;

use Zend\Validator\Date as ZendDate;
use DateTime;

/**
 * IsEarlier class
 */
class IsEarlier extends ZendDate
{
    
    const DATE_NOT_EARLIER   = 'dateNotEarlier';
    
    /**
     * Message templates
     * @var array 
     */
    protected $messageTemplates = array(
        self::INVALID        => "Invalid type given. String, integer, array or DateTime expected",
        self::INVALID_DATE   => "The input does not appear to be a valid date",
        self::FALSEFORMAT    => "The input does not fit the date format '%format%'",
        self::DATE_NOT_EARLIER  => "The date is not earlier than '%max%' %timezone%",
    );
    
    /**
     * Message variables
     * @var array
     */
    protected $messageVariables = array(
        'format'  => 'format',
        'max'     => 'max',
        'timezone'=> 'timezone'
    );
    
    /**
     * Max date
     * @var string 
     */
    protected $max;

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
        
        if (array_key_exists('max', $options)) {
            $this->setMax($options['max']);
        }
        
        if (array_key_exists('timezone', $options)) {
            $this->setTimezone($options['timezone']);
        }
    }
    
    /**
     * Return max date
     * @return string|null 
     */
    public function getMax(){
        return $this->max;
    }
    
    /**
     * Set max date
     * @param string $max
     * @return \RtExtends\Validator\Date\IsEarlier
     */
    public function setMax($max = null){
        $this->max = $max;
        return $this;
    }
    
    /**
     * Set a timezone
     * @param string $timezone
     * @return \RtExtends\Validator\Date\IsLater 
     */
    public function setTimezone($timezone = null){
        $this->timezone = $timezone;
        return $this;
    }
    
    /**
     * Return timezone
     * @return string 
     */
    public function getTimezone(){
        return $this->timezone;
    }
    
    /**
     * Validate a value
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
        // timezone
        if(!$this->timezone != ""){
            $timezone = new \DateTimeZone($this->timezone);
            $dateA = DateTime::createFromFormat($this->format, $this->max, $timezone);
            $dateB = DateTime::createFromFormat($this->format, $this->value, $timezone);
        }else{
            $dateA = DateTime::createFromFormat($this->format, $this->max);
            $dateB = DateTime::createFromFormat($this->format, $this->value);
        }
        
        if($dateA > $dateB){
            return true;
        }else{
            $this->error(self::DATE_NOT_EARLIER);
            return false;
        }
    }
}