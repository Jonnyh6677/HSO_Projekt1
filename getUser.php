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

$sql = "Select P.VersNr,P.VName,P.NName,P.GebDatum,P.Ort,P.TelNr FROM Patient P WHERE P.VersNr = '".$vers."'";
$result = $conn->query($sql);



echo "<table>
<tr>
<th>VersNr</th>
<th>VNacme</th>
<th>NName</th>
<th>GebDatum</th>
<th>Ort</th>
<th>TelNr</th>
</tr>";
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['VersNr'] . "</td>";
    echo "<td>" . $row['VName'] . "</td>";
    echo "<td>" . $row['NName'] . "</td>";
    echo "<td>" . $row['GebDatum'] . "</td>";
   echo "<td>" . $row['Ort'] . "</td>";
   echo "<td>" . $row['TelNr'] . "</td>";
    echo "</tr>";
}
echo "</table>";

$behandlungen ="Select B.BehID,B.Symptome,B.Diagnose,B.Therapie FROM PatientenBehandlung PB, Patient P, Behandlung B
WHERE PB.VersNr = ".$vers." AND P.VersNr =".$vers." AND B.BehID = PB.BehID";

$result = $conn->query($behandlungen);









$conn->close();
?>
