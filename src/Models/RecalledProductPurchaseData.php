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
class RecalledProductPurchaseData implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @maps product_id
     * @var integer $productId public property
     */
    public $productId;

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
     * @maps order_purchase_date
     * @var string $orderPurchaseDate public property
     */
    public $orderPurchaseDate;

    /**
     * @todo Write general description for this property
     * @maps order_recorded_at
     * @var string $orderRecordedAt public property
     */
    public $orderRecordedAt;

    /**
     * @todo Write general description for this property
     * @maps order_number
     * @var string $orderNumber public property
     */
    public $orderNumber;

    /**
     * @todo Write general description for this property
     * @var string $email public property
     */
    public $email;

    /**
     * @todo Write general description for this property
     * @var string $zip public property
     */
    public $zip;

    /**
     * @todo Write general description for this property
     * @maps user_id
     * @var string $userId public property
     */
    public $userId;

    /**
     * @todo Write general description for this property
     * @maps client_id
     * @var string $clientId public property
     */
    public $clientId;

    /**
     * @todo Write general description for this property
     * @maps user_created_at
     * @var string $userCreatedAt public property
     */
    public $userCreatedAt;

    /**
     * Constructor to set initial or default values of member properties
     * @param   integer           $productId             Initialization value for the property $this->productId          
     * @param   integer           $id                    Initialization value for the property $this->id                 
     * @param   integer           $storeId               Initialization value for the property $this->storeId            
     * @param   string            $storeName             Initialization value for the property $this->storeName          
     * @param   string            $orderPurchaseDate     Initialization value for the property $this->orderPurchaseDate  
     * @param   string            $orderRecordedAt       Initialization value for the property $this->orderRecordedAt    
     * @param   string            $orderNumber           Initialization value for the property $this->orderNumber        
     * @param   string            $email                 Initialization value for the property $this->email              
     * @param   string            $zip                   Initialization value for the property $this->zip                
     * @param   string            $userId                Initialization value for the property $this->userId             
     * @param   string            $clientId              Initialization value for the property $this->clientId           
     * @param   string            $userCreatedAt         Initialization value for the property $this->userCreatedAt      
     */
    public function __construct()
    {
        if(12 == func_num_args())
        {
            $this->productId           = func_get_arg(0);
            $this->id                  = func_get_arg(1);
            $this->storeId             = func_get_arg(2);
            $this->storeName           = func_get_arg(3);
            $this->orderPurchaseDate   = func_get_arg(4);
            $this->orderRecordedAt     = func_get_arg(5);
            $this->orderNumber         = func_get_arg(6);
            $this->email               = func_get_arg(7);
            $this->zip                 = func_get_arg(8);
            $this->userId              = func_get_arg(9);
            $this->clientId            = func_get_arg(10);
            $this->userCreatedAt       = func_get_arg(11);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['product_id']          = $this->productId;
        $json['id']                  = $this->id;
        $json['store_id']            = $this->storeId;
        $json['store_name']          = $this->storeName;
        $json['order_purchase_date'] = $this->orderPurchaseDate;
        $json['order_recorded_at']   = $this->orderRecordedAt;
        $json['order_number']        = $this->orderNumber;
        $json['email']               = $this->email;
        $json['zip']                 = $this->zip;
        $json['user_id']             = $this->userId;
        $json['client_id']           = $this->clientId;
        $json['user_created_at']     = $this->userCreatedAt;

        return $json;
    }
}