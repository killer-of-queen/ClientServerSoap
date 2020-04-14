<?php
include_once __DIR__ . '/client.php';
$product = false;
if (isset($_POST['id'])) {
    $client = new Client();
    $product = $client->getProductInfo((int) $_POST['id']);
    $product = (array) $product;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Товар</title>
</head>
<body>
<?php if($product && !empty($product)): ?>
    <p>Информация о продукте:</p>
    <p>Идентификатор: <?php echo $product['id'] ?></p>
    <p>Название: <?php echo $product['name'] ?></p>
    <p>Количество: <?php echo $product['amount'] ?></p>
    <p>Стоимость: <?php echo $product['price'] ?></p>
<?php else:?>
    <p>Продукт не найден</p>
<?php endif;?>
</body>
</html>