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
class UploadBarcodeRequest implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @maps bar_code
     * @var string $barCode public property
     */
    public $barCode;

    /**
     * @todo Write general description for this property
     * @required
     * @maps bar_code_type
     * @var string $barCodeType public property
     */
    public $barCodeType;

    /**
     * Constructor to set initial or default values of member properties
     * @param   string            $barCode         Initialization value for the property $this->barCode      
     * @param   string            $barCodeType     Initialization value for the property $this->barCodeType  
     */
    public function __construct()
    {
        if(2 == func_num_args())
        {
            $this->barCode       = func_get_arg(0);
            $this->barCodeType   = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['bar_code']      = $this->barCode;
        $json['bar_code_type'] = $this->barCodeType;

        return $json;
    }
}