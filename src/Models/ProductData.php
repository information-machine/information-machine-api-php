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
class ProductData implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * @todo Write general description for this property
     * @var NutrientData[] $nutrients public property
     */
    public $nutrients;

    /**
     * @todo Write general description for this property
     * @var array $recipes public property
     */
    public $recipes;

    /**
     * @todo Write general description for this property
     * @var array $plus public property
     */
    public $plus;

    /**
     * @todo Write general description for this property
     * @maps visibility_count
     * @var integer $visibilityCount public property
     */
    public $visibilityCount;

    /**
     * @todo Write general description for this property
     * @var double $score public property
     */
    public $score;

    /**
     * @todo Write general description for this property
     * @maps amazon_link
     * @var string $amazonLink public property
     */
    public $amazonLink;

    /**
     * @todo Write general description for this property
     * @var string $manufacturer public property
     */
    public $manufacturer;

    /**
     * @todo Write general description for this property
     * @maps ingredients_count
     * @var integer $ingredientsCount public property
     */
    public $ingredientsCount;

    /**
     * @todo Write general description for this property
     * @maps large_image
     * @var string $largeImage public property
     */
    public $largeImage;

    /**
     * @todo Write general description for this property
     * @maps small_image
     * @var string $smallImage public property
     */
    public $smallImage;

    /**
     * @todo Write general description for this property
     * @maps serving_size_in_grams
     * @var double $servingSizeInGrams public property
     */
    public $servingSizeInGrams;

    /**
     * @todo Write general description for this property
     * @maps serving_size_unit
     * @var string $servingSizeUnit public property
     */
    public $servingSizeUnit;

    /**
     * @todo Write general description for this property
     * @maps servings_per_container
     * @var string $servingsPerContainer public property
     */
    public $servingsPerContainer;

    /**
     * @todo Write general description for this property
     * @maps serving_size
     * @var string $servingSize public property
     */
    public $servingSize;

    /**
     * @todo Write general description for this property
     * @var string $ingredients public property
     */
    public $ingredients;

    /**
     * @todo Write general description for this property
     * @var string $weight public property
     */
    public $weight;

    /**
     * @todo Write general description for this property
     * @var string $description public property
     */
    public $description;

    /**
     * @todo Write general description for this property
     * @var string $brand public property
     */
    public $brand;

    /**
     * @todo Write general description for this property
     * @var string $upc public property
     */
    public $upc;

    /**
     * @todo Write general description for this property
     * @var array $tags public property
     */
    public $tags;

    /**
     * @todo Write general description for this property
     * @var string $category public property
     */
    public $category;

    /**
     * @todo Write general description for this property
     * @maps category_id
     * @var integer $categoryId public property
     */
    public $categoryId;

    /**
     * @todo Write general description for this property
     * @var string $name public property
     */
    public $name;

    /**
     * Constructor to set initial or default values of member properties
     * @param   integer           $id                       Initialization value for the property $this->id                    
     * @param   array             $nutrients                Initialization value for the property $this->nutrients             
     * @param   array             $recipes                  Initialization value for the property $this->recipes               
     * @param   array             $plus                     Initialization value for the property $this->plus                  
     * @param   integer           $visibilityCount          Initialization value for the property $this->visibilityCount       
     * @param   double            $score                    Initialization value for the property $this->score                 
     * @param   string            $amazonLink               Initialization value for the property $this->amazonLink            
     * @param   string            $manufacturer             Initialization value for the property $this->manufacturer          
     * @param   integer           $ingredientsCount         Initialization value for the property $this->ingredientsCount      
     * @param   string            $largeImage               Initialization value for the property $this->largeImage            
     * @param   string            $smallImage               Initialization value for the property $this->smallImage            
     * @param   double            $servingSizeInGrams       Initialization value for the property $this->servingSizeInGrams    
     * @param   string            $servingSizeUnit          Initialization value for the property $this->servingSizeUnit       
     * @param   string            $servingsPerContainer     Initialization value for the property $this->servingsPerContainer  
     * @param   string            $servingSize              Initialization value for the property $this->servingSize           
     * @param   string            $ingredients              Initialization value for the property $this->ingredients           
     * @param   string            $weight                   Initialization value for the property $this->weight                
     * @param   string            $description              Initialization value for the property $this->description           
     * @param   string            $brand                    Initialization value for the property $this->brand                 
     * @param   string            $upc                      Initialization value for the property $this->upc                   
     * @param   array             $tags                     Initialization value for the property $this->tags                  
     * @param   string            $category                 Initialization value for the property $this->category              
     * @param   integer           $categoryId               Initialization value for the property $this->categoryId            
     * @param   string            $name                     Initialization value for the property $this->name                  
     */
    public function __construct()
    {
        if(24 == func_num_args())
        {
            $this->id                     = func_get_arg(0);
            $this->nutrients              = func_get_arg(1);
            $this->recipes                = func_get_arg(2);
            $this->plus                   = func_get_arg(3);
            $this->visibilityCount        = func_get_arg(4);
            $this->score                  = func_get_arg(5);
            $this->amazonLink             = func_get_arg(6);
            $this->manufacturer           = func_get_arg(7);
            $this->ingredientsCount       = func_get_arg(8);
            $this->largeImage             = func_get_arg(9);
            $this->smallImage             = func_get_arg(10);
            $this->servingSizeInGrams     = func_get_arg(11);
            $this->servingSizeUnit        = func_get_arg(12);
            $this->servingsPerContainer   = func_get_arg(13);
            $this->servingSize            = func_get_arg(14);
            $this->ingredients            = func_get_arg(15);
            $this->weight                 = func_get_arg(16);
            $this->description            = func_get_arg(17);
            $this->brand                  = func_get_arg(18);
            $this->upc                    = func_get_arg(19);
            $this->tags                   = func_get_arg(20);
            $this->category               = func_get_arg(21);
            $this->categoryId             = func_get_arg(22);
            $this->name                   = func_get_arg(23);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['id']                     = $this->id;
        $json['nutrients']              = $this->nutrients;
        $json['recipes']                = $this->recipes;
        $json['plus']                   = $this->plus;
        $json['visibility_count']       = $this->visibilityCount;
        $json['score']                  = $this->score;
        $json['amazon_link']            = $this->amazonLink;
        $json['manufacturer']           = $this->manufacturer;
        $json['ingredients_count']      = $this->ingredientsCount;
        $json['large_image']            = $this->largeImage;
        $json['small_image']            = $this->smallImage;
        $json['serving_size_in_grams']  = $this->servingSizeInGrams;
        $json['serving_size_unit']      = $this->servingSizeUnit;
        $json['servings_per_container'] = $this->servingsPerContainer;
        $json['serving_size']           = $this->servingSize;
        $json['ingredients']            = $this->ingredients;
        $json['weight']                 = $this->weight;
        $json['description']            = $this->description;
        $json['brand']                  = $this->brand;
        $json['upc']                    = $this->upc;
        $json['tags']                   = $this->tags;
        $json['category']               = $this->category;
        $json['category_id']            = $this->categoryId;
        $json['name']                   = $this->name;

        return $json;
    }
}