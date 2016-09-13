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
class PurchaseInfo implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @maps invoice_id
     * @var integer $invoiceId public property
     */
    public $invoiceId;

    /**
     * @todo Write general description for this property
     * @required
     * @maps store_id
     * @var integer $storeId public property
     */
    public $storeId;

    /**
     * @todo Write general description for this property
     * @maps store_name
     * @var string $storeName public property
     */
    public $storeName;

    /**
     * @todo Write general description for this property
     * @maps harvested_name
     * @var string $harvestedName public property
     */
    public $harvestedName;

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
     * @maps unit_price
     * @var double $unitPrice public property
     */
    public $unitPrice;

    /**
     * @todo Write general description for this property
     * @maps purchase_date
     * @var string $purchaseDate public property
     */
    public $purchaseDate;

    /**
     * @todo Write general description for this property
     * @maps recorded_at
     * @var string $recordedAt public property
     */
    public $recordedAt;

    /**
     * Constructor to set initial or default values of member properties
     * @param   integer           $invoiceId        Initialization value for the property $this->invoiceId     
     * @param   integer           $storeId          Initialization value for the property $this->storeId       
     * @param   string            $storeName        Initialization value for the property $this->storeName     
     * @param   string            $harvestedName    Initialization value for the property $this->harvestedName 
     * @param   double            $quantity         Initialization value for the property $this->quantity      
     * @param   double            $price            Initialization value for the property $this->price         
     * @param   double            $unitPrice        Initialization value for the property $this->unitPrice     
     * @param   string            $purchaseDate     Initialization value for the property $this->purchaseDate  
     * @param   string            $recordedAt       Initialization value for the property $this->recordedAt    
     */
    public function __construct()
    {
        if(9 == func_num_args())
        {
            $this->invoiceId      = func_get_arg(0);
            $this->storeId        = func_get_arg(1);
            $this->storeName      = func_get_arg(2);
            $this->harvestedName  = func_get_arg(3);
            $this->quantity       = func_get_arg(4);
            $this->price          = func_get_arg(5);
            $this->unitPrice      = func_get_arg(6);
            $this->purchaseDate   = func_get_arg(7);
            $this->recordedAt     = func_get_arg(8);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['invoice_id']     = $this->invoiceId;
        $json['store_id']       = $this->storeId;
        $json['store_name']     = $this->storeName;
        $json['harvested_name'] = $this->harvestedName;
        $json['quantity']       = $this->quantity;
        $json['price']          = $this->price;
        $json['unit_price']     = $this->unitPrice;
        $json['purchase_date']  = $this->purchaseDate;
        $json['recorded_at']    = $this->recordedAt;

        return $json;
    }
}