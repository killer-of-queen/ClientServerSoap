<?php
include_once __DIR__ . '/Db.php';
ini_set("soap.wsdl_cache_enabled","0");

class Product
{
    public $id;
    public $name;
    public $price;
    public $amount;
}


function productInfo($productId) {
    $productList = Db::getProducts();
    $_products = Db::getProducts();

    foreach ($_products as $item) {
        if ($item['id'] == $productId)
            return $item;
    }
    return null;
}

$server=new SoapServer("server.wsdl",[
    'classmap'=>[
        'product'=>'Product', // 'product' complex type in WSDL file mapped to the Book PHP class
    ]
]);

$server->addFunction('productInfo');

$server->handle();

/*
class Book
{
    public $name;
    public $year;
}

function bookYear($book)
{
    // list of the books
    $_books=[
        ['name'=>'test 1','year'=>2011],
        ['name'=>'test 2','year'=>2012],
        ['name'=>'test 3','year'=>2013],
    ];
    // search book by name
    foreach($_books as $bk)
        if($bk['name']==$book->name)
            return $bk['year']; // book found

    return 0; // book not found
}

// initialize SOAP Server
$server=new SoapServer("server.wsdl",[
    'classmap'=>[
        'book'=>'Book', // 'book' complex type in WSDL file mapped to the Book PHP class
    ]
]);

// register available functions
$server->addFunction('bookYear');

// start handling requests
$server->handle();

*/