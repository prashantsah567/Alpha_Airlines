<?php
include '../serverConnection.php';
$id = $_GET["Application_No"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reservation details</title>
    <link rel="stylesheet" href="confirmation.css">
</head>

<body>
    <h3>Your Reservation details</h3>

    <?php
    include "../serverConnection.php";

    $sql = "SELECT * FROM FINALBOOKING WHERE Application_No=$id;";
    $result = mysqli_query($connect, $sql);

    while ($row = $result->fetch_assoc()) {
        echo "Depature Location: " . $row['_From'] . "<br>" . "Arrival Location: " . $row['_To'] . "<br>" . "Depature date: " . $row['DepatrureDate'] . "<br>" .
            "Depature Time: " . $row['DepartureTime'] . "<br>" . "seat: " . $row['Seat'] . "<br>" . "Number of Adult: " . $row['Adult'] . "<br>" .
            "Number of Children: " . $row['Children'] . "<br>" . "Number of Infant: " . $row['Infant'] . "<br>" . "Return Date: " . $row['ReturnDate'] . "<br>" .
            "Return Time: " . $row['ReturnTime'] . "<br>" . "Specail Message: " . $row['Message'] . "<br>" . "Your Name: " . $row['name'] . "<br>" .
            "Contact Info: " . $row['phone'] . "<br>" . "Email address: " . $row['email'] . "<br>";
    }
    ?>
<br>
<button onclick="window.print();" class="noPrint">Print</button><br><br>
<button type="cancel" onclick="location.href='../Payment/payment.php'">Go Back To payment</button><br><br>
<button type="cancel" onclick="location.href='../index.html'">Go Back To Home</button><br>
</body>

</html>