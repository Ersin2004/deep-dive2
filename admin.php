
<?php
$host = 'localhost';
$db = 'koelkast';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$i = 1;
?>
<?php
session_start();
if (isset($_SESSION['username'])) {
    echo '<a href="logout.php"><img src="images/logout.png" class="logout" alt="Logout" style="width:100px;height:70px;"></a>';
    echo '<p class="username">Welkom ' . $_SESSION['username'] . '</p>';
    if ($_SESSION['username'] == 'admin') {
        echo '<a href="admin.php"><img src="admin.png" class="admin" alt="Admin" style="width:100px;height:70px;"></a>';
    }
} else {
    echo '<a href="login.php"><img src="images/login.png" class="login" alt="Login" style="width:100px;height:70px;"></a>';
}
$connect = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
function userIsAdmin($connect)
{
    if (isset($_COOKIE['admin'])) {
        $adminCookie = $_COOKIE['admin'];
        $result = $connect->query('SELECT cookie FROM `admin_cookies`');
        foreach ($result as $row) {
            if ($adminCookie === $row['cookie']) {
                return true;
            }
        }
    }
    return false;
}
?> <?php
 $host = 'localhost';
 $db = 'koelkast';
 $user = 'root';
 $pass = '';
 $charset = 'utf8mb4';
 ?>
<html>

<head>
    <title>Webshop</title>
</head>

<body>    
    <h1>Bob Vance inc.</h1>


    <table>
        <tr>
            <th>Product</th>
            <th>Prijs</th>
        </tr>
       
        <?php
        if ($connect) {
            if (isset($_POST['delete'])) {
                $id = $_POST['id'];
                $sql = 'DELETE FROM producten WHERE id = :id';
                $stmt = $connect->prepare($sql);
                $stmt->execute(['id' => $id]);
            }
        }
        $connect = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $sql = 'SELECT * FROM producten';
        foreach ($connect->query($sql) as $row) {
            echo '<tr>';
            echo '</tr>';
        }
        $result = $connect->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {

                echo '<tr><td>' .
                    $row['product'] .
                    '</td><td>$' .
                    $row['price'] .
                    '</td></tr>';
                echo "<td><img class='asd' src=" .
                    $row['afbeelding'] .
                    '>';
                echo '<td>Liter' . $row['inhoud'] . '<tr></td>';
                echo '<td>Artikelnummer: <br>' . $row['artikelnummer'] . '<tr></td>';
                ?>
                <td class="producten-delete">
                    <form action="admin.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row[
                            'id'
                        ]; ?>
                        ">
                        <input type="submit" name="delete" value="Delete">
                        </form>
                <button class="edit" onclick="window.location.href='edit.php/<?php echo $row[
                    'id'
                ]; ?>'">Edit</button>
                </td>
<?php
            }
        } else {
            echo '0 results';
        }
        ?> 
    </table> <br>
    <button class="add" onclick="window.location.href='add.php'">Add Koelkast</button>
</body>


<div class="footer">

    <a href="reperaties.php" class="info">Reperaties</a> 

    <a href="admin.php" class="info">Home</a>
    <a href="about.php" class="info">About</a>
    <a href="contact.php" class="info">Contact</a>
</div>

<style> 
.bottom-right {
    text - align: center;
    position: absolute;
    bottom: 50px;
    right : 55px;
    font-size: 20px;
    color : white;
}
    
body{
    background-color: rgb(112, 159, 165);
    color: white;
}
.logout{
     position:absolute;
    top:0;
    right:10;
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

.asd {
    width:100px;
    height:100px;

}
<?php if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
