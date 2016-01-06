<?php 
/*
 * InformationMachineAPILib
 *
 * 
 */

namespace InformationMachineAPILib\Models;

use JsonSerializable;

class ConnectOAuthUserStoreRequest implements JsonSerializable {
    /**
     * TODO: Write general description for this property
     * @param int $storeId public property
     */
    protected $storeId;

    /**
     * TODO: Write general description for this property
     * @param string $oauthProvider public property
     */
    protected $oauthProvider;

    /**
     * Constructor to set initial or default values of member properties
	 * @param   int               $storeId          Initialization value for the property $this->storeId       
	 * @param   string            $oauthProvider    Initialization value for the property $this->oauthProvider 
     */
    public function __construct()
    {
        if(2 == func_num_args())
        {
            $this->storeId        = func_get_arg(0);
            $this->oauthProvider  = func_get_arg(1);
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
        $json['store_id']       = $this->storeId;
        $json['oauth_provider'] = $this->oauthProvider;
        return $json;
    }
}