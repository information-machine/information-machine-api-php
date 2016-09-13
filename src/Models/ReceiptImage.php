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
class ReceiptImage implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @var string $url public property
     */
    public $url;

    /**
     * Constructor to set initial or default values of member properties
     * @param   string            $url   Initialization value for the property $this->url
     */
    public function __construct()
    {
        if(1 == func_num_args())
        {
            $this->url = func_get_arg(0);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['url'] = $this->url;

        return $json;
    }
}