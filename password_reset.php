<?php
session_start();
include 'config.php';

$alert_message = '';

if (!isset($_SESSION['user_id'])) {
    // Session not set, redirect user to reset_request page with error message
    $alert_message = 'Please go through the reset request process first.';
    header("Location: reset_request.php?alert_message=".urlencode($alert_message));
    exit();
}

// Check if user has come from reset_request.php or password_reset.php
if(empty($_SERVER['HTTP_REFERER']) || (!strpos($_SERVER['HTTP_REFERER'], 'reset_request.php') && !strpos($_SERVER['HTTP_REFERER'], 'password_reset.php'))){
    $alert_message = 'Access denied.';
    header("Location: reset_request.php?alert_message=".urlencode($alert_message));
    exit();
}

if (isset($_POST['reset'])) {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Retrieve user data from database
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `users` WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    // Validate input
    if (empty($new_password) || empty($confirm_password)) {
        $alert_message = 'Please fill out all fields.';
    } else if ($new_password !== $confirm_password) {
        $alert_message = 'Passwords do not match.';
    } else {
        // Update user password in database
        $new_password = md5($new_password);
        $sql = "UPDATE `users` SET `password` = ? WHERE `id` = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "si", $new_password, $user['id']);
        mysqli_stmt_execute($stmt);

        // Check if the password was updated successfully
        $sql = "SELECT * FROM `users` WHERE `id` = ? AND `password` = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "is", $user['id'], $new_password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) == 1) {
            // Password reset successful, redirect user to login page
            if (strpos($_SERVER['HTTP_REFERER'], 'password_reset.php')) {
                // If user has come from password_reset.php, redirect to login.php
                header("Location: login.php");
                exit();
            } else {
                // Otherwise, redirect to reset_request.php
                header("Location: reset_request.php");
                exit();
            }
        } else {
            // Password reset failed, show an error message
            $alert_message = 'Password reset failed. Please try again later.';
        }
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
          <h3 class="card-title text-center mb-4 h1">Reset Password</h3>
          <form method="post">
	    <?php if (!empty($alert_message)) { ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<?php echo $alert_message; ?>
			</div>
		<?php } ?>
            <div class="mb-3">
              <label for="new_password" class="form-label">New Password</label>
              <input type="password" class="form-control" name="new_password" id="new_password" required>
            </div>
            <div class="mb-3">
              <label for="confirm_password" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
            </div>
            <br>
            <div class="d-grid gap-2 text-center">
              <button type="submit" class="btn btn-primary" name="reset">Reset Password</button>
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