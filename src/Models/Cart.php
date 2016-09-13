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
class Cart implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @maps cart_id
     * @var uuid|string $cartId public property
     */
    public $cartId;

    /**
     * @todo Write general description for this property
     * @required
     * @maps cart_name
     * @var string $cartName public property
     */
    public $cartName;

    /**
     * @todo Write general description for this property
     * @required
     * @maps cart_items
     * @var CartItem[] $cartItems public property
     */
    public $cartItems;

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
     * @param   uuid|string       $cartId       Initialization value for the property $this->cartId    
     * @param   string            $cartName     Initialization value for the property $this->cartName  
     * @param   array             $cartItems    Initialization value for the property $this->cartItems 
     * @param   string            $createdAt    Initialization value for the property $this->createdAt 
     * @param   string            $updatedAt    Initialization value for the property $this->updatedAt 
     */
    public function __construct()
    {
        if(5 == func_num_args())
        {
            $this->cartId     = func_get_arg(0);
            $this->cartName   = func_get_arg(1);
            $this->cartItems  = func_get_arg(2);
            $this->createdAt  = func_get_arg(3);
            $this->updatedAt  = func_get_arg(4);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['cart_id']    = $this->cartId;
        $json['cart_name']  = $this->cartName;
        $json['cart_items'] = $this->cartItems;
        $json['created_at'] = $this->createdAt;
        $json['updated_at'] = $this->updatedAt;

        return $json;
    }
}