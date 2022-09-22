<?php
$host = 'localhost';
$db = 'koelkast';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
?>

<html> 
<body>    
    <h1>Bob Vance inc.</h1> 
    <p>Add</p>      
    <form action="/Deep%20Dive/update.php" method="post">
    <input type="text" name="product" placeholder="Product" required> 
    <input type="number" name="price" placeholder="Price" required>
    <input type="file" name="afbeelding" placeholder="Afbeelding" required>
    <input type="submit" name="add" value="add" required> 
</form> 

<?php
if (isset($_POST['add'])) {
    $product = $_POST['product'];
    $price = $_POST['price'];
    $afbeelding = $_POST['afbeelding'];
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
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}
?>

</body>
</html>
