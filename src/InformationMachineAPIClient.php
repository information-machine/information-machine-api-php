<?php
/*
 * InformationMachineAPILib
 *
 * 
 */

namespace InformationMachineAPILib;

use InformationMachineAPILib\Controllers;

/**
 * InformationMachineAPILib client class
 */
class InformationMachineAPIClient
{
    /**
     * Constructor with authentication and configuration parameters
     */
    public function __construct($clientId = NULL, $clientSecret = NULL)
    {
        Configuration::$clientId = $clientId ? $clientId : Configuration::$clientId;
        Configuration::$clientSecret = $clientSecret ? $clientSecret : Configuration::$clientSecret;
    }
 
    /**
     * Singleton access to UserManagement controller
     * @return Controllers\UserManagementController The *Singleton* instance
     */
    public function getUserManagement()
    {
        return Controllers\UserManagementController::getInstance();
    }
 
    /**
     * Singleton access to UserCarts controller
     * @return Controllers\UserCartsController The *Singleton* instance
     */
    public function getUserCarts()
    {
        return Controllers\UserCartsController::getInstance();
    }
 
    /**
     * Singleton access to Products controller
     * @return Controllers\ProductsController The *Singleton* instance
     */
    public function getProducts()
    {
        return Controllers\ProductsController::getInstance();
    }
 
    /**
     * Singleton access to Lookup controller
     * @return Controllers\LookupController The *Singleton* instance
     */
    public function getLookup()
    {
        return Controllers\LookupController::getInstance();
    }
 
    /**
     * Singleton access to UserStores controller
     * @return Controllers\UserStoresController The *Singleton* instance
     */
    public function getUserStores()
    {
        return Controllers\UserStoresController::getInstance();
    }
 
    /**
     * Singleton access to UserScans controller
     * @return Controllers\UserScansController The *Singleton* instance
     */
    public function getUserScans()
    {
        return Controllers\UserScansController::getInstance();
    }
 
    /**
     * Singleton access to UserPurchases controller
     * @return Controllers\UserPurchasesController The *Singleton* instance
     */
    public function getUserPurchases()
    {
        return Controllers\UserPurchasesController::getInstance();
    }
}