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
class CartItem implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @maps cart_item_id
     * @var uuid|string $cartItemId public property
     */
    public $cartItemId;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $upc public property
     */
    public $upc;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $quantity public property
     */
    public $quantity;

    /**
     * @todo Write general description for this property
     * @required
     * @maps created_at
     * @var string $createdAt public property
     */
    public $createdAt;

    /**
     * @todo Write general description for this property
     * @required
     * @maps updated_at
     * @var string $updatedAt public property
     */
    public $updatedAt;

    /**
     * Constructor to set initial or default values of member properties
     * @param   uuid|string       $cartItemId     Initialization value for the property $this->cartItemId  
     * @param   string            $upc            Initialization value for the property $this->upc         
     * @param   integer           $quantity       Initialization value for the property $this->quantity    
     * @param   string            $createdAt      Initialization value for the property $this->createdAt   
     * @param   string            $updatedAt      Initialization value for the property $this->updatedAt   
     */
    public function __construct()
    {
        if(5 == func_num_args())
        {
            $this->cartItemId   = func_get_arg(0);
            $this->upc          = func_get_arg(1);
            $this->quantity     = func_get_arg(2);
            $this->createdAt    = func_get_arg(3);
            $this->updatedAt    = func_get_arg(4);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['cart_item_id'] = $this->cartItemId;
        $json['upc']          = $this->upc;
        $json['quantity']     = $this->quantity;
        $json['created_at']   = $this->createdAt;
        $json['updated_at']   = $this->updatedAt;

        return $json;
    }
}