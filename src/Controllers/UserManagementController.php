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
class UserManagementController {

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
     * Get all users associated with your account.
     * @param  int|null     $page         Optional parameter: TODO: type description here
     * @param  int|null     $perPage      Optional parameter: default:10, max:50
     * @return mixed response from the API call*/
    public function userManagementGetAllUsers (
                $page = NULL,
                $perPage = NULL) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/users';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($queryBuilder, array (
            'page'     => $page,
            'per_page' => $perPage,
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
            throw new APIException('Bad request', 400);
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
     * Register a new user by specifying "email", "zip" and "user_id". The "user_id" is mandatory and it represents the identifier you will use to identify your user in the IM API infrastructure.Note: The following characters are restricted within "user_id" string ---&gt; { '/', '^', '[',  '\\', 'w', '.', ']', '+', '$', '/' }
     * @param  RegisterUserRequest     $payload     Required parameter: TODO: type description here
     * @return mixed response from the API call*/
    public function userManagementCreateUser (
                $payload) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/users';

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

        else if ($response->code == 422) {
            throw new APIException('Unprocessable entity', 422);
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
     * Delete a user from the IM API infrastructure by specifying user's "id".
     * @param  string     $id     Required parameter: TODO: type description here
     * @return mixed response from the API call*/
    public function userManagementDeleteUser (
                $id) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/users';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($queryBuilder, array (
            'id' => $id,
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
        if ($response->code == 404) {
            throw new APIException('Not found', 404);
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
     * Get user associated with your account specifying "id" of a user.
     * @param  string     $id     Required parameter: TODO: type description here
     * @return mixed response from the API call*/
    public function userManagementGetSingleUser (
                $id) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/v1/users/{id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'id' => $id,
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
            throw new APIException('Unauthorized', 401);
        }

        else if ($response->code == 404) {
            throw new APIException('Not Found', 404);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }
        
}