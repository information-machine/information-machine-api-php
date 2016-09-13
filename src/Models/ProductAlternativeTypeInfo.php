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
class ProductAlternativeTypeInfo implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * @todo Write general description for this property
     * @var string $description public property
     */
    public $description;

    /**
     * Constructor to set initial or default values of member properties
     * @param   string            $name          Initialization value for the property $this->name       
     * @param   integer           $id            Initialization value for the property $this->id         
     * @param   string            $description   Initialization value for the property $this->description
     */
    public function __construct()
    {
        if(3 == func_num_args())
        {
            $this->name        = func_get_arg(0);
            $this->id          = func_get_arg(1);
            $this->description = func_get_arg(2);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['name']        = $this->name;
        $json['id']          = $this->id;
        $json['description'] = $this->description;

        return $json;
    }
}