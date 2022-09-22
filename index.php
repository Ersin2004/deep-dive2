<?php
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
    <p>Koop de mooiste koelkasten met de beste kwaliteit van Bob Vance inc.</p>   
   
   

    <table>
        <tr>
            <th>Product</th>
            <th>Prijs</th>
        </tr>
       
        <?php
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
                    '></td>';
            }
        } else {
            echo '0 results';
        }
        ?> 
    </table> 
</body>


</body>
</div>
    <a href="login.php"><img src="images/login.png" class="login" alt="Login" style="width:100px;height:70px;"></a>
</div>

<div class="footer">
    <a href="index.php" class="info">Home</a>
    <a href="about.php" class="info">About</a>
    <a href="contact.php" class="info">Contact</a>
</div>

<style> 
body{
    background-color: rgb(112, 159, 165);
    color: white;
}
.login{
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