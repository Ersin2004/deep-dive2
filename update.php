<?php
$host = 'localhost';
$db = 'koelkast';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$connect = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$parts = explode('/', $_SERVER['REQUEST_URI']);
$id = end($parts);
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $product = $_POST['product'];
    $price = $_POST['price'];
    $afbeelding = $_POST['afbeelding'];
    $sql =
        'UPDATE producten SET product = :product, price = :price, afbeelding = :afbeelding WHERE id = :id';
    $stmt = $connect->prepare($sql);
    $stmt->execute([
        'id' => $id,
        'product' => $product,
        'price' => $price,
        'afbeelding' => $afbeelding,
    ]);
} elseif (isset($_POST['add'])) {
    $product = $_POST['product'];
    $price = $_POST['price'];
    $afbeelding = $_POST['afbeelding'];
    $connect = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $sql =
        'INSERT INTO producten (product, price, afbeelding) VALUES (:product, :price, :afbeelding)';
    $stmt = $connect->prepare($sql);
    $stmt->execute([
        'product' => $product,
        'price' => $price,
        'afbeelding' => $afbeelding,
    ]);
}
header('Location: http://localhost/Deep%20Dive/admin.php');
?>
