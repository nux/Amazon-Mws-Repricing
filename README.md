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



Getting Prices(Finally)
1. Register a AWS Account
2. Create a IAM User,grant SQS Support to it
3. Create SQS Queue
3. Use following Tutorial : http://docs.developer.amazonservices.com/en_IT/subscriptions/Subscriptions_ReceivingNotifications.html to give acess to the Amazon MWS
4. Use Mws to put the Key on it:

```
$mwsService = new \Twinsen\AmazonMwsRepricing\MwsSubscriptionService();
$mwsService->connect($mwsConfig);
$mwsService->registerDestination('https://sqs.eu-central-1.amazonaws.com/***');
$mwsService->createSubscription('https://sqs.eu-central-1.amazonaws.com/***');
```
5. Look at the Queue in Console Manager
6. If you want to know the Format,use following Link
https://gist.github.com/hakanensari/9f3e14d18a44f0d1c153


Another tnteressting Projects to Watch:
https://github.com/wp-plugins/wp-lister-for-amazon/blob/0cfdc6f7e143454ab5ed6b0b12b7d4272250fb6e/classes/helper/WPLA_FeedDataBuilder.php




