<?php
define( 'DB_NAME', 'mwarren15');
define( 'DB_USER', 'mwarren15');
define( 'DB_PASSWORD', 'mwarren15');
define( 'DB_HOST', 'localhost');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function ShowInfo() {
    global $conn;
    
    $sql = "SELECT id, firstname, lastname, telephone FROM People";
    $result = mysqli_query($conn, $sql);
        
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $delurl = "[<a href='https://codd.cs.gsu.edu/~mwarren15/week5.php?cmd=delete&id={$row['id']}'>delete</a>]";
        echo"id: " . $row["id"]. " First Name: "  . $row["firstname"]. " Last Name: "  . $row["lastname"]." Telephone: "  . $row["telephone"]. " $delurl<br>";
        }
    } else {
        echo "0 results";
    }
        
}

ShowInfo();
mysqli_close($conn);

?>