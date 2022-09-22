<?php
$host = 'localhost';
$db = 'koelkast';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$parts = explode('/', $_SERVER['REQUEST_URI']);
$id = end($parts);
$connect = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$sql = 'SELECT * FROM producten WHERE id = :id';
$stmt = $connect->prepare($sql);
$stmt->execute(['id' => $id]);
$product = $stmt->fetch();
?> 
<html> 
<body>    
     <h1><a href="../index.php">Bob Vance inc.</a></h1>

    <p>Edit</p>   
    <form action="../update.php" method="post">
        <input type="hidden" name="id" required value="<?php echo $product[
            'id'
        ]; ?>">
        <input type="text" name="product" required value="<?php echo $product[
            'product'
        ]; ?>">
        <input type="number" name="price" required value="<?php echo $product[
            'price'
        ]; ?>">
        <input type="file" name="afbeelding" required value="<?php echo $product[
            'afbeelding'
        ]; ?>">
        <input type="submit" name="edit" required value="edit">
    </form>
    <?php
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
    }
    if (!isset($_SESSION['loggedin'])) {
        header('Location: login.php');
        exit();
    }
    ?>
    
</body>
</html>
