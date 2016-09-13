<?php
/*
 * InformationMachineAPILib
 *
 * 
 */

namespace InformationMachineAPILib;

/**
 * All configuration including auth info and base URI for the API access
 * are configured in this class. 
 */
class Configuration {
    /**
     * The base Uri for API calls
     * @var string
     */
    public static $BASEURI = 'https://api.iamdata.co';

    /**
     * Id of your app
     * @var string
     */
    /**
     * @todo Replace the $clientId with an appropriate value
     */
    public static $clientId = '';

    /**
     * Secret key which authorizes you to use this API
     * @var string
     */
    /**
     * @todo Replace the $clientSecret with an appropriate value
     */
    public static $clientSecret = '';

}
