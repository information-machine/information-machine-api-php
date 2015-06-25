<?php 

require 'vendor/autoload.php';

use InformationMachineAPILib\Controllers as ctrl;
use InformationMachineAPILib\Models as model;


function testUserPurchase($productsController, $clientId, $clientSecret, $superMarketId, $username, $password)
{
    $email = "testuser@iamdata.co";
    $userId = "testuserId1234";

    $usersController = new ctrl\UserManagementController($clientId, $clientSecret);
    $storesController = new ctrl\UserStoresController($clientId, $clientSecret);
    $purchasesController = new ctrl\UserPurchasesController($clientId, $clientSecret);
    $userScansController = new ctrl\UserScansController($clientId, $clientSecret);

    usersControllerTest($email, $usersController, $userId);

    $encodedImage = file_get_contents("encoded_logo.txt");
    $receiptId = "fe6ba83b-d45c-457a-afd5-35bdb3cdffff";
    $receiptRequest = new model\UploadReceiptRequest();
    $receiptRequest->image = $encodedImage;
    $receiptRequest->receiptId = $receiptId;

    $userScansController->userScansUploadReceipt($receiptRequest, $userId);

    $storeConnect = new model\ConnectUserStoreRequest();
    $storeConnect->storeId = $superMarketId;
    $storeConnect->username = $username;
    $storeConnect->password = $password;

    $userStore = $storesController->userStoresConnectStore($storeConnect, $userId)->result;

    $storeConnectionValid = checkStoreValidity($storesController, $userId, $userStore->id);
    if (!$storeConnectionValid)
    {
        $storesController->userStoresDeleteSingleStore($userId, $userStore->id);
        throw new Exception("Error: could not connect to store");
    }

    $updateUserStoreRequest = new model\UpdateUserStoreRequest();
    $updateUserStoreRequest->username = $username;
    $updateUserStoreRequest->password = $password;

    $storesController->userStoresUpdateStoreConnection($updateUserStoreRequest, $userId, $userStore->id);

    if (!waitForScrapeToFinish($storesController, $userId, $userStore->id))
    {
        throw new Exception("Error: scrape is not finished");
    }

    $stores = $storesController->userStoresGetAllStores($userId)->result;
    if (empty($stores) || $stores[0]->id <= 0)
    {
        throw new Exception("Error: could not get all stores");
    }

    $userProducts = $productsController->productsGetUserProducts($userId, 1, 15, true, true)->result;
    if (empty($userProducts))
    {
        throw new Exception("Error: get user products");
    }

    $userPurchases = $purchasesController->userPurchasesGetAllUserPurchases($userId, 1, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, true, NULL, NULL)->result;
    if (empty($userPurchases))
    {
        throw new Exception("Error: get all user purchases");
    }

    $userPurchase = $purchasesController->userPurchasesGetSingleUserPurchase($userId, $userPurchases[0]->id, true)->result;
    if ($userPurchase == NULL || $userPurchase->id != $userPurchases[0]->id)
    {
        throw new Exception("Error: get single user purchases");
    }

    $barcodeRequest = new model\UploadBarcodeRequest();
    $barcodeRequest->barCode = "021130126026";
    $barcodeRequest->barCodeType = "UPC-A";

    $barcodeResponse = $userScansController->userScansUploadBarcode($barcodeRequest, $userId)->result;
    if ($barcodeResponse->bar_code_type != "UPC-A" || $barcodeResponse->bar_code != "021130126026")
    {
        throw new Exception("Error: upload barcode");
    }

    $storesController->userStoresDeleteSingleStore($userId, $userStore->id);

    $usersController->userManagementDeleteUser($userId);
}

function waitForScrapeToFinish($storesController, $userIdentifier, $storeId)
{
    // try to see if the users credentials are valid
    for ($i = 0; $i < 120; $i++)
    {
        $connectedStore = $storesController->userStoresGetSingleStore($userIdentifier, $storeId);

        if ($connectedStore != NULL && $connectedStore->result->scrape_status == "Done")
        {
            return true;
        }

        sleep(3);
    }

    return false;
}

function checkStoreValidity($storesController, $userIdentifier, $storeId)
{
    // try to see if the users credentials are valid
    for ($i = 0; $i < 15; $i++)
    {
        $connectedStore = $storesController->userStoresGetSingleStore($userIdentifier, $storeId);

        if ($connectedStore != NULL)
        {
            if ($connectedStore->result->credentials_status == "Verified")
            {
                return true;
            }

            if ($connectedStore->result->credentials_status == "Invalid")
            {
                return false;
            }
        }

        sleep(3);
    }

    return false;
}

