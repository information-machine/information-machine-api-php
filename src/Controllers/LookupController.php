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
class LookupController {

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
     * Get a list of all possible categories available for alternative product recommendations.
     * @return mixed response from the API call*/
    public function lookupGetProductAlternativeTypes () 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/product_alternative_types';

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
     * Get a list of the units of measurement that could be associated with a product's nutrition facts.
     * @return mixed response from the API call*/
    public function lookupGetUOMs () 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/units_of_measurement';

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
     * Get a list of all potential product categories.  Product categories follow a hierarchical structure that is defined through the "parent_id" field.
     * @return mixed response from the API call*/
    public function lookupGetCategories () 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/categories';

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
     * Get a list of all the nutrients that are available on a product's nutrition label.
     * @return mixed response from the API call*/
    public function lookupGetNutrients () 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/nutrients';

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
     * Get a list of all stores in the IM API infrastructure. This list is constantly expanding. For stores that have "can_scrape" flag set to "1", you can use the IM infrastructure to retrieve purchase history. To do this, connect the store using the endpoints under the "Users" section below.
     * @return mixed response from the API call*/
    public function lookupGetStores () 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/stores';

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
     * Get a list of all tags available through the IM infrastructure.
     * @return mixed response from the API call*/
    public function lookupGetTags () 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/tags';

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
        
}