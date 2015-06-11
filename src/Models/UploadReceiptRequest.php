<?php 
/*
 * InformationMachineAPILib
 *
 * 
 */

namespace InformationMachineAPILib\Models;

use JsonSerializable;

class UploadReceiptRequest implements JsonSerializable {
    /**
     * TODO: Write general description for this property
     * @param string $receiptId public property
     */
    protected $receiptId;

    /**
     * TODO: Write general description for this property
     * @param string $image public property
     */
    protected $image;

    /**
     * Constructor to set initial or default values of member properties
	 * @param   string            $receiptId    Initialization value for the property $this->receiptId 
	 * @param   string            $image        Initialization value for the property $this->image     
     */
    public function __construct()
    {
        if(2 == func_num_args())
        {
            $this->receiptId  = func_get_arg(0);
            $this->image      = func_get_arg(1);
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
        $json['receipt_id'] = $this->receiptId;
        $json['image']      = $this->image;
        return $json;
    }
}