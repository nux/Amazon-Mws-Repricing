# Amazon-Mws-Repricing
Amazon MWS Repricing Helper Classes

Usage for getting the Inventory Data:
```
$config = new \Twinsen\AmazonMwsRepricing\Models\MwsConfigModel();
$config->setServiceUrl("https://mws.amazonservices.de/");
$config->setKeyId('****');
$config->setAccessKey('****');
$config->setMarketPlaceId('****');
$config->setMerchantId('****');
$mwsService = new \Twinsen\AmazonMwsRepricing\MwsService();
$mwsService->connect($config);
$inventory = $mwsService->getInventoryItems();
print_r($inventory[0]);
```

Feel free to implement the MwsConfigInterface,for passing the Configuration.


For Getting the Price Information you can use 2 Different Approaches:
1. Using the MWS Product Api
```
$config = new \Twinsen\AmazonMwsRepricing\Models\MwsConfigModel();
$config->setServiceUrl("https://mws.amazonservices.de/");
$config->setKeyId('****');
$config->setAccessKey('****');
$config->setMarketPlaceId('****');
$config->setMerchantId('****');
$mwsService = new \Twinsen\AmazonMwsRepricing\MwsProductService();
$mwsService->connect($config);
$asin = "****";
$priceModel = $mwsService->getCompetitivePriceForASIN($asin);
```
2. Using the Amazon Advertising Api
```
$conf = new \Twinsen\AmazonMwsRepricing\Models\PaaConfigModel();
$conf->setCountry('de');
$conf->setAccessKey("***");
$conf->setSecretKey("***");
$conf->setAssociateTag("***");
$paaService = new \Twinsen\AmazonMwsRepricing\PaaService();
$paaService->connect($conf);
$response = $paaService->getCompetivePriceForAsin("****");
echo $paaService->debugResponse($response);
```







