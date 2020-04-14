<?php


class Db
{
    public static function getConnection() {

        $params = [
            'host' => 'database',
            'dbname' => 'online_store',
            'password' => 'qwerty',
            'user' => 'root',
        ];
        $dsn = "mysql:host=${params['host']};dbname=${params['dbname']};charset=utf8";
        $db = new PDO($dsn, $params['user'], $params['password']);

        return $db;
    }

    public static function getProducts() {
        $db = self::getConnection();
        $productList = [];
        $result = $db->query('SELECT id, name, price, amount FROM product');
        $i = 0;
        while($row = $result->fetch()) {
            $productList[$i]['id'] = (int)$row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['amount'] = (int)$row['amount'];
            $i++;
        }

        return $productList;
    }
}