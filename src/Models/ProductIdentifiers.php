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
class ProductIdentifiers implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @var array $upcs public property
     */
    public $upcs;

    /**
     * @todo Write general description for this property
     * @var array $plus public property
     */
    public $plus;

    /**
     * Constructor to set initial or default values of member properties
     * @param   array             $upcs   Initialization value for the property $this->upcs
     * @param   array             $plus   Initialization value for the property $this->plus
     */
    public function __construct()
    {
        if(2 == func_num_args())
        {
            $this->upcs = func_get_arg(0);
            $this->plus = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['upcs'] = $this->upcs;
        $json['plus'] = $this->plus;

        return $json;
    }
}