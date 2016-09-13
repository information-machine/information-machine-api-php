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
class DeleteCartItemWrapper implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @var string $result public property
     */
    public $result;

    /**
     * @todo Write general description for this property
     * @var MetaBase $meta public property
     */
    public $meta;

    /**
     * Constructor to set initial or default values of member properties
     * @param   string            $result   Initialization value for the property $this->result
     * @param   MetaBase          $meta     Initialization value for the property $this->meta  
     */
    public function __construct()
    {
        if(2 == func_num_args())
        {
            $this->result = func_get_arg(0);
            $this->meta   = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['result'] = $this->result;
        $json['meta']   = $this->meta;

        return $json;
    }
}