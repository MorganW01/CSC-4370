<?php
    define( 'DB_NAME', 'mwarren15');
    define( 'DB_USER', 'mwarren15');
    define( 'DB_PASSWORD', 'mwarren15');
    define( 'DB_HOST', 'localhost');

    function CheckLogin($username, $password){
        // Create connection
            $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            // Check connection
            if (!$conn) {
              die("Connection failed:" . mysqli_connect_error());
            }

            $sql = "SELECT id FROM User WHERE username = '$username' AND password = '$password'";
            
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($result);

            $str= strval($row["id"]);
        
            if (mysqli_num_rows($result) > 0) {
                setcookie("userid", $str, time() + (120), "/");
                header("Location: week6.php");
            
            }

            else{
                print("This login is incorrect. Please try again");
                setcookie("userid", "", time() - 3600, "/");

            }
            mysqli_close($conn);
    }


?>

<form method="post">
<p>Input username and password to access next page: </p>
username <input type="text" name="username"><br>
password <input type="text" name="password"><br>

  <input type="submit" value="Submit">
</form>

<?php
    if($_POST['username'] != '' && $_POST['password'] != '') {
        CheckLogin($_POST['username'], $_POST['password']);
    }
?>