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
class ConnectUserStoreRequest implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @maps store_id
     * @var integer $storeId public property
     */
    public $storeId;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $username public property
     */
    public $username;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $password public property
     */
    public $password;

    /**
     * Constructor to set initial or default values of member properties
     * @param   integer           $storeId    Initialization value for the property $this->storeId 
     * @param   string            $username   Initialization value for the property $this->username
     * @param   string            $password   Initialization value for the property $this->password
     */
    public function __construct()
    {
        if(3 == func_num_args())
        {
            $this->storeId  = func_get_arg(0);
            $this->username = func_get_arg(1);
            $this->password = func_get_arg(2);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['store_id'] = $this->storeId;
        $json['username'] = $this->username;
        $json['password'] = $this->password;

        return $json;
    }
}