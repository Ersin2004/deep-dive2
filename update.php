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
    $inhoud = $_POST['inhoud'];
    $artikelnummer = $_POST['artikelnummer'];
    $sql =
        'UPDATE producten SET product = :product, price = :price, afbeelding = :afbeelding, inhoud = :inhoud, artikelnummer = :artikelnummer WHERE id = :id';
    $stmt = $connect->prepare($sql);
    $stmt->execute([
        'id' => $id,
        'product' => $product,
        'price' => $price,
        'afbeelding' => $afbeelding,
        'inhoud' => $inhoud,
        'artikelnummer' => $artikelnummer,
    ]);
} elseif (isset($_POST['add'])) {
    $product = $_POST['product'];
    $price = $_POST['price'];
    $afbeelding = $_POST['afbeelding'];
    $inhoud = $_POST['inhoud'];
    $artikelnummer = $_POST['artikelnummer'];
    $connect = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $sql =
        'INSERT INTO producten (product, price, afbeelding, inhoud, artikelnummer) VALUES (:product, :price, :afbeelding, :inhoud, :artikelnummer)';
    $stmt = $connect->prepare($sql);
    $stmt->execute([
        'product' => $product,
        'price' => $price,
        'afbeelding' => $afbeelding,
        'inhoud' => $inhoud,
        'artikelnummer' => $artikelnummer,
    ]);
}
header('Location: http://localhost/Deep%20Dive/admin.php');
?>
