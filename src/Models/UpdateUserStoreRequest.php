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
class UpdateUserStoreRequest implements JsonSerializable {
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
     * @param   string            $username   Initialization value for the property $this->username
     * @param   string            $password   Initialization value for the property $this->password
     */
    public function __construct()
    {
        if(2 == func_num_args())
        {
            $this->username = func_get_arg(0);
            $this->password = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['username'] = $this->username;
        $json['password'] = $this->password;

        return $json;
    }
}