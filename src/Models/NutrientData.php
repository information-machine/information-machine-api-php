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
class NutrientData implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * @todo Write general description for this property
     * @var double $dvp public property
     */
    public $dvp;

    /**
     * @todo Write general description for this property
     * @var double $value public property
     */
    public $value;

    /**
     * @todo Write general description for this property
     * @var string $name public property
     */
    public $name;

    /**
     * Constructor to set initial or default values of member properties
     * @param   integer           $id      Initialization value for the property $this->id   
     * @param   double            $dvp     Initialization value for the property $this->dvp  
     * @param   double            $value   Initialization value for the property $this->value
     * @param   string            $name    Initialization value for the property $this->name 
     */
    public function __construct()
    {
        if(4 == func_num_args())
        {
            $this->id    = func_get_arg(0);
            $this->dvp   = func_get_arg(1);
            $this->value = func_get_arg(2);
            $this->name  = func_get_arg(3);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['id']    = $this->id;
        $json['dvp']   = $this->dvp;
        $json['value'] = $this->value;
        $json['name']  = $this->name;

        return $json;
    }
}