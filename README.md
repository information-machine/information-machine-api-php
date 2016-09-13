Information Machine API
=================

How To Configure:
=================
File clienttest.txt contains several parameters in order to fully test the api using APITest.php file.
Each line of this file represents a certain expected value that you need to give in order to test the api.
The file initially contains the following:

1. YOUR_CLIENT_ID
2. YOUR_CLIENT_SECRET
3. STORE_NAME(EXAMPLE:WALMART)
4. USERNAME_FOR_GIVEN_STORE
5. PASSWORD_FOR_GIVEN_STORE

So, you need to replace the lines in clienttest.txt file with corresponding value.

How To Start:
=============
Make sure you have installed latest [PHP](http://php.net/) and [composer](https://getcomposer.org/).
Folder where you unpacked PHP should contain php.ini file, if there is no such file then rename php.ini-production or php.ini-development to php.ini, whichever suits you.
Also, make sure that in your php.ini file you have uncommented the following lines to be able to use extensions:

- extension=php_curl.dll
- extension=php_mbstring.dll
- extension=php_openssl.dll
- extension_dir = "ext"

You would also need to download [cacert.pem](http://curl.haxx.se/ca/cacert.pem) file and put the next line in php.ini:

curl.cainfo = "full_path_to_cacert_dir\cacert.pem"

Where "full_path_to_cacert_dir" is the full path where you keep your cacert.pem file.

The API library uses a PHP library namely UniRest. The reference to this
library is already added as a composer dependency in the generated composer.json
file. Therefore, you will need internet access to resolve this dependency. Check out this page for more information on how to install composer dependecies: [Composer basic usage](https://getcomposer.org/doc/01-basic-usage.md#installing-dependencies)

How To Use:
===========
For using this SDK do the following:

    1. Create a new PHP >= 5.3 project and copy the src folder and composer.json file
   	to a newly created PHP project directory.
    2. Use composer to install the dependencies. Usually this can be done through a
       context menu command "Composer Install".
    3. Include these lines in your php file:
```
	require_once "vendor/autoload.php";
	use InformationMachineAPILib\InformationMachineAPIClient;
```
    4. You can now instantiate controllers and call the respective methods as given below:
```
	$client = new InformationMachineAPIClient($clientId, $clientSecret);
    $productsController = $client->getProducts();
    $kaleProducts = $productsController->productsSearchProducts("Kale", NULL, 1, 25, NULL, true)->result;
```

The quickest way to see how you should use the API and library itself is by opening APITest.php file and see for your self how to use the methods and what kind of flow for calling the api methods is expected.

All methods return wrapper object which contains meta information (number of available requests, maximum number of requests per minute) and result object. Additionally if the result is of an array type, meta object will contain paging information (current page, items per page, total number of items, url to next page if there is a next page).

For more information on which methods are available please go to [Information Machine](https://www.iamdata.co/swagger/ui/index)