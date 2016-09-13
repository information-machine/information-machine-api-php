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
class UploadReceiptRequest implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @maps receipt_id
     * @var string $receiptId public property
     */
    public $receiptId;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $image public property
     */
    public $image;

    /**
     * Constructor to set initial or default values of member properties
     * @param   string            $receiptId    Initialization value for the property $this->receiptId 
     * @param   string            $image        Initialization value for the property $this->image     
     */
    public function __construct()
    {
        if(2 == func_num_args())
        {
            $this->receiptId  = func_get_arg(0);
            $this->image      = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['receipt_id'] = $this->receiptId;
        $json['image']      = $this->image;

        return $json;
    }
}