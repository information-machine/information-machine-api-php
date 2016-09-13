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
class MetaPaged implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @var integer $page public property
     */
    public $page;

    /**
     * @todo Write general description for this property
     * @required
     * @maps per_page
     * @var integer $perPage public property
     */
    public $perPage;

    /**
     * @todo Write general description for this property
     * @required
     * @maps total_number_of_pages
     * @var integer $totalNumberOfPages public property
     */
    public $totalNumberOfPages;

    /**
     * @todo Write general description for this property
     * @required
     * @maps max_number_of_requests_per_day
     * @var integer $maxNumberOfRequestsPerDay public property
     */
    public $maxNumberOfRequestsPerDay;

    /**
     * @todo Write general description for this property
     * @required
     * @maps remaining_number_of_request
     * @var integer $remainingNumberOfRequest public property
     */
    public $remainingNumberOfRequest;

    /**
     * @todo Write general description for this property
     * @required
     * @maps time_in_epoch_second_till_reset
     * @var double $timeInEpochSecondTillReset public property
     */
    public $timeInEpochSecondTillReset;

    /**
     * @todo Write general description for this property
     * @maps next_page
     * @var string $nextPage public property
     */
    public $nextPage;

    /**
     * @todo Write general description for this property
     * @maps last_page
     * @var string $lastPage public property
     */
    public $lastPage;

    /**
     * Constructor to set initial or default values of member properties
     * @param   integer           $page                              Initialization value for the property $this->page                           
     * @param   integer           $perPage                           Initialization value for the property $this->perPage                        
     * @param   integer           $totalNumberOfPages                Initialization value for the property $this->totalNumberOfPages             
     * @param   integer           $maxNumberOfRequestsPerDay         Initialization value for the property $this->maxNumberOfRequestsPerDay      
     * @param   integer           $remainingNumberOfRequest          Initialization value for the property $this->remainingNumberOfRequest       
     * @param   double            $timeInEpochSecondTillReset        Initialization value for the property $this->timeInEpochSecondTillReset     
     * @param   string            $nextPage                          Initialization value for the property $this->nextPage                       
     * @param   string            $lastPage                          Initialization value for the property $this->lastPage                       
     */
    public function __construct()
    {
        if(8 == func_num_args())
        {
            $this->page                            = func_get_arg(0);
            $this->perPage                         = func_get_arg(1);
            $this->totalNumberOfPages              = func_get_arg(2);
            $this->maxNumberOfRequestsPerDay       = func_get_arg(3);
            $this->remainingNumberOfRequest        = func_get_arg(4);
            $this->timeInEpochSecondTillReset      = func_get_arg(5);
            $this->nextPage                        = func_get_arg(6);
            $this->lastPage                        = func_get_arg(7);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['page']                            = $this->page;
        $json['per_page']                        = $this->perPage;
        $json['total_number_of_pages']           = $this->totalNumberOfPages;
        $json['max_number_of_requests_per_day']  = $this->maxNumberOfRequestsPerDay;
        $json['remaining_number_of_request']     = $this->remainingNumberOfRequest;
        $json['time_in_epoch_second_till_reset'] = $this->timeInEpochSecondTillReset;
        $json['next_page']                       = $this->nextPage;
        $json['last_page']                       = $this->lastPage;

        return $json;
    }
}