<?php
include "serverConnection.php";
?>

<?php
//table for registration
$sql = "CREATE TABLE FINAL(
    name VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL
    )";

if(mysqli_query($connect, $sql)){
    echo "Final table created";
}else{
    echo "Error creating Final table: ". mysqli_error($connect);
}

mysqli_close($connect);

?>

