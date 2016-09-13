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
class UserPurchase implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * @todo Write general description for this property
     * @maps user_store
     * @var UserStore $userStore public property
     */
    public $userStore;

    /**
     * @todo Write general description for this property
     * @maps purchase_items
     * @var PurchaseItemData[] $purchaseItems public property
     */
    public $purchaseItems;

    /**
     * @todo Write general description for this property
     * @var string $date public property
     */
    public $date;

    /**
     * @todo Write general description for this property
     * @var double $total public property
     */
    public $total;

    /**
     * @todo Write general description for this property
     * @maps total_without_tax
     * @var double $totalWithoutTax public property
     */
    public $totalWithoutTax;

    /**
     * @todo Write general description for this property
     * @var double $tax public property
     */
    public $tax;

    /**
     * @todo Write general description for this property
     * @maps order_number
     * @var string $orderNumber public property
     */
    public $orderNumber;

    /**
     * @todo Write general description for this property
     * @maps receipt_id
     * @var string $receiptId public property
     */
    public $receiptId;

    /**
     * @todo Write general description for this property
     * @maps receipt_image_urls
     * @var ReceiptImage[] $receiptImageUrls public property
     */
    public $receiptImageUrls;

    /**
     * Constructor to set initial or default values of member properties
     * @param   integer           $id                   Initialization value for the property $this->id                
     * @param   UserStore         $userStore            Initialization value for the property $this->userStore         
     * @param   array             $purchaseItems        Initialization value for the property $this->purchaseItems     
     * @param   string            $date                 Initialization value for the property $this->date              
     * @param   double            $total                Initialization value for the property $this->total             
     * @param   double            $totalWithoutTax      Initialization value for the property $this->totalWithoutTax   
     * @param   double            $tax                  Initialization value for the property $this->tax               
     * @param   string            $orderNumber          Initialization value for the property $this->orderNumber       
     * @param   string            $receiptId            Initialization value for the property $this->receiptId         
     * @param   array             $receiptImageUrls     Initialization value for the property $this->receiptImageUrls  
     */
    public function __construct()
    {
        if(10 == func_num_args())
        {
            $this->id                 = func_get_arg(0);
            $this->userStore          = func_get_arg(1);
            $this->purchaseItems      = func_get_arg(2);
            $this->date               = func_get_arg(3);
            $this->total              = func_get_arg(4);
            $this->totalWithoutTax    = func_get_arg(5);
            $this->tax                = func_get_arg(6);
            $this->orderNumber        = func_get_arg(7);
            $this->receiptId          = func_get_arg(8);
            $this->receiptImageUrls   = func_get_arg(9);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['id']                 = $this->id;
        $json['user_store']         = $this->userStore;
        $json['purchase_items']     = $this->purchaseItems;
        $json['date']               = $this->date;
        $json['total']              = $this->total;
        $json['total_without_tax']  = $this->totalWithoutTax;
        $json['tax']                = $this->tax;
        $json['order_number']       = $this->orderNumber;
        $json['receipt_id']         = $this->receiptId;
        $json['receipt_image_urls'] = $this->receiptImageUrls;

        return $json;
    }
}