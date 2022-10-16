<?php
include "../serverConnection.php";
ob_start();

$from = $to = $departureDate = $departureTime = $seat = $adult = $child = $infant = $returnDate =
    $returnTime = $message = $name = $phone = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $from = $_POST["from"];
    $to = $_POST["to"];
    $departureDate = $_POST["departureDate"];
    $departureTime = $_POST["departureTime"];
    $seat = $_POST["seat"];
    $adult = $_POST["adult"];
    $child = $_POST["child"];
    $infant = $_POST["infant"];
    $returnDate = $_POST["returnDate"];
    $returnTime = $_POST["returnTime"];
    $message = $_POST["message"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    if (!empty($_POST['name']) && !empty($_POST['email'])) {
        $sql = "INSERT INTO FINALBOOKING (_from, _to, DepatrureDate, DepartureTime, Seat, Adult, Children, 
        Infant, ReturnDate, ReturnTime, Message, name, phone, email)
        VALUES ('$from', '$to', '$departureDate', '$departureTime', '$seat', '$adult', '$child', '$infant', '$returnDate',
        '$returnTime', '$message', '$name', '$phone', '$email');";

        if (mysqli_query($connect, $sql)) {
            echo "Booking registered";
            $sql = "select * from FINALBOOKING ORDER BY Application_No DESC LIMIT 1";
            $result = mysqli_query($connect, $sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                header("Location: ../Payment/payment.php?id=" . $row["Application_No"]);
            }
        } else {
            echo "Error inserting booking value into sql table: " . mysqli_error($connect);
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alpha Airlines</title>
    <link rel="stylesheet" href="booking.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- for calender view -->
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

    <!-- including the js file -->
    <script src="booking.js"></script>

</head>

<body>
    <div class="container">
        <!--container-->

        <form class="form-group" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <!--form-->
            <h1 class="text-center">Alpha Booking Form</h1>

            <div id="form">
                <!--form-->
                <h3 class="text-white">Booking Details</h3>

                <div id="input">
                    <!--input-->
                    <input type="text" id="input-group" placeholder="From" name="from" required>
                    <input type="text" id="input-group" placeholder="To" name="to" required>
                    <span id="input-group" class="text-primary">Departure Date:</span> <input type="text" id="start_datepicker" placeholder="Departure Date" name="departureDate">
                    <!-- <span id="input-group" class="text-primary">Departure Time:</span><input type="time" id="input-group" placeholder="Departure Time" name="departureTime"> -->
                    <select id="input-group" style="background: black;">
                        <option value="">Airline</option>
                        <option value="">Alpha-001</option>
                    </select>
                    <select id="input-group" style="background: black;" name="seat">
                        <option value="">Preffered Seating</option>
                        <option value="">Economy Class</option>
                        <option value="">Business Class</option>
                        <option value="">First Class</option>
                    </select>
                </div>
                <!--input-->

                <div id="input2">
                    <!--input2-->
                    <input type="number" id="input-group" placeholder="Adult" name="adult">
                    <input type="number" id="input-group" placeholder="Children(2-11years)" name="child">
                    <input type="number" id="input-group" placeholder="infant(under 2years)" name="infant">
                </div>
                <!--input2-->

                <div id="input3">
                    <!--input3-->
                    <span id="input-group" class="text-primary">Select Your Trip</span>
                    <input type="radio" id="input-group" name="r">
                    <label class="text-white" for="input-group">One Way</label>
                    <input type="radio" id="input-group" name="r">
                    <label class="text-white" for="input-group">Round Trip</label>
                </div>
                <!--input3-->

                <div id="input4">
                    <!--input4-->
                    <span id="input-group" class="text-primary">Return Date:</span><input type="text" id="end_datepicker" placeholder="Return Date" name="returnDate">
                    <!-- <span id="input-group" class="text-primary">Return Time:</span><input type="time" id="input-group" placeholder="Return time" name="retrunTime"> -->
                    <input type="text" id="input-group1" placeholder="Any Message" name="message">
                </div>
                <!--input4-->

                <div id="input5">
                    <!--input5-->
                    <h3 class="text-white">Personal Details</h3>
                </div>
                <!--input5-->

                <div id="input6">
                    <!--input6-->
                    <input type="text" id="input-group" placeholder="Full Name" name="name">
                    <input type="number" id="input-group" placeholder="Phone Number" name="phone">
                    <input type="email" id="input-group1" placeholder="Email" name="email">
                </div>
                <!--input6-->
                <button type="submit" class="btn btn-success text-white" name="submit" id=<?php echo $_POST['Application_No'];  ?>>Submit & Proceed to Payment</button>
                <button type="reset" class="btn btn-primary">Clear Form</button>
                <button type="reset" class="btn btn-secondary" onclick="location.href='../index.html'">Go Back</button>
            </div>
            <!--form-->

        </form>
        <!--form-->

    </div>
    <!--container-->
</body>

</html>