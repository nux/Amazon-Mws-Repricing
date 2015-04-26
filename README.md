# Amazon-Mws-Repricing
Amazon MWS Repricing Helper Classes

Usage:

$config = new \Twinsen\AmazonRepricer\AmazonMws\Models\ConfigModel();

$config->setServiceUrl("https://mws.amazonservices.de/");

$config->setKeyId('****');

$config->setAccessKey('****');

$config->setMarketPlaceId('****');

$config->setMerchantId('****');


$mwsService = new \Twinsen\AmazonMwsRepricing\MwsService();

$mwsService->connect($config);

$inventory = $mwsService->getInventoryItems();

print_r($inventory[0]);

