<?php
include "serverConnection.php";
?>
<?php
//table for booking information
$sql1 = "CREATE TABLE FINALBOOKING(
    Application_No INT NOT NULL AUTO_INCREMENT Primary key,
    _From VARCHAR(30) NOT NULL,
    _To VARCHAR(30) NOT NULL,
    DepatrureDate VARCHAR(30) NOT NULL,
    DepartureTime VARCHAR(30) NOT NULL,
    Seat VARCHAR(30) NOT NULL,
    Adult VARCHAR(30) Default 0,
    Children VARCHAR(30) Default 0,
    Infant VARCHAR(30) Default 0,
    ReturnDate VARCHAR(30),
    ReturnTime VARCHAR(30),
    Message VARCHAR(30),
    name VARCHAR(30) NOT NULL,
    phone VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL
    );";

if(mysqli_query($connect, $sql1)){
    echo "FinalBooking table created";
}else{
    echo "Error creating FinalBooking table: ". mysqli_error($connect);
}

mysqli_close($connect);

?>