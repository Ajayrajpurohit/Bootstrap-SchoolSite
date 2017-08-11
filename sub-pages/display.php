<?php                           
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "School";

 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM admis_2016_17";
if ($conn->query($sql) === TRUE) {
    echo "<font color='green'>Signed up Successfully</font>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 
$conn->close();
echo "<table border='2'>";

echo "<tr>";
echo "<th>ID</th>";
echo "<th>First Name</th>";
echo "<th>Last Name</th>";
echo "<th>DOB</th>";
echo "</tr>";

while($data = mysqli_fetch_row($conn->query($sql))){
    echo"<tr>";
    echo"<td>$data[0]</td><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td><td>$data[4]</td>";
}
echo "</table>"; 
?>