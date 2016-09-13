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
class RegisterUserRequest implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @maps user_id
     * @var string $userId public property
     */
    public $userId;

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
     * Constructor to set initial or default values of member properties
     * @param   string            $userId    Initialization value for the property $this->userId 
     * @param   string            $email     Initialization value for the property $this->email  
     * @param   string            $zip       Initialization value for the property $this->zip    
     */
    public function __construct()
    {
        if(3 == func_num_args())
        {
            $this->userId  = func_get_arg(0);
            $this->email   = func_get_arg(1);
            $this->zip     = func_get_arg(2);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['user_id'] = $this->userId;
        $json['email']   = $this->email;
        $json['zip']     = $this->zip;

        return $json;
    }
}