<?php
namespace Twinsen\AmazonMwsRepricing;
use Sunra\PhpSimple\HtmlDomParser;
class AmazonRestService{
    public function getSellerName($sellerId,$marketPlace="A1PA6795UKMFR9"){
        $url = "http://www.amazon.de/gp/aag/main?ie=UTF8&marketplaceID=".$marketPlace."&orderID=&seller=".$sellerId;
        //echo $url;
        $html =  file_get_contents($url);
        $dom = HtmlDomParser::str_get_html( $html);
        $UlElement = $dom->find('ul.aagLegalData', 0);
        $LiElement = $UlElement->find('li.aagLegalRow', 0);
        $LiElement->children(0)->innertext = "";
        //echo
        $sellerName = $LiElement->plaintext;
        return $sellerName;

    }

}