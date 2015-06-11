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
class UserScansController {

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
     * Upload a new product by barcode and associate it to a specified user.  Note: Execution might take up to 15 seconds, depending on whether barcode exists in database or IM service must gather data around uploaded barcode.  POST payload example: { "bar_code" : "021130126026", "bar_code_type" : "UPC-A" }
     * @param  UploadBarcodeRequest     $payload     Required parameter: TODO: type description here
     * @param  string                   $userId      Required parameter: ID of user in your system
     * @return mixed response from the API call*/
    public function userScansUploadBarcode (
                $payload,
                $userId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/users/{user_id}/barcode';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'user_id' => $userId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($queryBuilder, array (
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'IAMDATA V1',
            'Accept'        => 'application/json',
            'content-type'  => 'application/json; charset=utf-8'
        );

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($payload));

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new APIException('Bad request', 400);
        }

        else if ($response->code == 401) {
            throw new APIException('Unauthorized', 401);
        }

        else if ($response->code == 500) {
            throw new APIException('Internal Server Error', 500);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }
        
    /**
     * Upload a receipt with unique ID ("receipt_id") and associate it to a specified user using "user_id" parameter. Note: Uploaded receipt image should be Base 64 encoded. For testing purposes you can find our Base 64 encoded logo here: http://api.iamdata.co/images/base64/encoded_logo.txt
     * @param  UploadReceiptRequest     $payload     Required parameter: TODO: type description here
     * @param  string                   $userId      Required parameter: TODO: type description here
     * @return mixed response from the API call*/
    public function userScansUploadReceipt (
                $payload,
                $userId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/users/{user_id}/receipt';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'user_id' => $userId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($queryBuilder, array (
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'IAMDATA V1',
            'Accept'        => 'application/json',
            'content-type'  => 'application/json; charset=utf-8'
        );

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($payload));

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new APIException('Bad request', 400);
        }

        else if ($response->code == 401) {
            throw new APIException('Unauthorized', 401);
        }

        else if ($response->code == 500) {
            throw new APIException('Internal Server Error', 500);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }
        
}