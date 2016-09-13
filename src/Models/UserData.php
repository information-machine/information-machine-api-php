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
class UserData implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @maps user_id
     * @var string $userId public property
     */
    public $userId;

    /**
     * @todo Write general description for this property
     * @required
     * @maps owner_app_id
     * @var string $ownerAppId public property
     */
    public $ownerAppId;

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
     * @maps created_at
     * @var string $createdAt public property
     */
    public $createdAt;

    /**
     * Constructor to set initial or default values of member properties
     * @param   string            $userId         Initialization value for the property $this->userId      
     * @param   string            $ownerAppId     Initialization value for the property $this->ownerAppId  
     * @param   string            $email          Initialization value for the property $this->email       
     * @param   string            $zip            Initialization value for the property $this->zip         
     * @param   string            $createdAt      Initialization value for the property $this->createdAt   
     */
    public function __construct()
    {
        if(5 == func_num_args())
        {
            $this->userId       = func_get_arg(0);
            $this->ownerAppId   = func_get_arg(1);
            $this->email        = func_get_arg(2);
            $this->zip          = func_get_arg(3);
            $this->createdAt    = func_get_arg(4);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['user_id']      = $this->userId;
        $json['owner_app_id'] = $this->ownerAppId;
        $json['email']        = $this->email;
        $json['zip']          = $this->zip;
        $json['created_at']   = $this->createdAt;

        return $json;
    }
}