<?php
session_start();

include 'config.php';

//Sign Up
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $usertype = $_POST['usertype'];
    $address = $_POST['address'];
    $pnumber = $_POST['pnumber']; 
    $username = $_POST['username']; 
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
	
	$alert_message = "";

	// Password validation
    if (strlen($password) < 8) {
        $alert_message = "Password must be at least 8 characters long";
    } else if (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
        $alert_message = "Password must contain at least one uppercase letter, one lowercase letter, and one number";
    } else if ($password !== $c_password) {
        $alert_message = "Passwords do not match";
    } else {
        $double_check = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $double_check);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            if ($user["username"] === $username) {
            $alert_message = "Username already exists";
            }
        } else {
            // Insert the user information into the database
            $password = md5($password);
            $sql = "INSERT INTO users (fname, lname, dob, gender, usertype, address, pnumber, username,  password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sssssssss", $fname, $lname, $dob, $gender, $usertype, $address, $pnumber,  $username, $password);
            mysqli_stmt_execute($stmt);

            $query = "SELECT * FROM users WHERE username = ? AND password = ?";
            $kuan = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($kuan, "ss", $username, $password);
            mysqli_stmt_execute($kuan);
            $result = mysqli_stmt_get_result($kuan);
            $user = mysqli_fetch_assoc($result);

            // Check if the user exists and the password is correct
            if (mysqli_num_rows($result) == 1) {
                // Set the user attribute value in the session
                $_SESSION["usertype"] = $user["usertype"];
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["fname"] = $user["fname"];
                $_SESSION["lname"] = $user["lname"];
                $_SESSION["address"] = $user["address"];
                $_SESSION["gender"] = $user["gender"];
                $_SESSION["dob"] = $user["dob"];
                $_SESSION["pnumber"] = $user["pnumber"];

                // Redirect the user to the appropriate dashboard
				if ($user["usertype"] == "Seller" || $user["usertype"] == "Worker" || $user["usertype"] == "Customer") {
					header("Location: index.php");
					exit();
				} 
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">   
  <link rel="stylesheet" href="css/register.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>

<body>
  <div class="wrapper">
  <?php if (!empty($alert_message)) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo $alert_message; ?>
    </div>
<?php } ?>
    <div class="container main">
      <div class="row">
        <div class="col-md-6 side-image">
          <!----Image--->
          <div class="text">
            <p>Join Us</p>
          </div>
        </div>
        <div class="col-md-6 right">
			 <form action="" method="post"> 
          <div class="input-box">
		 <header><h3>Sign Up</h3></header>
		 <form action="" method="post"> 
          <div class="form-row ">
            <div class="form-group col-md-6">
            <input type="text" class="input form-control" id="fname" name="fname" required  placeholder="First Name"> 
          </div>
          <div class="form-group col-md-6">
            <input type="text" class="input form-control" id="lname" name="lname" required  placeholder="Last Name"> 
          </div>
          </div>
          <div class="form-group">
            <input type="text" class="input form-control" id="address" name="address" required  placeholder="Address"> 
          </div>
          <div class="form-row">
          <div class="form-group col-md-6">
            <select id="input" id="gender" name="gender" class="form-control">
              <option value=""selected disabled>Gender</option>
              <option value="Female">Female</option>
              <option value="Male">Male</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <select id="input" id="usertype" name="usertype" class="form-control">
              <option value=""selected disabled>Type</option>
              <option value="Seller">Seller</option>
              <option value="Worker">Worker</option>
              <option value="Customer">Customer</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <input type="date" id="dob" name="dob" class="form-control">
          </div>
		<div class="form-group col-md-6">
		  <input type="tel" id="pnumber" name="pnumber" class="form-control" placeholder="0912-345-6789" maxlength="11">
		</div>
        </div>
        <div class="form-group">
          <input type="text" class="input form-control" id="username" name="username" required autocomplete="off" placeholder="Username"> 
        </div>
        <div class="form-group">
          <input type="password" class="input form-control" id="password" name="password" required autocomplete="off" placeholder="Password"> 
        </div>
        <div class="form-group">
          <input type="password" class="input form-control" id="c_password" name="c_password" required autocomplete="off" placeholder="Confirm Passoword"> 
        </div>
        <div class="text-center">
          <button type="submit" name="submit" class="btn text-white">Register</button>
        </div>
        </div>
	</form>
      </div>
      </div>
    </div>
  </div>
    <script>
    // add an event listener for the close button
    document.querySelector('.close').addEventListener('click', function() {
      // remove the parent element that contains the alert message
      this.parentNode.parentNode.removeChild(this.parentNode);
    });
  </script>
    </body>
    </html>