<?php
class Client {
    private $client;
    function __construct() {
        $this->client = new SoapClient('http://localhost/server.php?wsdl',['trace'=>1,'cache_wsdl'=>WSDL_CACHE_NONE]);
    }
    function getProductInfo($id) {
        return $this->client->productInfo($id);
    }
}