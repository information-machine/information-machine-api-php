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
class UploadBarcodeResponse implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @maps bar_code
     * @var string $barCode public property
     */
    public $barCode;

    /**
     * @todo Write general description for this property
     * @maps bar_code_type
     * @var string $barCodeType public property
     */
    public $barCodeType;

    /**
     * @todo Write general description for this property
     * @var ProductData $apiProduct public property
     */
    public $apiProduct;

    /**
     * Constructor to set initial or default values of member properties
     * @param   string            $barCode         Initialization value for the property $this->barCode      
     * @param   string            $barCodeType     Initialization value for the property $this->barCodeType  
     * @param   ProductData       $apiProduct      Initialization value for the property $this->apiProduct   
     */
    public function __construct()
    {
        if(3 == func_num_args())
        {
            $this->barCode       = func_get_arg(0);
            $this->barCodeType   = func_get_arg(1);
            $this->apiProduct    = func_get_arg(2);
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
        $json['apiProduct']    = $this->apiProduct;

        return $json;
    }
}