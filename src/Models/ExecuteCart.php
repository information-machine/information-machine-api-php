<?php 
/*
 * InformationMachineAPILib
 *
 * 
 */

namespace InformationMachineAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class ExecuteCart implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @maps checkout_url
     * @var string $checkoutUrl public property
     */
    public $checkoutUrl;

    /**
     * @todo Write general description for this property
     * @var string $message public property
     */
    public $message;

    /**
     * Constructor to set initial or default values of member properties
     * @param   string            $checkoutUrl    Initialization value for the property $this->checkoutUrl 
     * @param   string            $message        Initialization value for the property $this->message     
     */
    public function __construct()
    {
        if(2 == func_num_args())
        {
            $this->checkoutUrl  = func_get_arg(0);
            $this->message      = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['checkout_url'] = $this->checkoutUrl;
        $json['message']      = $this->message;

        return $json;
    }
}