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
class CategoryInfo implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * @todo Write general description for this property
     * @required
     * @var bool $grocery public property
     */
    public $grocery;

    /**
     * @todo Write general description for this property
     * @maps parent_id
     * @var integer $parentId public property
     */
    public $parentId;

    /**
     * Constructor to set initial or default values of member properties
     * @param   integer           $id          Initialization value for the property $this->id       
     * @param   string            $name        Initialization value for the property $this->name     
     * @param   bool              $grocery     Initialization value for the property $this->grocery  
     * @param   integer           $parentId    Initialization value for the property $this->parentId 
     */
    public function __construct()
    {
        if(4 == func_num_args())
        {
            $this->id        = func_get_arg(0);
            $this->name      = func_get_arg(1);
            $this->grocery   = func_get_arg(2);
            $this->parentId  = func_get_arg(3);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['id']        = $this->id;
        $json['name']      = $this->name;
        $json['grocery']   = $this->grocery;
        $json['parent_id'] = $this->parentId;

        return $json;
    }
}