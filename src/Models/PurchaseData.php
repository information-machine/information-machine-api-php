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
class PurchaseData implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @maps purchased_items
     * @var PurchasedItem[] $purchasedItems public property
     */
    public $purchasedItems;

    /**
     * @todo Write general description for this property
     * @var InvoiceData[] $invoices public property
     */
    public $invoices;

    /**
     * Constructor to set initial or default values of member properties
     * @param   array             $purchasedItems    Initialization value for the property $this->purchasedItems 
     * @param   array             $invoices          Initialization value for the property $this->invoices       
     */
    public function __construct()
    {
        if(2 == func_num_args())
        {
            $this->purchasedItems  = func_get_arg(0);
            $this->invoices        = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['purchased_items'] = $this->purchasedItems;
        $json['invoices']        = $this->invoices;

        return $json;
    }
}