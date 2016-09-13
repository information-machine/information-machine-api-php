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
class AddCartItemRequest implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @var string $upc public property
     */
    public $upc;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $quantity public property
     */
    public $quantity;

    /**
     * Constructor to set initial or default values of member properties
     * @param   string            $upc        Initialization value for the property $this->upc     
     * @param   integer           $quantity   Initialization value for the property $this->quantity
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