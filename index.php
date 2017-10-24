<?php

echo "<h1>PDO!</h1>";
$username = 'ad432';
$password = 'qhDUhaQM';
$hostname = 'sql.njit.edu';

$dsn = "mysql:host=$hostname;dbname=$username";

try {
    $conn = new PDO($dsn, $username, $password);
    echo "Connected successfully<br>";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;

?>
