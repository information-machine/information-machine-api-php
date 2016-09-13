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
class PurchasedItem implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @maps product_id
     * @var integer $productId public property
     */
    public $productId;

    /**
     * @todo Write general description for this property
     * @var string $name public property
     */
    public $name;

    /**
     * @todo Write general description for this property
     * @maps purchase_history
     * @var PurchaseInfo[] $purchaseHistory public property
     */
    public $purchaseHistory;

    /**
     * @todo Write general description for this property
     * @maps product_timestamps
     * @var ProductTimestamps $productTimestamps public property
     */
    public $productTimestamps;

    /**
     * @todo Write general description for this property
     * @maps product_identifiers
     * @var ProductIdentifiers $productIdentifiers public property
     */
    public $productIdentifiers;

    /**
     * @todo Write general description for this property
     * @maps product_details
     * @var ProductData $productDetails public property
     */
    public $productDetails;

    /**
     * Constructor to set initial or default values of member properties
     * @param   integer           $productId             Initialization value for the property $this->productId          
     * @param   string            $name                  Initialization value for the property $this->name               
     * @param   array             $purchaseHistory       Initialization value for the property $this->purchaseHistory    
     * @param   ProductTimestamps   $productTimestamps     Initialization value for the property $this->productTimestamps  
     * @param   ProductIdentifiers   $productIdentifiers    Initialization value for the property $this->productIdentifiers 
     * @param   ProductData       $productDetails        Initialization value for the property $this->productDetails     
     */
    public function __construct()
    {
        if(6 == func_num_args())
        {
            $this->productId           = func_get_arg(0);
            $this->name                = func_get_arg(1);
            $this->purchaseHistory     = func_get_arg(2);
            $this->productTimestamps   = func_get_arg(3);
            $this->productIdentifiers  = func_get_arg(4);
            $this->productDetails      = func_get_arg(5);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['product_id']          = $this->productId;
        $json['name']                = $this->name;
        $json['purchase_history']    = $this->purchaseHistory;
        $json['product_timestamps']  = $this->productTimestamps;
        $json['product_identifiers'] = $this->productIdentifiers;
        $json['product_details']     = $this->productDetails;

        return $json;
    }
}