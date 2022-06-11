<?php
ob_start();
include "../serverConnection.php";
?>
<?php

//form validation
// define variables and set to empty values
$userErr = $passErr = "";
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["username"])) {
        $userErr = "username is required";
    } else {
        $username = test_input($_POST["username"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $userErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["password"])) {
        $passErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $password)) {
            $passErr = "Only letters and white space allowed";
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<?php

// $username = $_POST[('username')];
// $password = $_POST[('password')];

$sql = "SELECT * FROM FINAL WHERE username='$username' and password='$password'";
$result = mysqli_query($connect, $sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        header("Location: ../Booking/booking.php");
        echo "Welcome " . $username;
    }
} else {
    header("Location: ../index.html");
}

mysqli_close($connect);

?>
<a href="../index.html">Go Back to Home Page</a>

<?php
ob_end_flush();
?>