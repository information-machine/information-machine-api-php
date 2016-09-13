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
class ConnectOAuthUserStoreRequest implements JsonSerializable {
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
     * @maps oauth_provider
     * @var string $oauthProvider public property
     */
    public $oauthProvider;

    /**
     * Constructor to set initial or default values of member properties
     * @param   integer           $storeId          Initialization value for the property $this->storeId       
     * @param   string            $oauthProvider    Initialization value for the property $this->oauthProvider 
     */
    public function __construct()
    {
        if(2 == func_num_args())
        {
            $this->storeId        = func_get_arg(0);
            $this->oauthProvider  = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['store_id']       = $this->storeId;
        $json['oauth_provider'] = $this->oauthProvider;

        return $json;
    }
}