<?php
 session_start(); //Ganz wichtig

$vers= intval($_SESSION['versnr']);
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

$anamnese ="Select PA.Anamnese FROM Patientenakte PA WHERE PA.VersNr = ".$vers."";

$result = $conn->query($anamnese);
while($row = $result->fetch_assoc()) {
    echo "<h1>Anamnese</h1>";
    echo "<div>" . $row['Anamnese'] . "</div>";

}


$behandlungen ="Select B.BehID,B.Symptome,B.Diagnose,B.Therapie FROM PatientenBehandlung PB, Patient P, Behandlung B
WHERE PB.VersNr = ".$vers." AND P.VersNr =".$vers." AND B.BehID = PB.BehID";

$result = $conn->query($behandlungen);


echo "<h1>Bisherige Behandlungen</h1>
<table class='table'>
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
