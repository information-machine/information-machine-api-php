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
class ProductTimestamps implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @maps upc_resolved_at
     * @var string $upcResolvedAt public property
     */
    public $upcResolvedAt;

    /**
     * @todo Write general description for this property
     * @maps recorded_at
     * @var string $recordedAt public property
     */
    public $recordedAt;

    /**
     * Constructor to set initial or default values of member properties
     * @param   string            $upcResolvedAt     Initialization value for the property $this->upcResolvedAt  
     * @param   string            $recordedAt        Initialization value for the property $this->recordedAt     
     */
    public function __construct()
    {
        if(2 == func_num_args())
        {
            $this->upcResolvedAt   = func_get_arg(0);
            $this->recordedAt      = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['upc_resolved_at'] = $this->upcResolvedAt;
        $json['recorded_at']     = $this->recordedAt;

        return $json;
    }
}