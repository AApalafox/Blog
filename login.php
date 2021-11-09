<?php 

	session_start();

	include "config/db_connect.php";

	$email = $password = $rpassword = "";
	$errors = array("email"=>"", "password"=>"", "login"=>"");

	if(isset($_POST["login"])){

	// Check email
	if(empty($_POST["email"])){
	  $errors["email"] = "An email is required";
	} else {
	  $email = $_POST["email"];
	}

	// Check password
	if(empty($_POST["password"])){
	  $errors["password"] = "A password is required";
	} else {
	  $password = $_POST["password"];
	}

	if(array_filter($errors)){
		// display label errors
	} else {
		// escape sql char
		$email = mysqli_real_escape_string($conn, $_POST["email"]);
		$password = mysqli_real_escape_string($conn, $_POST["password"]);

		// create sql
		$sql = "SELECT firstname, lastname FROM users_original WHERE email='$email' and password='$password';";

		// make query and get result
		$result = mysqli_query($conn,$sql);

		// fetch result and make array
		$account = mysqli_fetch_all($result,MYSQLI_ASSOC);
		
		// get rows available in result
		$count = mysqli_num_rows($result);
		
		// If result matched $myusername and $mypassword, table row must be 1 row
		if($count == 1) {

			// save firstname and lastname
			$_SESSION["firstname"] = $account[0]["firstname"];
			$_SESSION["lastname"] = $account[0]["lastname"];

			// close connection
			mysqli_close($conn);

			header("Location: welcome.php");
		}else {
			$errors["login"] = "Your email or password is invalid";
		}

	} // end of if arrray_filter
  }
?>

<!DOCTYPE html>
<html>

<?php include 'templates/header.php'; ?>

<div class="container row mt-5 mb-5 mx-auto shadow">

  <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
	<div class="position-relative min-height text-center">
	  <div class="position-absolute bottom-0 start-50 translate-middle-x">
		<p>First time? Make an awesome account!</p>
		<a href="register.php"><button type="button" class="btn mybutton">New Account</button></a>
	  </div>
	</div>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
	<div>
	  <h2 class="my-3 title mini-title">Login</h2>
	  <form action="login.php" method="POST">
		<div class="mb-3">
		  <label for="exampleInputEmail1" class="form-label">Email address</label>
		  <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="<?php echo $email ?>">
		  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
		  <div class="form-text text-danger"><?php echo $errors["login"] ?></div>
		  <div class="form-text text-danger"><?php echo $errors["email"] ?></div>
		</div>
		<div class="mb-3">
		  <label for="exampleInputPassword1" class="form-label">Password</label>
		  <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?php echo $password ?>">
		  <div class="form-text text-danger"><?php echo $errors["login"] ?></div>
		  <div class="form-text text-danger"><?php echo $errors["password"] ?></div>
		  <div id="emailHelp" class="form-text text-end "><a class="mini-title" href="#">Forgot Password?</a></div>
		</div>
		<button type="submit" class="btn mybutton" name="login">Login</button>
	  </form>
	</div>
  </div>
</div>

</div> <!--extra div for starting <div> of container from header-->
<?php include 'templates/footer.php'; ?>
</html>