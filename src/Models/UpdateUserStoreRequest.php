<?php 
/*
 * InformationMachineAPILib
 *
 * 
 */

namespace InformationMachineAPILib\Models;

use JsonSerializable;

class UpdateUserStoreRequest implements JsonSerializable {
    /**
     * TODO: Write general description for this property
     * @param string $username public property
     */
    protected $username;

    /**
     * TODO: Write general description for this property
     * @param string $password public property
     */
    protected $password;

    /**
     * Constructor to set initial or default values of member properties
	 * @param   string            $username   Initialization value for the property $this->username
	 * @param   string            $password   Initialization value for the property $this->password
     */
    public function __construct()
    {
        if(2 == func_num_args())
        {
            $this->username = func_get_arg(0);
            $this->password = func_get_arg(1);
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
        $json['username'] = $this->username;
        $json['password'] = $this->password;
        return $json;
    }
}