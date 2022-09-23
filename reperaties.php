<?php
$host = 'localhost';
$db = 'koelkast';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
?>
<form> 
    <input type="text" name="reperatie" required>
    <input type="submit" name="submit" required>
</form> 
<?php
if (isset($_POST['submit'])) {
    $reperatie = $_POST['reperatie'];
    $connect = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $sql = 'INSERT INTO reperaties (reperatie) VALUES (:reperatie)';
    $stmt = $connect->prepare($sql);
    $stmt->execute(['reperatie' => $reperatie]);
} 
$sql = 'SELECT * FROM reperaties';
foreach ($connect->query($sql) as $row) {
    echo '<tr>';
    echo '</tr>';
} 
$result = $connect->query($sql); 
if ($result->rowCount() > 0) {
    while ($row = $result->fetch()) {
        echo '<tr><td>' .
            $row['reperatie'] .
            '</td></tr>';
    }
} 
?>
<div class="footer">
    
    <a href="admin.php" class="info">Home</a>
    <a href="about.php" class="info">About</a>
    <a href="contact.php" class="info">Contact</a>
</div>
<style>
    body {
        background-color: rgb(112, 159, 165);
        font-family: Arial, Helvetica, sans-serif;
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
    .info:hover {
        background-color: #ddd;
        color: black;
    }
</style>  
<?php if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}