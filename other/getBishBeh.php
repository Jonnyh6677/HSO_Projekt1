 <?php
 session_start(); //Ganz wichtig

$vers= intval($_SESSION['versnr']);
$servername = "localhost";
$username = "ich";
$password = "ich";
$dbname = "akte";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$behandlungen ="Select B.BehID,B.Symptome,B.Diagnose,B.Therapie FROM PatientenBehandlung PB, Patient P, Behandlung B
WHERE PB.VersNr = ".$vers." AND P.VersNr =".$vers." AND B.BehID = PB.BehID";

$result = $conn->query($behandlungen);


echo "<h1>Bisherige Behandlungen</h1>
<table>
<tr>
<th>BehID</th>
<th>Symptome</th>
<th>Diagnose</th>
<th>Therapie</th>

</tr>";
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['BehID'] . "</td>";
    echo "<td>" . $row['Symptome'] . "</td>";
    echo "<td>" . $row['Diagnose'] . "</td>";
    echo "<td>" . $row['Therapie'] . "</td>";
    echo "</tr>";
}
echo "</table> ";







$conn->close();
?>
