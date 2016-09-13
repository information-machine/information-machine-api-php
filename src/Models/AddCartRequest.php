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
class AddCartRequest implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @maps cart_name
     * @var string $cartName public property
     */
    public $cartName;

    /**
     * @todo Write general description for this property
     * @var string $description public property
     */
    public $description;

    /**
     * Constructor to set initial or default values of member properties
     * @param   string            $cartName      Initialization value for the property $this->cartName   
     * @param   string            $description   Initialization value for the property $this->description
     */
    public function __construct()
    {
        if(2 == func_num_args())
        {
            $this->cartName    = func_get_arg(0);
            $this->description = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['cart_name']   = $this->cartName;
        $json['description'] = $this->description;

        return $json;
    }
}