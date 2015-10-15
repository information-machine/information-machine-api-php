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
use Unirest\Unirest;
class UserPurchasesController {

    /* private fields for configuration */

    /**
     * Id of your app 
     * @var string
     */
    private $clientId;

    /**
     * Secret key which authorizes you to use this API 
     * @var string
     */
    private $clientSecret;

    /**
     * Constructor with authentication and configuration parameters
     */
    function __construct($clientId, $clientSecret)
    {
        $this->clientId = $clientId ? $clientId : Configuration::$clientId;
        $this->clientSecret = $clientSecret ? $clientSecret : Configuration::$clientSecret;
    }

    /**
     * Get history of purchases made by a specified user from connected stores, must specify "user_id".
     * @param  string          $userId                     Required parameter: TODO: type description here
     * @param  int|null        $storeId                    Optional parameter: Check Lookup/Stores section for ID of all stores. E.g., Amazon = 4, Walmart = 3.
     * @param  int|null        $page                       Optional parameter: default:1
     * @param  int|null        $perPage                    Optional parameter: default:10, max:50
     * @param  string|null     $purchaseDateFrom           Optional parameter: Define multiple date ranges by specifying "from" range date components, separated by comma ",". Equal number of "from" and "to" parameters is mandatory. Expected format: "yyyy-MM-dd, yyyy-MM-dd"e.g., "2015-04-18, 2015-06-25"
     * @param  string|null     $purchaseDateTo             Optional parameter: Define multiple date ranges by specifying "to" range date components, separated by comma ",". Equal number of "from" and "to" parameters is mandatory. Expected format: "yyyy-MM-dd, yyyy-MM-dd"e.g., "2015-04-28, 2015-07-05"
     * @param  string|null     $purchaseDateBefore         Optional parameter: Filter out purchases made before specified date. Expected format: yyyy-MM-dd[e.g., 2015-04-18]
     * @param  string|null     $purchaseDateAfter          Optional parameter: Filter out purchases made after specified date. Expected format: yyyy-MM-dd[e.g., 2015-04-18]
     * @param  string|null     $purchaseTotalFrom          Optional parameter: Define multiple total purchase price ranges by specifying "from" range price components, separated by comma ",". Equal number of "from" and "to" parameters is mandatory. Expected format: "X.YZ, X.YZ"e.g., "5.5, 16.5"
     * @param  string|null     $purchaseTotalTo            Optional parameter: Define multiple total purchase price ranges by specifying "to" range price components, separated by comma ",". Equal number of "from" and "to" parameters is mandatory. Expected format: "X.YZ, X.YZ"e.g., "5.7, 20"
     * @param  double|null     $purchaseTotalLess          Optional parameter: Filter out purchases with grand total price less than specified amount.
     * @param  double|null     $purchaseTotalGreater       Optional parameter: Filter out purchases with grand total price greater than specified amount.
     * @param  bool|null       $fullResp                   Optional parameter: default:false [Set true for response with purchase item details.]
     * @param  bool|null       $foodOnly                   Optional parameter: default:false [Filter out food purchase items.]
     * @param  bool|null       $upcOnly                    Optional parameter: default:false [Filter out purchase items with UPC.]
     * @param  string|null     $upcResolvedAfter           Optional parameter: List only purchases having UPC resolved by IM after specified date. Expected format: "yyyy-MM-dd"
     * @return mixed response from the API call*/
    public function userPurchasesGetAllUserPurchases (
                $userId,
                $storeId = NULL,
                $page = NULL,
                $perPage = NULL,
                $purchaseDateFrom = NULL,
                $purchaseDateTo = NULL,
                $purchaseDateBefore = NULL,
                $purchaseDateAfter = NULL,
                $purchaseTotalFrom = NULL,
                $purchaseTotalTo = NULL,
                $purchaseTotalLess = NULL,
                $purchaseTotalGreater = NULL,
                $fullResp = NULL,
                $foodOnly = NULL,
                $upcOnly = NULL,
                $upcResolvedAfter = NULL) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/users/{user_id}/purchases';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'user_id'                => $userId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($queryBuilder, array (
            'store_id'               => $storeId,
            'page'                   => $page,
            'per_page'               => $perPage,
            'purchase_date_from'     => $purchaseDateFrom,
            'purchase_date_to'       => $purchaseDateTo,
            'purchase_date_before'   => $purchaseDateBefore,
            'purchase_date_after'    => $purchaseDateAfter,
            'purchase_total_from'    => $purchaseTotalFrom,
            'purchase_total_to'      => $purchaseTotalTo,
            'purchase_total_less'    => $purchaseTotalLess,
            'purchase_total_greater' => $purchaseTotalGreater,
            'full_resp'              => var_export($fullResp, true),
            'food_only'              => var_export($foodOnly, true),
            'upc_only'               => var_export($upcOnly, true),
            'upc_resolved_after'     => $upcResolvedAfter,
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'           => 'IAMDATA V1',
            'Accept'               => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if ($response->code == 404) {
            throw new APIException('Not Found', 404);
        }

