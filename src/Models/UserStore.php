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
class UserStore implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * @todo Write general description for this property
     * @required
     * @maps supermarket_id
     * @var integer $supermarketId public property
     */
    public $supermarketId;

    /**
     * @todo Write general description for this property
     * @var UserData $user public property
     */
    public $user;

    /**
     * @todo Write general description for this property
     * @maps store_name
     * @var string $storeName public property
     */
    public $storeName;

    /**
     * @todo Write general description for this property
     * @var string $username public property
     */
    public $username;

    /**
     * @todo Write general description for this property
     * @maps credentials_status
     * @var string $credentialsStatus public property
     */
    public $credentialsStatus;

    /**
     * @todo Write general description for this property
     * @maps scrape_status
     * @var string $scrapeStatus public property
     */
    public $scrapeStatus;

    /**
     * @todo Write general description for this property
     * @var string $type public property
     */
    public $type;

    /**
     * @todo Write general description for this property
     * @maps account_locked
     * @var bool $accountLocked public property
     */
    public $accountLocked;

    /**
     * @todo Write general description for this property
     * @maps account_lock_code
     * @var string $accountLockCode public property
     */
    public $accountLockCode;

    /**
     * @todo Write general description for this property
     * @maps unlock_url
     * @var string $unlockUrl public property
     */
    public $unlockUrl;

    /**
     * @todo Write general description for this property
     * @maps oauth_provider
     * @var string $oauthProvider public property
     */
    public $oauthProvider;

    /**
     * @todo Write general description for this property
     * @maps oauth_authorization_url
     * @var string $oauthAuthorizationUrl public property
     */
    public $oauthAuthorizationUrl;

    /**
     * @todo Write general description for this property
     * @maps created_at
     * @var string $createdAt public property
     */
    public $createdAt;

    /**
     * @todo Write general description for this property
     * @maps updated_at
     * @var string $updatedAt public property
     */
    public $updatedAt;

    /**
     * @todo Write general description for this property
     * @maps total_spent
     * @var double $totalSpent public property
     */
    public $totalSpent;

    /**
     * Constructor to set initial or default values of member properties
     * @param   integer           $id                        Initialization value for the property $this->id                     
     * @param   integer           $supermarketId             Initialization value for the property $this->supermarketId          
     * @param   UserData          $user                      Initialization value for the property $this->user                   
     * @param   string            $storeName                 Initialization value for the property $this->storeName              
     * @param   string            $username                  Initialization value for the property $this->username               
     * @param   string            $credentialsStatus         Initialization value for the property $this->credentialsStatus      
     * @param   string            $scrapeStatus              Initialization value for the property $this->scrapeStatus           
     * @param   string            $type                      Initialization value for the property $this->type                   
     * @param   bool              $accountLocked             Initialization value for the property $this->accountLocked          
     * @param   string            $accountLockCode           Initialization value for the property $this->accountLockCode        
     * @param   string            $unlockUrl                 Initialization value for the property $this->unlockUrl              
     * @param   string            $oauthProvider             Initialization value for the property $this->oauthProvider          
     * @param   string            $oauthAuthorizationUrl     Initialization value for the property $this->oauthAuthorizationUrl  
     * @param   string            $createdAt                 Initialization value for the property $this->createdAt              
     * @param   string            $updatedAt                 Initialization value for the property $this->updatedAt              
     * @param   double            $totalSpent                Initialization value for the property $this->totalSpent             
     */
    public function __construct()
    {
        if(16 == func_num_args())
        {
            $this->id                      = func_get_arg(0);
            $this->supermarketId           = func_get_arg(1);
            $this->user                    = func_get_arg(2);
            $this->storeName               = func_get_arg(3);
            $this->username                = func_get_arg(4);
            $this->credentialsStatus       = func_get_arg(5);
            $this->scrapeStatus            = func_get_arg(6);
            $this->type                    = func_get_arg(7);
            $this->accountLocked           = func_get_arg(8);
            $this->accountLockCode         = func_get_arg(9);
            $this->unlockUrl               = func_get_arg(10);
            $this->oauthProvider           = func_get_arg(11);
            $this->oauthAuthorizationUrl   = func_get_arg(12);
            $this->createdAt               = func_get_arg(13);
            $this->updatedAt               = func_get_arg(14);
            $this->totalSpent              = func_get_arg(15);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['id']                      = $this->id;
        $json['supermarket_id']          = $this->supermarketId;
        $json['user']                    = $this->user;
        $json['store_name']              = $this->storeName;
        $json['username']                = $this->username;
        $json['credentials_status']      = $this->credentialsStatus;
        $json['scrape_status']           = $this->scrapeStatus;
        $json['type']                    = $this->type;
        $json['account_locked']          = $this->accountLocked;
        $json['account_lock_code']       = $this->accountLockCode;
        $json['unlock_url']              = $this->unlockUrl;
        $json['oauth_provider']          = $this->oauthProvider;
        $json['oauth_authorization_url'] = $this->oauthAuthorizationUrl;
        $json['created_at']              = $this->createdAt;
        $json['updated_at']              = $this->updatedAt;
        $json['total_spent']             = $this->totalSpent;

        return $json;
    }
}