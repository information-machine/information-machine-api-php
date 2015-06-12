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
     * Get full history of purchases made by a specified user from connected stores, must specify "user_id".
     * @param  string          $userId                     Required parameter: TODO: type description here
     * @param  int|null        $page                       Optional parameter: TODO: type description here
     * @param  int|null        $perPage                    Optional parameter: default:10, max:50
     * @param  string|null     $purchaseDateBefore         Optional parameter: yyyy-MM-dd [e.g., 2015-04-18]
     * @param  string|null     $purchaseDateAfter          Optional parameter: yyyy-MM-dd [e.g., 2015-04-18]
     * @param  double|null     $purchaseTotalLess          Optional parameter: TODO: type description here
     * @param  double|null     $purchaseTotalGreater       Optional parameter: TODO: type description here
     * @param  bool|null       $fullResp                   Optional parameter: default:false (set true for response with purchase item details)
     * @return mixed response from the API call*/
    public function userPurchasesGetAllUserPurchases (
                $userId,
                $page = NULL,
                $perPage = NULL,
                $purchaseDateBefore = NULL,
                $purchaseDateAfter = NULL,
                $purchaseTotalLess = NULL,
                $purchaseTotalGreater = NULL,
                $fullResp = NULL) 
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
            'page'                   => $page,
            'per_page'               => $perPage,
            'purchase_date_before'   => $purchaseDateBefore,
            'purchase_date_after'    => $purchaseDateAfter,
            'purchase_total_less'    => $purchaseTotalLess,
            'purchase_total_greater' => $purchaseTotalGreater,
            'full_resp'              => var_export($fullResp, true),
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
        
}