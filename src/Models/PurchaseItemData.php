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
class PurchaseItemData implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * @todo Write general description for this property
     * @required
     * @maps purchase_id
     * @var integer $purchaseId public property
     */
    public $purchaseId;

    /**
     * @todo Write general description for this property
     * @var string $name public property
     */
    public $name;

    /**
     * @todo Write general description for this property
     * @var double $quantity public property
     */
    public $quantity;

    /**
     * @todo Write general description for this property
     * @var double $price public property
     */
    public $price;

    /**
     * @todo Write general description for this property
     * @maps discounted_price
     * @var double $discountedPrice public property
     */
    public $discountedPrice;

    /**
     * @todo Write general description for this property
     * @maps unit_of_measurement
     * @var string $unitOfMeasurement public property
     */
    public $unitOfMeasurement;

    /**
     * @todo Write general description for this property
     * @var string $upc public property
     */
    public $upc;

    /**
     * @todo Write general description for this property
     * @maps upc_resolved_at
     * @var string $upcResolvedAt public property
     */
    public $upcResolvedAt;

    /**
     * @todo Write general description for this property
     * @var ProductData $product public property
     */
    public $product;

    /**
     * Constructor to set initial or default values of member properties
     * @param   integer           $id                    Initialization value for the property $this->id                 
     * @param   integer           $purchaseId            Initialization value for the property $this->purchaseId         
     * @param   string            $name                  Initialization value for the property $this->name               
     * @param   double            $quantity              Initialization value for the property $this->quantity           
     * @param   double            $price                 Initialization value for the property $this->price              
     * @param   double            $discountedPrice       Initialization value for the property $this->discountedPrice    
     * @param   string            $unitOfMeasurement     Initialization value for the property $this->unitOfMeasurement  
     * @param   string            $upc                   Initialization value for the property $this->upc                
     * @param   string            $upcResolvedAt         Initialization value for the property $this->upcResolvedAt      
     * @param   ProductData       $product               Initialization value for the property $this->product            
     */
    public function __construct()
    {
        if(10 == func_num_args())
        {
            $this->id                  = func_get_arg(0);
            $this->purchaseId          = func_get_arg(1);
            $this->name                = func_get_arg(2);
            $this->quantity            = func_get_arg(3);
            $this->price               = func_get_arg(4);
            $this->discountedPrice     = func_get_arg(5);
            $this->unitOfMeasurement   = func_get_arg(6);
            $this->upc                 = func_get_arg(7);
            $this->upcResolvedAt       = func_get_arg(8);
            $this->product             = func_get_arg(9);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['id']                  = $this->id;
        $json['purchase_id']         = $this->purchaseId;
        $json['name']                = $this->name;
        $json['quantity']            = $this->quantity;
        $json['price']               = $this->price;
        $json['discounted_price']    = $this->discountedPrice;
        $json['unit_of_measurement'] = $this->unitOfMeasurement;
        $json['upc']                 = $this->upc;
        $json['upc_resolved_at']     = $this->upcResolvedAt;
        $json['product']             = $this->product;

        return $json;
    }
}