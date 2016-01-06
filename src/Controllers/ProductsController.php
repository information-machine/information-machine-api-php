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
class ProductsController {

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
     * You can query the IM product database by either product name or UPC/EAN/ISBN identifier. Note: If both parameters are specified, UPC/EAN/ISBN has higher priority.
     * @param  string|null     $name                   Optional parameter: Product name (or part)
     * @param  string|null     $productIdentifier      Optional parameter: UPC/EAN/ISBN
     * @param  int|null        $page                   Optional parameter: TODO: type description here
     * @param  int|null        $perPage                Optional parameter: default:10, max:50
     * @param  string|null     $requestData            Optional parameter: Additional request data sent by IM API customer. Expected format:"Key1:Value1;Key2:Value2"
     * @param  bool|null       $fullResp               Optional parameter: default:false (set true for response with nutrients)
     * @return mixed response from the API call*/
    public function productsSearchProducts (
                $name = NULL,
                $productIdentifier = NULL,
                $page = NULL,
                $perPage = NULL,
                $requestData = NULL,
                $fullResp = NULL) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/products';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($queryBuilder, array (
            'name'               => $name,
            'product_identifier' => $productIdentifier,
            'page'               => $page,
            'per_page'           => $perPage,
            'request_data'       => $requestData,
            'full_resp'          => var_export($fullResp, true),
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
            throw new APIException('Not found', 404, $response->body);
        }

        else if ($response->code == 401) {
            throw new APIException('Unauthorized', 401, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Get details about a single product in the IM database by specifying a Information Machine Product ID.
     * @param  string        $productId      Required parameter: TODO: type description here
     * @param  bool|null     $fullResp       Optional parameter: default:false (set true for response with nutrients)
     * @return mixed response from the API call*/
    public function productsGetProduct (
                $productId,
                $fullResp = NULL) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/products/{product_id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'product_id' => $productId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($queryBuilder, array (
            'full_resp'  => var_export($fullResp, true),
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
            throw new APIException('Not found', 404, $response->body);
        }

        else if ($response->code == 401) {
            throw new APIException('Unauthorized', 401, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Get all purchases a user has made for a product by specifying the associated product ID.
     * @param  string       $productId      Required parameter: TODO: type description here
     * @param  int|null     $page           Optional parameter: TODO: type description here
     * @param  int|null     $perPage        Optional parameter: default:10, max:50
     * @return mixed response from the API call*/
    public function productsGetProductPurchases (
                $productId,
                $page = NULL,
                $perPage = NULL) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/products/{product_id}/purchases';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'product_id' => $productId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($queryBuilder, array (
            'page'       => $page,
            'per_page'   => $perPage,
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
            throw new APIException('Not found', 404, $response->body);
        }

        else if ($response->code == 401) {
            throw new APIException('Unauthorized', 401, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Get prices (from available stores) for specified product IDs. Note: It is possible to query 20 product IDs per each request. Please separate IDs with commas (e.g.: "325365, 89300").
     * @param  string     $productIds      Required parameter: TODO: type description here
     * @return mixed response from the API call*/
    public function productsGetProductPrices (
                $productIds) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/products_prices';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($queryBuilder, array (
            'product_ids' => $productIds,
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
            throw new APIException('Not found', 404, $response->body);
        }

        else if ($response->code == 401) {
            throw new APIException('Unauthorized', 401, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Get product alternatives for a specified alternative type (e.g.: "type_id: 7" will display alternatives of the "general" type) for a list of products specified by product IDs. Note: See "Lookup" section, "product_alternative_type" for list of all possible alternative types. List of product ids must not contain more than 20 ids or else Bad Request will be returned.
     * @param  string          $productIds      Required parameter: TODO: type description here
     * @param  string|null     $typeId          Optional parameter: TODO: type description here
     * @return mixed response from the API call*/
    public function productsGetProductsAlternatives (
                $productIds,
                $typeId = NULL) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/products_alternatives';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($queryBuilder, array (
            'product_ids' => $productIds,
            'type_id'     => $typeId,
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
        if ($response->code == 400) {
            throw new APIException('Bad request', 400, $response->body);
        }

        else if ($response->code == 404) {
            throw new APIException('Not found', 404, $response->body);
        }

        else if ($response->code == 401) {
            throw new APIException('Unauthorized', 401, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Get full history of products purchased by a specified user at connected stores, must define "user_id".
     * @param  string        $userId        Required parameter: TODO: type description here
     * @param  int|null      $page          Optional parameter: TODO: type description here
     * @param  int|null      $perPage       Optional parameter: default:10, max:50
     * @param  bool|null     $fullResp      Optional parameter: default:false (set true for response with nutrients)
     * @param  bool|null     $foodOnly      Optional parameter: default:false (set true to list food products only)
     * @return mixed response from the API call*/
    public function productsGetUserProducts (
                $userId,
                $page = NULL,
                $perPage = NULL,
                $fullResp = NULL,
                $foodOnly = NULL) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/users/{user_id}/products';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'user_id'   => $userId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($queryBuilder, array (
            'page'      => $page,
            'per_page'  => $perPage,
            'full_resp' => var_export($fullResp, true),
            'food_only' => var_export($foodOnly, true),
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
            throw new APIException('Not found', 404, $response->body);
        }

        else if ($response->code == 401) {
            throw new APIException('Unauthorized', 401, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Request POST model is simple list of strings. Each list item can be submitted in two variations: name only OR name+store [use semicolon ';' as name and store separator].Use "result" property in response, received after successful request submission, to list resolving results (endpoint below... GET v1/products/upc_resolve_response/{request_id}). Webhook JSON model example: { "name":"UB RDY RICE WHL BROWN", "store":"", "resolve_status":"Finished", "upcs":"123456789012,123456789012" }
     * @param  NameResolveRequest     $payload         Required parameter: TODO: type description here
     * @param  string|null            $webhookUrl      Optional parameter: URL we'll use to ping you as soon as product name is resolved to UPC. Please find POST body above.
     * @return mixed response from the API call*/
    public function productsSubmitProductNamesForUpcResolve (
                $payload,
                $webhookUrl = NULL) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/products/upc_resolve_request';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($queryBuilder, array (
            'webhook_url' => $webhookUrl,
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
        if ($response->code == 401) {
            throw new APIException('Unauthorized', 401, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Use request ID recevied in "v1/products/upc_resolve_request/" [request initiate].Response model has four properties: "name" - product name submitted for UPC resolve"store" - store submitted (in combination with name)"resolve_status" - "Queued" or "Finished""upcs" - list of UPCs that correspond to submitted name or name+store request
     * @param  string     $requestId      Required parameter: TODO: type description here
     * @return mixed response from the API call*/
    public function productsGetUPCByProductNameAnswer (
                $requestId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/products/upc_resolve_response/{request_id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'request_id' => $requestId,
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
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
}