        else if ($response->code == 401) {
            throw new APIException('Unauthorized', 401);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }
        
    /**
     * Get details about an identified purchase (specify "purchase_id") made my a specific user (specify "user_id").
     * @param  string        $userId          Required parameter: TODO: type description here
     * @param  string        $purchaseId      Required parameter: TODO: type description here
     * @param  bool|null     $fullResp        Optional parameter: default:false (set true for response with purchase item details)
     * @return mixed response from the API call*/
    public function userPurchasesGetSingleUserPurchase (
                $userId,
                $purchaseId,
                $fullResp = NULL) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/users/{user_id}/purchases/{purchase_id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'user_id'     => $userId,
            'purchase_id' => $purchaseId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($queryBuilder, array (
            'full_resp'   => var_export($fullResp, true),
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'IAMDATA V1',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if ($response->code == 404) {
            throw new APIException('Not Found', 404);
        }

        else if ($response->code == 401) {
            throw new APIException('Unauthorized', 401);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }
        
    /**
     * Get history of loyalty purchases made by a specified user from connected stores, must specify "user_id".
     * @param  string          $userId                 Required parameter: TODO: type description here
     * @param  int|null        $storeId                Optional parameter: Check Lookup/Stores section for ID of all stores. E.g., Amazon = 4, Walmart = 3.
     * @param  int|null        $page                   Optional parameter: default:1
     * @param  int|null        $perPage                Optional parameter: default:10, max:50
     * @param  bool|null       $foodOnly               Optional parameter: default:false [Filter out food purchase items.]
     * @param  bool|null       $upcOnly                Optional parameter: default:false [Filter out purchase items with UPC.]
     * @param  string|null     $upcResolvedAfter       Optional parameter: List only purchases having UPC resolved by IM after specified date. Expected format: "yyyy-MM-dd"
     * @return mixed response from the API call*/
    public function userPurchasesGetAllUserLoyaltyPurchases (
                $userId,
                $storeId = NULL,
                $page = NULL,
                $perPage = NULL,
                $foodOnly = NULL,
                $upcOnly = NULL,
                $upcResolvedAfter = NULL) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/users/{user_id}/loyalty_purchases';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'user_id'            => $userId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($queryBuilder, array (
            'store_id'           => $storeId,
            'page'               => $page,
            'per_page'           => $perPage,
            'food_only'          => var_export($foodOnly, true),
            'upc_only'           => var_export($upcOnly, true),
            'upc_resolved_after' => $upcResolvedAfter,
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'       => 'IAMDATA V1',
            'Accept'           => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if ($response->code == 404) {
            throw new APIException('Not Found', 404);
        }

        else if ($response->code == 401) {
            throw new APIException('Unauthorized', 401);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }
        
}