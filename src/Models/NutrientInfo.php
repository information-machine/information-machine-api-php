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
class NutrientInfo implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * @todo Write general description for this property
     * @maps recommended_daily_value
     * @var double $recommendedDailyValue public property
     */
    public $recommendedDailyValue;

    /**
     * @todo Write general description for this property
     * @maps preferred_unit_of_measurement
     * @var string $preferredUnitOfMeasurement public property
     */
    public $preferredUnitOfMeasurement;

    /**
     * @todo Write general description for this property
     * @maps unit_of_measurement
     * @var string $unitOfMeasurement public property
     */
    public $unitOfMeasurement;

    /**
     * @todo Write general description for this property
     * @var string $description public property
     */
    public $description;

    /**
     * @todo Write general description for this property
     * @var string $name public property
     */
    public $name;

    /**
     * Constructor to set initial or default values of member properties
     * @param   integer           $id                              Initialization value for the property $this->id                           
     * @param   double            $recommendedDailyValue           Initialization value for the property $this->recommendedDailyValue        
     * @param   string            $preferredUnitOfMeasurement      Initialization value for the property $this->preferredUnitOfMeasurement   
     * @param   string            $unitOfMeasurement               Initialization value for the property $this->unitOfMeasurement            
     * @param   string            $description                     Initialization value for the property $this->description                  
     * @param   string            $name                            Initialization value for the property $this->name                         
     */
    public function __construct()
    {
        if(6 == func_num_args())
        {
            $this->id                            = func_get_arg(0);
            $this->recommendedDailyValue         = func_get_arg(1);
            $this->preferredUnitOfMeasurement    = func_get_arg(2);
            $this->unitOfMeasurement             = func_get_arg(3);
            $this->description                   = func_get_arg(4);
            $this->name                          = func_get_arg(5);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['id']                            = $this->id;
        $json['recommended_daily_value']       = $this->recommendedDailyValue;
        $json['preferred_unit_of_measurement'] = $this->preferredUnitOfMeasurement;
        $json['unit_of_measurement']           = $this->unitOfMeasurement;
        $json['description']                   = $this->description;
        $json['name']                          = $this->name;

        return $json;
    }
}