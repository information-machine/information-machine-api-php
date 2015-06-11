<?php 
/*
 * InformationMachineAPILib
 *
 * 
 */

namespace InformationMachineAPILib\Models;

use JsonSerializable;

class RegisterUserRequest implements JsonSerializable {
    /**
     * TODO: Write general description for this property
     * @param string|null $email public property
     */
    protected $email;

    /**
     * TODO: Write general description for this property
     * @param string|null $zip public property
     */
    protected $zip;

    /**
     * TODO: Write general description for this property
     * @param string $userId public property
     */
    protected $userId;

    /**
     * Constructor to set initial or default values of member properties
	 * @param   string|null       $email     Initialization value for the property $this->email  
	 * @param   string|null       $zip       Initialization value for the property $this->zip    
	 * @param   string            $userId    Initialization value for the property $this->userId 
     */
    public function __construct()
    {
        if(3 == func_num_args())
        {
            $this->email   = func_get_arg(0);
            $this->zip     = func_get_arg(1);
            $this->userId  = func_get_arg(2);
        }
    }

    /**
     * Return a property of the response if it exists.
     * Possibilities include: code, raw_body, headers, body (if the response is json-decodable)
     * @return mixed
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            //UTF-8 is recommended for correct JSON serialization
            $value = $this->$property;
            if (is_string($value) && mb_detect_encoding($value, "UTF-8", TRUE) != "UTF-8") {
                return utf8_encode($value);
            }
            else {
                return $value;
            }
        }
    }
    
    /**
     * Set the properties of this object
     * @param string $property the property name
     * @param mixed $value the property value
     */
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            //UTF-8 is recommended for correct JSON serialization
            if (is_string($value) && mb_detect_encoding($value, "UTF-8", TRUE) != "UTF-8") {
                $this->$property = utf8_encode($value);
            }
            else {
                $this->$property = $value;
            }
        }

        return $this;
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['email']   = $this->email;
        $json['zip']     = $this->zip;
        $json['user_id'] = $this->userId;
        return $json;
    }
}