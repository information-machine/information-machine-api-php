<?php
/*
 * InformationMachineAPILib
 *
 * 
 */

namespace InformationMachineAPILib\Controllers;

use InformationMachineAPILib\APIException;
use InformationMachineAPILib\APIHelper;
use InformationMachineAPILib\Configuration;
use InformationMachineAPILib\Models;
use InformationMachineAPILib\Exceptions;
use InformationMachineAPILib\Http\HttpRequest;
use InformationMachineAPILib\Http\HttpResponse;
use InformationMachineAPILib\Http\HttpMethod;
use InformationMachineAPILib\Http\HttpContext;
use Unirest\Request;

/**
 * @todo Add a general description for this controller.
 */
class UserPurchasesController extends BaseController {

    /**
     * @var UserPurchasesController The reference to *Singleton* instance of this class
     */
    private static $instance;
    
    /**
     * Returns the *Singleton* instance of this class.
     * @return UserPurchasesController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Get specified purchase details
     * @param  string     $userId          Required parameter: Example: 
     * @param  string     $purchaseId      Required parameter: Example: 
     * @param  bool       $fullResp        Optional parameter: default:false (set true for response with purchase item details)
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function userPurchasesGetSingleUserPurchase (
                $userId,
                $purchaseId,
                $fullResp = NULL) 
    {
        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/v1/users/{user_id}/purchases/{purchase_id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'user_id'     => $userId,
            'purchase_id' => $purchaseId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'full_resp'   => var_export($fullResp, true),
            'client_id' => Configuration::$clientId,
            'client_secret' => Configuration::$clientSecret,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => '',
            'Accept'        => 'application/json'
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);            
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        //call on-after Http callback
        if($this->getHttpCallBack() != null) {
            $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
            $_httpContext = new HttpContext($_httpRequest, $_httpResponse);
            
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);            
        }

        //Error handling using HTTP status codes
        if ($response->code == 404) {
            throw new APIException('Not Found', $_httpContext);
        }

        else if ($response->code == 401) {
            throw new APIException('Unauthorized', $_httpContext);
        }

        else if (($response->code < 200) || ($response->code > 208)) { //[200,208] = HTTP OK
            throw new APIException("HTTP Response Not OK", $_httpContext);
        }

        $mapper = $this->getJsonMapper();

        return $mapper->map($response->body, new Models\GetSingleUserPurchaseWrapper());
    }
        
    /**
     * Get purchases made by a specified user [purchased product mode]
     * @param  string      $userId                   Required parameter: Example: 
     * @param  integer     $storeId                  Optional parameter: Check Lookup/Stores section for ID of all stores. E.g., Amazon = 4, Walmart = 3.
     * @param  bool        $foodOnly                 Optional parameter: default:false [Filter out food purchase items.]
     * @param  bool        $upcOnly                  Optional parameter: default:false [Filter out purchase items with UPC.]
     * @param  bool        $showProductDetails       Optional parameter: default:false [Show details of a purchased products (image, nutrients, ingredients, manufacturer, etc..)]
     * @param  bool        $receiptsOnly             Optional parameter: default:false [Filter out purchases transcribed from receipts.]
     * @param  string      $upcResolvedAfter         Optional parameter: List only purchases having UPC resolved by IM after specified date. Expected format: "yyyy-MM-dd"
     * @param  string      $purchaseDateBefore       Optional parameter: Retrieve purchases made during and before specified date. Combined with "purchase_date_after" date range can be defined. Expected format: yyyy-MM-dd<br />[e.g., 2015-04-18]
     * @param  string      $purchaseDateAfter        Optional parameter: Retrieve purchases made during and after specified date. Combined with "purchase_date_before" date range can be defined. Expected format: yyyy-MM-dd<br />[e.g., 2015-04-18]
     * @param  string      $recordedAtBefore         Optional parameter: Retrieve purchases after it is created in our database. Combined with "recorded_at_after" date range can be defined. Expected format: yyyy-MM-dd<br />[e.g., 2015-04-18]
     * @param  string      $recordedAtAfter          Optional parameter: Retrieve purchases after it is created in our database. Combined with "recorded_at_before" date range can be defined. Expected format: yyyy-MM-dd<br />[e.g., 2015-04-18]
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function userPurchasesGetPurchaseHistoryUnified (
                $userId,
                $storeId = NULL,
                $foodOnly = NULL,
                $upcOnly = NULL,
                $showProductDetails = true,
                $receiptsOnly = NULL,
                $upcResolvedAfter = NULL,
                $purchaseDateBefore = NULL,
                $purchaseDateAfter = NULL,
                $recordedAtBefore = NULL,
                $recordedAtAfter = NULL) 
    {
        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/v1/users/{user_id}/purchases_product_based';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'user_id'              => $userId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'store_id'             => $storeId,
            'food_only'            => var_export($foodOnly, true),
            'upc_only'             => var_export($upcOnly, true),
            'show_product_details' => (null !== $showProductDetails) ? var_export($showProductDetails, true) : 'true',
            'receipts_only'        => var_export($receiptsOnly, true),
            'upc_resolved_after'   => $upcResolvedAfter,
            'purchase_date_before' => $purchaseDateBefore,
            'purchase_date_after'  => $purchaseDateAfter,
            'recorded_at_before'   => $recordedAtBefore,
            'recorded_at_after'    => $recordedAtAfter,
            'client_id' => Configuration::$clientId,
            'client_secret' => Configuration::$clientSecret,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'         => '',
            'Accept'             => 'application/json'
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);            
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        //call on-after Http callback
        if($this->getHttpCallBack() != null) {
            $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
            $_httpContext = new HttpContext($_httpRequest, $_httpResponse);
            
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);            
        }

        //Error handling using HTTP status codes
        if ($response->code == 404) {
            throw new APIException('Not Found', $_httpContext);
        }

        else if ($response->code == 401) {
            throw new APIException('Unauthorized', $_httpContext);
        }

        else if (($response->code < 200) || ($response->code > 208)) { //[200,208] = HTTP OK
            throw new APIException("HTTP Response Not OK", $_httpContext);
        }

        $mapper = $this->getJsonMapper();

        return $mapper->map($response->body, new Models\GetUserPurchaseHistoryWrapper());
    }
        

}