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


function DeleteInfo($id) {
    global $conn;
    $del = "DELETE FROM People WHERE id = '$id' ";
    $result = $conn->query($del);
}


function InsertInfo($firstname, $lastname, $telephone) {
    global $conn;
    $insert = "INSERT INTO People SET firstname = '$firstname', lastname = '$lastname', telephone = '$telephone' ";
    $result = $conn->query($insert);    
}

function ShowInfo() {
    global $conn;
    
    $sql = "SELECT id, firstname, lastname, telephone FROM People";
    $result = mysqli_query($conn, $sql);
        
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $delurl = "[<a href='' onclick=return(deleteInfo('$id'))>delete</a>]";
            echo"id: " . $row["id"]. " First Name: "  . $row["firstname"]. " Last Name: "  . $row["lastname"]." Telephone: "  . $row["telephone"]. " $delurl<br>";
        }
    } else {
        echo "0 results";
    }
        
}

$cmd = $_GET['cmd'];

if ($cmd =='create'){
    if($_GET['firstname'] != '') {
        if($_GET['lastname'] != '') {
            if($_GET['telephone'] != '') {
                InsertInfo($_GET['firstname'], $_GET['lastname'], $_GET['telephone']);
            }
        }   
    }   
}

  
else if($cmd == 'delete') {
    $id = $_GET['id'];
    DeleteInfo($id);
}

ShowInfo();
mysqli_close($conn);

?>