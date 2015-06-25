<?php 
/*
 * InformationMachineAPILib
 *
 * 
 */

namespace InformationMachineAPILib\Models;

use JsonSerializable;

class AddCartItemRequest implements JsonSerializable {
    /**
     * TODO: Write general description for this property
     * @param string $upc public property
     */
    protected $upc;

    /**
     * TODO: Write general description for this property
     * @param int $quantity public property
     */
    protected $quantity;

    /**
     * Constructor to set initial or default values of member properties
	 * @param   string            $upc        Initialization value for the property $this->upc     
	 * @param   int               $quantity   Initialization value for the property $this->quantity
     */
    public function __construct()
    {
        if(2 == func_num_args())
        {
            $this->upc      = func_get_arg(0);
            $this->quantity = func_get_arg(1);
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
        $json['upc']      = $this->upc;
        $json['quantity'] = $this->quantity;
        return $json;
    }
}