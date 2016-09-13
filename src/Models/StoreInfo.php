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
class StoreInfo implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * @todo Write general description for this property
     * @required
     * @var bool $restaurant public property
     */
    public $restaurant;

    /**
     * @todo Write general description for this property
     * @required
     * @maps can_scrape
     * @var bool $canScrape public property
     */
    public $canScrape;

    /**
     * @todo Write general description for this property
     * @maps image_link
     * @var string $imageLink public property
     */
    public $imageLink;

    /**
     * @todo Write general description for this property
     * @var string $url public property
     */
    public $url;

    /**
     * @todo Write general description for this property
     * @var string $type public property
     */
    public $type;

    /**
     * Constructor to set initial or default values of member properties
     * @param   integer           $id           Initialization value for the property $this->id        
     * @param   string            $name         Initialization value for the property $this->name      
     * @param   bool              $restaurant   Initialization value for the property $this->restaurant
     * @param   bool              $canScrape    Initialization value for the property $this->canScrape 
     * @param   string            $imageLink    Initialization value for the property $this->imageLink 
     * @param   string            $url          Initialization value for the property $this->url       
     * @param   string            $type         Initialization value for the property $this->type      
     */
    public function __construct()
    {
        if(7 == func_num_args())
        {
            $this->id         = func_get_arg(0);
            $this->name       = func_get_arg(1);
            $this->restaurant = func_get_arg(2);
            $this->canScrape  = func_get_arg(3);
            $this->imageLink  = func_get_arg(4);
            $this->url        = func_get_arg(5);
            $this->type       = func_get_arg(6);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['id']         = $this->id;
        $json['name']       = $this->name;
        $json['restaurant'] = $this->restaurant;
        $json['can_scrape'] = $this->canScrape;
        $json['image_link'] = $this->imageLink;
        $json['url']        = $this->url;
        $json['type']       = $this->type;

        return $json;
    }
}