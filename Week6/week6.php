<?php

    if(!isset($_COOKIE['userid'])) {
        header("Location: week6Login.php");
    }

    else {
        echo "userid: {$_COOKIE['userid']}<br>";


    }


    define( 'DB_NAME', 'mwarren15');
    define( 'DB_USER', 'mwarren15');
    define( 'DB_PASSWORD', 'mwarren15');
    define( 'DB_HOST', 'localhost');

    function DeleteInfo($id) {

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        // Check connection
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
        
        $del = "DELETE FROM People WHERE id = '$id' ";
        
        $result = $conn->query($del);
        
        mysqli_close($conn);
    }


    function InsertInfo($firstname, $lastname, $telephone) {

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        // Check connection
        if (!$conn) {
          die("Connection failed:" . mysqli_connect_error());
        }
        
        $insert = "INSERT INTO People SET firstname = '$firstname', lastname = '$lastname', telephone = '$telephone' ";
        
        $result = $conn->query($insert);
        
        mysqli_close($conn);
    }


    function ShowInfo() {
        // Create connection
            $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            // Check connection
            if (!$conn) {
              die("Connection failed:" . mysqli_connect_error());
            }
        
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
        
            mysqli_close($conn);
        }
        
?>
        
<form method="get">
    First Name: <input type="text" name="firstname"><br>
    Last Name: <input type="text" name="lastname"><br>
    Telphone: <input type="text" name="telephone"><br>
    <input type="submit" value="Submit">
</form>
        
<?php

    if($_GET['firstname'] != '') {
        if($_GET['lastname'] != '') {
            if($_GET['telephone'] != '') {
                InsertInfo($_GET['firstname'], $_GET['lastname'], $_GET['telephone']);
            }
        }   
    }
        
    if($_GET['cmd'] == 'delete') {
        $id = $_GET['id'];
        DeleteInfo($id);
    }
        
    ShowInfo();

?>


