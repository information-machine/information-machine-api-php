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
class FdaRecallData implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @var FdaResult $recall public property
     */
    public $recall;

    /**
     * @todo Write general description for this property
     * @var ProductData $product public property
     */
    public $product;

    /**
     * @todo Write general description for this property
     * @maps recall_purchases
     * @var RecalledProductPurchaseData[] $recallPurchases public property
     */
    public $recallPurchases;

    /**
     * Constructor to set initial or default values of member properties
     * @param   FdaResult         $recall             Initialization value for the property $this->recall          
     * @param   ProductData       $product            Initialization value for the property $this->product         
     * @param   array             $recallPurchases    Initialization value for the property $this->recallPurchases 
     */
    public function __construct()
    {
        if(3 == func_num_args())
        {
            $this->recall           = func_get_arg(0);
            $this->product          = func_get_arg(1);
            $this->recallPurchases  = func_get_arg(2);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['recall']           = $this->recall;
        $json['product']          = $this->product;
        $json['recall_purchases'] = $this->recallPurchases;

        return $json;
    }
}