<?php
ob_start();
include "../serverConnection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="signup.css" />
</head>

<body>


    <?php
    // define variables and set to empty values
    $nameErr = $emailErr = $genderErr = $addErr = $cityErr = $stateErr = $zipErr = $userErr = $passErr = "";
    $name = $email = $gender = $address = $city = $state = $zip = $username = $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($_POST["username"])) {
            $userErr = "Username is required";
        } else {
            $username = test_input($_POST["username"]);
        }

        if (empty($_POST["password"])) {
            $passErr = "Password is required";
        } else {
            $password = test_input($_POST["password"]);
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }

        if (empty($_POST["address"])) {
            $addErr = "Address is required";
        } else {
            $address = test_input($_POST["address"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-'0-9 ]*$/", $address)) {
                $addErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["city"])) {
            $cityErr = "City is required";
        } else {
            $city = test_input($_POST["city"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $city)) {
                $cityErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["state"])) {
            $stateErr = "State is required";
        } else {
            $state = test_input($_POST["state"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $state)) {
                $stateErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["zip"])) {
            $zipErr = "Zip is required";
        } else {
            $zip = test_input($_POST["zip"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[0-9]*$/", $zip)) {
                $zipErr = "Only numbers are allowed";
            }
        }
    }
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO FINAL (name, email, username, password)
        VALUES ('$name', '$email', '$username', '$password');";

        if (mysqli_query($connect, $sql)) {
            echo "user registered";
        } else {
            echo "Error inserting value into sql table: " . mysqli_error($connect);
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
    
    <div class="signUp">
        <div class="signUpContainer">
            <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"><br><br>
                Name: <span class="error">* <?php echo $nameErr; ?></span></br>
                <input type="text" name="name" value="" class="register"></br>
                
                E-mail: <span class="error">* <?php echo $emailErr; ?></span></br>
                <input type="text" name="email" value="" class="register"></br>
                
                Username:<span class="error">* <?php echo $userErr; ?></span></br>
                <input type="text" name="username" value="" class="register"></br>
                
                Password: <span class="error">* <?php echo $passErr; ?></span></br>
                <input type="password" name="password" value="" class="register"></br>
                

                Gender: <span class="error">* <?php echo $genderErr; ?></span><br>
                <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female<br>
                <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male<br>
                <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other">Other</br>
                

                Street Address: <span class="error">* <?php echo $addErr; ?></span></br>
                <input type="text" name="address" value="" class="register"></br>
                

                City:<span class="error">* <?php echo $cityErr; ?></span></br>
                <input type="text" name="city" value="" class="register"></br>
                

                State:<span class="error">* <?php echo $stateErr; ?></span></br>
                <input type="text" name="state" value="" class="register"></br>
                

                Zip: <span class="error">* <?php echo $zipErr; ?></span></br>
                <input type="text" name="zip" value="" class="register"></br>
                <br>

                <input type="submit" name="submit" class="registerBtn" Value="Register" /><br><br>
            </form>
        </div>
    </div>
</body>
<br><a href="../index.html" class= "back">Go Back to Home Page</a>

</html>