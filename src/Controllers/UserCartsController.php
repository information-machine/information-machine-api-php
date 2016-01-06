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
class UserCartsController {

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
     * Get all carts (including items in carts) associated with a specified user ID.
     * @param  string     $userId      Required parameter: ID of a user
     * @return mixed response from the API call*/
    public function userCartsGetCarts (
                $userId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/users/{user_id}/carts';

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
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if ($response->code == 401) {
            throw new APIException('Unauthorized', 401, $response->body);
        }

        else if ($response->code == 404) {
            throw new APIException('Not Found', 404, $response->body);
        }

        else if ($response->code == 422) {
            throw new APIException('Unprocessable Entity', 422, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * IM API will generate Cart ID and return it in the response
     * @param  string             $userId      Required parameter: ID of a user
     * @param  AddCartRequest     $payload     Required parameter: TODO: type description here
     * @return mixed response from the API call*/
    public function userCartsCreateCart (
                $userId,
                $payload) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/users/{user_id}/carts';

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
            throw new APIException('Bad Request', 400, $response->body);
        }

        else if ($response->code == 401) {
            throw new APIException('Unauthorized', 401, $response->body);
        }

        else if ($response->code == 422) {
            throw new APIException('Unprocessable Entity', 422, $response->body);
        }

        else if ($response->code == 500) {
            throw new APIException('Internal Server Error', 500, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Get detailed information on a single user cart by specifying User ID and Cart ID. Cart items are included in response.
     * @param  string     $userId      Required parameter: ID of a user
     * @param  string     $cartId      Required parameter: ID of a cart
     * @return mixed response from the API call*/
    public function userCartsGetCart (
                $userId,
                $cartId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/users/{user_id}/carts/{cart_id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'user_id' => $userId,
            'cart_id' => $cartId,
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
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if ($response->code == 401) {
            throw new APIException('Unauthorized', 401, $response->body);
        }

        else if ($response->code == 404) {
            throw new APIException('Not Found', 404, $response->body);
        }

        else if ($response->code == 422) {
            throw new APIException('Unprocessable Entity', 422, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Add item/product to a cart, must specify product UPC and Cart ID.
     * @param  string                 $userId      Required parameter: ID of a user
     * @param  string                 $cartId      Required parameter: ID of a cart
     * @param  AddCartItemRequest     $payload     Required parameter: TODO: type description here
     * @return mixed response from the API call*/
    public function userCartsAddCartItem (
                $userId,
                $cartId,
                $payload) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/users/{user_id}/carts/{cart_id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'user_id' => $userId,
            'cart_id' => $cartId,
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
            throw new APIException('Bad Request', 400, $response->body);
        }

        else if ($response->code == 401) {
            throw new APIException('Unauthorized', 401, $response->body);
        }

        else if ($response->code == 422) {
            throw new APIException('Unprocessable Entity', 422, $response->body);
        }

        else if ($response->code == 500) {
            throw new APIException('Internal Server Error', 500, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Use specified Cart ID to delete cart and all associated items in specified cart.
     * @param  string     $userId      Required parameter: ID of a user
     * @param  string     $cartId      Required parameter: ID of a cart
     * @return mixed response from the API call*/
    public function userCartsDeleteCart (
                $userId,
                $cartId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/users/{user_id}/carts/{cart_id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'user_id' => $userId,
            'cart_id' => $cartId,
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
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::delete($queryUrl, $headers);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if ($response->code == 401) {
            throw new APIException('Unauthorized', 401, $response->body);
        }

        else if ($response->code == 404) {
            throw new APIException('Not Found', 404, $response->body);
        }

        else if ($response->code == 422) {
            throw new APIException('Unprocessable Entity', 422, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Remove item/product from a cart, must specify Cart and Cart Item ID.
     * @param  string     $userId           Required parameter: ID of a user
     * @param  string     $cartId           Required parameter: ID of a cart
     * @param  string     $cartItemId       Required parameter: ID of a cart item
     * @return mixed response from the API call*/
    public function userCartsRemoveCartItem (
                $userId,
                $cartId,
                $cartItemId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/users/{user_id}/carts/{cart_id}/items/{cart_item_id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'user_id'      => $userId,
            'cart_id'      => $cartId,
            'cart_item_id' => $cartItemId,
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
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::delete($queryUrl, $headers);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if ($response->code == 401) {
            throw new APIException('Unauthorized', 401, $response->body);
        }

        else if ($response->code == 404) {
            throw new APIException('Not Found', 404, $response->body);
        }

        else if ($response->code == 422) {
            throw new APIException('Unprocessable Entity', 422, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Currently, only Amazon cart is supported.
     * @param  string     $userId       Required parameter: ID of a user
     * @param  string     $cartId       Required parameter: ID of a cart
     * @param  int        $storeId      Required parameter: ID of a store (check "Lookup" section, "v1/stores" endpoint)
     * @return mixed response from the API call*/
    public function userCartsExecuteCart (
                $userId,
                $cartId,
                $storeId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/users/{user_id}/carts/{cart_id}/stores/{store_id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'user_id'  => $userId,
            'cart_id'  => $cartId,
            'store_id' => $storeId,
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
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if ($response->code == 401) {
            throw new APIException('Unauthorized', 401, $response->body);
        }

        else if ($response->code == 404) {
            throw new APIException('Not Found', 404, $response->body);
        }

        else if ($response->code == 422) {
            throw new APIException('Unprocessable Entity', 422, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
}