function usersControllerTest($email, $usersController, $userId)
{
    $registerUserRequest = new model\RegisterUserRequest();
    $registerUserRequest->email = $email;
    $registerUserRequest->userId = $userId;
    $registerUserRequest->zip = "21000";

    $user = $usersController->userManagementCreateUser($registerUserRequest);

    if ($user->result->email != $email || $user->result->user_id != $userId)
    {
        throw new Exception("Error: create user");
    }

    $allUsers = $usersController->userManagementGetAllUsers();

    if (empty($allUsers->result))
    {
        throw new Exception("Error: get all users");
    }

    $userResponse = $usersController->userManagementGetSingleUser($userId);
    if ($userResponse->result->email != $email)
    {
        throw new Exception("Error: get single user");
    }
}

function lookupControllerTest($lookupController, $supermarketName)
{
    $superMarketId = 0;

    $categories = $lookupController->lookupGetCategories()->result;
    if (empty($categories) || $categories[0]->id != 1)
    {
        throw new Exception("Error: categories");
    }

    $nutrients = $lookupController->lookupGetNutrients()->result;
    if (empty($nutrients) || $nutrients[0]->id != 7)
    {
        throw new Exception("Error: nutrients");
    }

    $alternatives = $lookupController->lookupGetProductAlternativeTypes()->result;
    if (empty($alternatives) || $alternatives[0]->id != 1 || $alternatives[0]->name != "Reduce Sodium")
    {
        throw new Exception("Error: alternatives");
    }

    $tags = $lookupController->lookupGetTags()->result;
    if (empty($tags) || $tags[0]->id != 29 || $tags[0]->name != "Low Fat")
    {
        throw new Exception("Error: tags");
    }

    $unitsOfMeasurement = $lookupController->lookupGetUOMs()->result;
    if (empty($unitsOfMeasurement) || $unitsOfMeasurement[0]->id != 1 || $unitsOfMeasurement[0]->name != "g")
    {
        throw new Exception("Error: units of measurements");
    }

    $stores = $lookupController->lookupGetStores()->result;
    if (empty($stores) || $stores[0]->id != 1 || $stores[0]->name != "FreshDirect")
    {
        throw new Exception("Error: stores");
    }
    
    foreach ($stores as $store) {
        if ($store->name == $supermarketName)
        {
            $superMarketId = $store->id;
            break;
        }
    }

    return $superMarketId;
}

function productsControllerTest($productsController)
{
    $kaleProducts = $productsController->productsSearchProducts("Kale", NULL, 1, 25, NULL, true)->result;
    if (empty($kaleProducts) || $kaleProducts[0]->name == NULL)
    {
        throw new Exception("Error: get products");
    }

    if (empty($kaleProducts[0]->nutrients[0]->name))
    {
        throw new Exception("Error: get detail product info");
    }

    $secondPageKaleProducts = $productsController->productsSearchProducts("Kale", NULL, 2, 25, NULL, true)->result;
    if (empty($secondPageKaleProducts) || $secondPageKaleProducts[0]->name == NULL || $secondPageKaleProducts[0]->id == $kaleProducts[0]->id)
    {
        throw new Exception("Error: get 2nd page products");
    }

    $upcProduct = $productsController->productsSearchProducts(NULL, "014100044208", 1, 25, NULL, true)->result;
    if (empty($upcProduct) || $upcProduct[0]->name != "Pepperidge Farm Classic Bbq Cracker Chips, 6 Oz")
    {
        throw new Exception("Error: get upc products");
    }

    $eanProduct = $productsController->productsSearchProducts(NULL, "096619872404", NULL, NULL, NULL, true)->result;
    if (empty($eanProduct) || $eanProduct[0]->name != "Beckett Basketball Monthly Houston Rocket English")
    {
        throw new Exception("Error: get ean products");
    }

    $productFull = $productsController->productsGetProduct("380728", true)->result;
    if ($productFull == NULL || $productFull->name != "Peanut Butter Chocolate Party Size Candies")
    {
        throw new Exception("Error: get full product");
    }            

    $productsAlternatives = $productsController->productsGetProductsAlternatives("120907, 120902", "7")->result;
    if (empty($productsAlternatives) || $productsAlternatives[0]->productAlternatives[0]->name != "Lightlife Smart Deli Veggie Slices Roast Turkey")
    {
        throw new Exception("Error: get full product");
    }

    $productPrices = $productsController->productsGetProductPrices("149109, 113427")->result;
    if (empty($productPrices) || $productPrices[0]->prices[0]->store_id != 4)
    {
        throw new Exception("Error: get full product");
    }
}

try
{
    $config = file('clienttest.txt', FILE_IGNORE_NEW_LINES);
    $clientId = $config[0];
    $clientSecret = $config[1];
    $supermarketName = $config[2];
    $username = $config[3];
    $password = $config[4];

    $superMarketId = lookupControllerTest(new ctrl\LookupController($clientId, $clientSecret), $supermarketName);
    $productsController = new ctrl\ProductsController($clientId, $clientSecret);

    productsControllerTest($productsController);

    testUserPurchase($productsController, $clientId, $clientSecret, $superMarketId, $username, $password);
    echo "All tests passed\n";
}
catch (Exception $ex)
{
    echo $ex->getMessage();
}
?>