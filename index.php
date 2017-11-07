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

// Select and Print
try{
	$sql = 'SELECT * FROM ad432.accounts
          WHERE id < 6';
    $result = $conn->prepare($sql);
    $result->execute();

    $count = $result->rowCount();
    print("$count Records.<br>");

    
    
    if($result->rowCount() > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>SID</th>";
                echo "<th>email</th>";
                echo "<th>fname</th>";
                echo "<th>lname</th>";
                echo "<th>phone</th>";
                echo "<th>birthday</th>";
                echo "<th>gender</th>";
                echo "<th>password</th>";
            echo "</tr>";
        while($row = $result->fetch()){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['lname'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['birthday'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        unset($result);
    } else{
        echo "Nothing matched your search result.";
    }
} 
      catch(PDOException $e){
      die("ERROR: Cant execute $sql. " . $e->getMessage());
}




// Close connection
unset($conn);


?>

