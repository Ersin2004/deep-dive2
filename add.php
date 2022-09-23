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
    <input type="file" name="afbeelding" placeholder="Afbeelding" required><br><br>
    <input type="number" name="inhoud" placeholder="Inhoud in liters" required>
    <input type="number" name="artikelnummer" placeholder="Artikelnummer" required>
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
        'inhoud' => $inhoud,
        'artikelnummer' => $artikelnummer,
    ]);
}


?>
<div class="footer">
    
<a href="admin.php" class="info">Home</a>
<a href="about.php" class="info">About</a>
<a href="contact.php" class="info">Contact</a>
</div>
<style>
body{
    background-color: rgb(112, 159, 165);
}

.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    height: 50px;
    width: 100%;
    background-color: #333;
    color: white;
    text-align: center;
    line-height: 50px;
    font-size: 20px; 
}
.info{
    color: white;
    text-decoration: none;
    font-size: 20px;
    padding: 10px;
}

</style>

</body>
</html>
