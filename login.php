 <?php
session_start(); //Nicht vergessen
$u = $_GET['u'];
$p = $_GET['p'];
$servername = "sql7.freemysqlhosting.net";
$username = "sql7239138";
$password = "vq62S9nvq7";
$dbname = "sql7239138";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "Select * FROM Users U Where U.User = '".$u."' AND U.Password = '".$p."' ";

$result = $conn->query($sql);


if ($result->num_rows == 0) {
    echo 0;
    
}

else{
$_SESSION['username'] = $u;
$conn->close();

echo 1;

}


?>
