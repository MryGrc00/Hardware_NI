<?php
session_start();
include 'config.php';

$alert_message = '';
if (isset($_POST['reset_request'])) {
    $username = $_POST['username'];
    $dob = $_POST['dob'];

    // Retrieve user data from database
    $password = md5($password);
    $sql = "SELECT * FROM `users` WHERE username = ? AND dob = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $dob);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    // Check if the user exists and the date of birth is correct
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

        // Redirect the user to the appropriate page
        if ($user["usertype"] == "Seller" || $user["usertype"] == "Worker" || $user["usertype"] == "Customer") {
            header("Location: password_reset.php");
            exit();
        } 
    } else {
        // User does not exist or date of birth is incorrect, show an error message
        $alert_message = 'Username or date of birth is incorrect.';
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Forgot Password</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">   

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
	body{
		background-image: url(registerb.png);
		background-repeat: no-repeat;
		background-size: cover;
		background-attachment: fixed;
	}
  </style>
  </head>
  

<body>
<div class="container my-5 py-5">
  <div class="row justify-content-center mt-5">
    <div class="col-lg-6">
      <div class="card py-4 rounded">
        <div class="card-body">
          <h3 class="card-title text-center mb-4 h1">Forgot Your Password?</h3>
		  <p class="text-center">Please Enter your Username and Date of Birth</p>
		<form action="" method="post">
		  <?php if (!empty($alert_message)) { ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<?php echo $alert_message; ?>
			</div>
		<?php } ?>
		  <div class="mb-3">
			<label for="username" class="form-label">Username</label>
			<input type="text" class="form-control" id="username" name="username">
		  </div>
		  <div class="mb-3">
			<label for="dob" class="form-label">Date of Birth</label>
			<input type="date" class="form-control" id="dob" name="dob">
		  </div>
		  <br>
		  <div class="d-grid gap-2 text-center">
			<button type="submit" class="btn btn-primary" name="reset_request">Reset Password</button>
		  </div>
		</form>

        </div>
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