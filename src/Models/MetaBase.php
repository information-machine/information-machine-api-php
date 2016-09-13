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
class MetaBase implements JsonSerializable {
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
     * Constructor to set initial or default values of member properties
     * @param   integer           $maxNumberOfRequestsPerDay         Initialization value for the property $this->maxNumberOfRequestsPerDay      
     * @param   integer           $remainingNumberOfRequest          Initialization value for the property $this->remainingNumberOfRequest       
     * @param   double            $timeInEpochSecondTillReset        Initialization value for the property $this->timeInEpochSecondTillReset     
     */
    public function __construct()
    {
        if(3 == func_num_args())
        {
            $this->maxNumberOfRequestsPerDay       = func_get_arg(0);
            $this->remainingNumberOfRequest        = func_get_arg(1);
            $this->timeInEpochSecondTillReset      = func_get_arg(2);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['max_number_of_requests_per_day']  = $this->maxNumberOfRequestsPerDay;
        $json['remaining_number_of_request']     = $this->remainingNumberOfRequest;
        $json['time_in_epoch_second_till_reset'] = $this->timeInEpochSecondTillReset;

        return $json;
    }
}