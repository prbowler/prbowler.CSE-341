<?php
include 'connect-db-ol.php';
$username_submitted = htmlspecialchars($_POST["username"]);
$password_submitted = htmlspecialchars($_POST["password"]);

$statement = $db->query('SELECT username, password FROM shopper');
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row) {
    echo $row['username'] . $row['password'];
}


?>