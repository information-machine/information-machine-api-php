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
class FdaResult implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @var string $country public property
     */
    public $country;

    /**
     * @todo Write general description for this property
     * @var string $city public property
     */
    public $city;

    /**
     * @todo Write general description for this property
     * @maps reason_for_recall
     * @var string $reasonForRecall public property
     */
    public $reasonForRecall;

    /**
     * @todo Write general description for this property
     * @maps address_1
     * @var string $address1 public property
     */
    public $address1;

    /**
     * @todo Write general description for this property
     * @maps address_2
     * @var string $address2 public property
     */
    public $address2;

    /**
     * @todo Write general description for this property
     * @maps code_info
     * @var string $codeInfo public property
     */
    public $codeInfo;

    /**
     * @todo Write general description for this property
     * @maps product_quantity
     * @var string $productQuantity public property
     */
    public $productQuantity;

    /**
     * @todo Write general description for this property
     * @maps center_classification_date
     * @var string $centerClassificationDate public property
     */
    public $centerClassificationDate;

    /**
     * @todo Write general description for this property
     * @maps distribution_pattern
     * @var string $distributionPattern public property
     */
    public $distributionPattern;

    /**
     * @todo Write general description for this property
     * @var string $state public property
     */
    public $state;

    /**
     * @todo Write general description for this property
     * @maps product_description
     * @var string $productDescription public property
     */
    public $productDescription;

    /**
     * @todo Write general description for this property
     * @maps report_date
     * @var string $reportDate public property
     */
    public $reportDate;

    /**
     * @todo Write general description for this property
     * @var string $classification public property
     */
    public $classification;

    /**
     * @todo Write general description for this property
     * @var object $openfda public property
     */
    public $openfda;

    /**
     * @todo Write general description for this property
     * @maps recall_number
     * @var string $recallNumber public property
     */
    public $recallNumber;

    /**
     * @todo Write general description for this property
     * @maps recalling_firm
     * @var string $recallingFirm public property
     */
    public $recallingFirm;

    /**
     * @todo Write general description for this property
     * @maps initial_firm_notification
     * @var string $initialFirmNotification public property
     */
    public $initialFirmNotification;

    /**
     * @todo Write general description for this property
     * @maps event_id
     * @var string $eventId public property
     */
    public $eventId;

    /**
     * @todo Write general description for this property
     * @maps product_type
     * @var string $productType public property
     */
    public $productType;

    /**
     * @todo Write general description for this property
     * @maps more_code_info
     * @var string $moreCodeInfo public property
     */
    public $moreCodeInfo;

    /**
     * @todo Write general description for this property
     * @maps recall_initiation_date
     * @var string $recallInitiationDate public property
     */
    public $recallInitiationDate;

    /**
     * @todo Write general description for this property
     * @maps postal_code
     * @var string $postalCode public property
     */
    public $postalCode;

    /**
     * @todo Write general description for this property
     * @maps voluntary_mandated
     * @var string $voluntaryMandated public property
     */
    public $voluntaryMandated;

    /**
     * @todo Write general description for this property
     * @var string $status public property
     */
    public $status;

    /**
     * @todo Write general description for this property
     * @maps termination_date
     * @var string $terminationDate public property
     */
    public $terminationDate;

    /**
     * Constructor to set initial or default values of member properties
     * @param   string            $country                      Initialization value for the property $this->country                   
     * @param   string            $city                         Initialization value for the property $this->city                      
     * @param   string            $reasonForRecall              Initialization value for the property $this->reasonForRecall           
     * @param   string            $address1                     Initialization value for the property $this->address1                  
     * @param   string            $address2                     Initialization value for the property $this->address2                  
     * @param   string            $codeInfo                     Initialization value for the property $this->codeInfo                  
     * @param   string            $productQuantity              Initialization value for the property $this->productQuantity           
     * @param   string            $centerClassificationDate     Initialization value for the property $this->centerClassificationDate  
     * @param   string            $distributionPattern          Initialization value for the property $this->distributionPattern       
     * @param   string            $state                        Initialization value for the property $this->state                     
     * @param   string            $productDescription           Initialization value for the property $this->productDescription        
     * @param   string            $reportDate                   Initialization value for the property $this->reportDate                
     * @param   string            $classification               Initialization value for the property $this->classification            
     * @param   object            $openfda                      Initialization value for the property $this->openfda                   
     * @param   string            $recallNumber                 Initialization value for the property $this->recallNumber              
     * @param   string            $recallingFirm                Initialization value for the property $this->recallingFirm             
     * @param   string            $initialFirmNotification      Initialization value for the property $this->initialFirmNotification   
     * @param   string            $eventId                      Initialization value for the property $this->eventId                   
     * @param   string            $productType                  Initialization value for the property $this->productType               
     * @param   string            $moreCodeInfo                 Initialization value for the property $this->moreCodeInfo              
     * @param   string            $recallInitiationDate         Initialization value for the property $this->recallInitiationDate      
     * @param   string            $postalCode                   Initialization value for the property $this->postalCode                
     * @param   string            $voluntaryMandated            Initialization value for the property $this->voluntaryMandated         
     * @param   string            $status                       Initialization value for the property $this->status                    
     * @param   string            $terminationDate              Initialization value for the property $this->terminationDate           
     */
    public function __construct()
    {
        if(25 == func_num_args())
        {
            $this->country                    = func_get_arg(0);
            $this->city                       = func_get_arg(1);
            $this->reasonForRecall            = func_get_arg(2);
            $this->address1                   = func_get_arg(3);
            $this->address2                   = func_get_arg(4);
            $this->codeInfo                   = func_get_arg(5);
            $this->productQuantity            = func_get_arg(6);
            $this->centerClassificationDate   = func_get_arg(7);
            $this->distributionPattern        = func_get_arg(8);
            $this->state                      = func_get_arg(9);
            $this->productDescription         = func_get_arg(10);
            $this->reportDate                 = func_get_arg(11);
            $this->classification             = func_get_arg(12);
            $this->openfda                    = func_get_arg(13);
            $this->recallNumber               = func_get_arg(14);
            $this->recallingFirm              = func_get_arg(15);
            $this->initialFirmNotification    = func_get_arg(16);
            $this->eventId                    = func_get_arg(17);
            $this->productType                = func_get_arg(18);
            $this->moreCodeInfo               = func_get_arg(19);
            $this->recallInitiationDate       = func_get_arg(20);
            $this->postalCode                 = func_get_arg(21);
            $this->voluntaryMandated          = func_get_arg(22);
            $this->status                     = func_get_arg(23);
            $this->terminationDate            = func_get_arg(24);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['country']                    = $this->country;
        $json['city']                       = $this->city;
        $json['reason_for_recall']          = $this->reasonForRecall;
        $json['address_1']                  = $this->address1;
        $json['address_2']                  = $this->address2;
        $json['code_info']                  = $this->codeInfo;
        $json['product_quantity']           = $this->productQuantity;
        $json['center_classification_date'] = $this->centerClassificationDate;
        $json['distribution_pattern']       = $this->distributionPattern;
        $json['state']                      = $this->state;
        $json['product_description']        = $this->productDescription;
        $json['report_date']                = $this->reportDate;
        $json['classification']             = $this->classification;
        $json['openfda']                    = $this->openfda;
        $json['recall_number']              = $this->recallNumber;
        $json['recalling_firm']             = $this->recallingFirm;
        $json['initial_firm_notification']  = $this->initialFirmNotification;
        $json['event_id']                   = $this->eventId;
        $json['product_type']               = $this->productType;
        $json['more_code_info']             = $this->moreCodeInfo;
        $json['recall_initiation_date']     = $this->recallInitiationDate;
        $json['postal_code']                = $this->postalCode;
        $json['voluntary_mandated']         = $this->voluntaryMandated;
        $json['status']                     = $this->status;
        $json['termination_date']           = $this->terminationDate;

        return $json;
    }
}