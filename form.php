<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $phonenumber = $_POST["phonenumber"];

    // Insert user data into the database
     $sql = "INSERT INTO user (firstname, lastname, email, phonenumber) VALUES ('$firstname', '$lastname', '$email', '$phonenumber')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "Record added successfully";
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: gray;
        }

        .left-container {
            color: #fff;
            padding: 20px;
            background: url('from.jpg') center center/cover;
            border-radius: 10px;
            height: 90vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            
        }
        .left-container .info {
            margin-bottom: 20px;
            text-align: center;
            color: #FF5325 ;
        }

        .left-container .info-us {
            margin-bottom: 20px;
            text-align: center;
        }

        .left-container .info-us h3 {
           margin-bottom: 5px;
           font-size: 1.5em;
           color: #7FBFFF ;
        }

        .left-container .info-us p {
            margin: 1;
            font-size: 1em;
            color: #FFDCE2 ;
        }

        .right-container {
            background-color: #ffffff;
            padding: 20px;
            height: 90vh;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #FF5325;
        }

        form {
            margin-top: 20px;
        }

        form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .btn-center {
            text-align: center;
        }

        .btn-dark{
            width: 50%;
            background: #FF1943 ;
            color: fff;
        }



    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Left side -->
            <div class="col-md-6 " >
                <div class="left-container">
                    <div class="info">
                        <h3><i class="fa fa-industry"></i> MartianX1X</h3>
                    </div>

                    <div class="info-us">
                         <h3><i class="fas fa-map-marker-alt"></i> Address</h3>
                         <p>Bashundhara R/A Block-A Road 5</p>
                    </div>

                    <div class="info-us">
                        <h3><i class="fas fa-phone"></i> Phone Number</h3>
                        <p>+880-1457889</p>
                    </div>

                    <div class="info-us">
                        <h3><i class="fas fa-envelope"></i> Email</h3>
                        <p>Abd-Myemail.@martianx1x.com</p>
                    </div>
                </div>
            </div>
            

            <!-- Right side -->
            <div class="col-md-6">
              <div class="right-container">
                   <h2>Contact Us</h2>
                   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                           First Name: <input type="text" name="firstname" required><br>
                           Last Name: <input type="text" name="lastname" required><br>
                           Email: <input type="email" name="email" required><br>
                           Phone Number: <input type="tel" name="phonenumber" required><br>
                          <div class="btn-center">
                              <button type="submit" class="btn btn-dark">Submit</button>
                          </div>
                          <?php
    // Display success or error message
    if (isset($success_message)) {
        echo "<p style='color: green;'>$success_message</p>";
    } elseif (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>
                   </form>
               </div>
           </div>
        </div>
    </div>



    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
