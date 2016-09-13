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
class InvoiceData implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @var integer $id public property
     */
    public $id;

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
     * @maps receipt_image_url
     * @var string $receiptImageUrl public property
     */
    public $receiptImageUrl;

    /**
     * @todo Write general description for this property
     * @maps receipt_image_urls
     * @var array $receiptImageUrls public property
     */
    public $receiptImageUrls;

    /**
     * Constructor to set initial or default values of member properties
     * @param   integer           $id                   Initialization value for the property $this->id                
     * @param   integer           $storeId              Initialization value for the property $this->storeId           
     * @param   string            $storeName            Initialization value for the property $this->storeName         
     * @param   double            $total                Initialization value for the property $this->total             
     * @param   double            $totalWithoutTax      Initialization value for the property $this->totalWithoutTax   
     * @param   double            $tax                  Initialization value for the property $this->tax               
     * @param   string            $purchaseDate         Initialization value for the property $this->purchaseDate      
     * @param   string            $recordedAt           Initialization value for the property $this->recordedAt        
     * @param   string            $orderNumber          Initialization value for the property $this->orderNumber       
     * @param   string            $receiptId            Initialization value for the property $this->receiptId         
     * @param   string            $receiptImageUrl      Initialization value for the property $this->receiptImageUrl   
     * @param   array             $receiptImageUrls     Initialization value for the property $this->receiptImageUrls  
     */
    public function __construct()
    {
        if(12 == func_num_args())
        {
            $this->id                 = func_get_arg(0);
            $this->storeId            = func_get_arg(1);
            $this->storeName          = func_get_arg(2);
            $this->total              = func_get_arg(3);
            $this->totalWithoutTax    = func_get_arg(4);
            $this->tax                = func_get_arg(5);
            $this->purchaseDate       = func_get_arg(6);
            $this->recordedAt         = func_get_arg(7);
            $this->orderNumber        = func_get_arg(8);
            $this->receiptId          = func_get_arg(9);
            $this->receiptImageUrl    = func_get_arg(10);
            $this->receiptImageUrls   = func_get_arg(11);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['id']                 = $this->id;
        $json['store_id']           = $this->storeId;
        $json['store_name']         = $this->storeName;
        $json['total']              = $this->total;
        $json['total_without_tax']  = $this->totalWithoutTax;
        $json['tax']                = $this->tax;
        $json['purchase_date']      = $this->purchaseDate;
        $json['recorded_at']        = $this->recordedAt;
        $json['order_number']       = $this->orderNumber;
        $json['receipt_id']         = $this->receiptId;
        $json['receipt_image_url']  = $this->receiptImageUrl;
        $json['receipt_image_urls'] = $this->receiptImageUrls;

        return $json;
    }
}