<?php 

include "config/db_connect.php";

$firstname = $lastname = $email = $password = $rpassword = "";

$errors = array("firstname"=>"", "email"=>"", "password"=>"", "rpassword"=>"");

if(isset($_POST["register"])){

	$lastname = $_POST["lastname"];

	// check firstname
	if(empty($_POST["firstname"])){
		$errors["firstname"] = "Your first name is required";
	} else {
		$firstname = $_POST["firstname"];
	}
	
	// check email
	if(empty($_POST["email"])){
		$errors["email"] = "An email is required";
	} else {
		$email = $_POST["email"];
	}
	
	// check password
	if(empty($_POST["password"])){
		$errors["password"] = "A password is required";
	} else {
		$password = $_POST["password"];
	}
	
	// check repeat password
	if(empty($_POST["rpassword"])){
		$errors["rpassword"] = "A password match is required";
	} else { // check if match
		if ($_POST["password"] === $_POST["rpassword"]){
			$rpassword = $_POST["rpassword"];
		} else {
			$rpassword = $_POST["rpassword"];
			$errors["rpassword"] = "Password does not match";
		}
	}
	
	if(array_filter($errors)){
		// display label errors
	} else {
		// escape sql char
		$firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
		$lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
		$email = mysqli_real_escape_string($conn, $_POST["email"]);
		$password = mysqli_real_escape_string($conn, $_POST["password"]);
		
		// create sql
		$sql = "INSERT INTO users_admin (firstname,lastname,email,password) VALUES('$firstname','$lastname','$email','$password')";
		
		// save to db and check
		if(mysqli_query($conn, $sql)){
			// succes
			header('Location: redirect_to_login.php');
		} else {
			echo "query error: " . mysqli_error($conn);
		}
		
		mysqli_close($conn);
	}
	
} // end POST check
?>

<!DOCTYPE html>
<html>

<?php include 'templates/header.php'; ?>

<div class="container row mt-5 mb-5 mx-auto shadow">

	<div class="col-lg-6 col-md-6 col-sm-6 mb-4">
		<div >
			<h2 class="my-3 title mini-title">Register</h2>
			<form action="register.php" method="POST">
				<div class="mb-3 row">
					<div class="col">
						<label class="form-label">First Name</label>
						<input type="text" class="form-control" name="firstname" value="<?php echo $firstname ?>">
						<div class="form-text">Let us know your name.</div>
						<div class="form-text text-danger"><?php echo $errors["firstname"] ?></div>
					</div>
					<div class="col">
						<label class="form-label">Last Name</label>
						<input type="text" class="form-control" name="lastname" value="<?php echo $lastname ?>">
						<div class="form-text">Optional</div>
					</div>
				</div>
				<div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">Email address</label>
					<input type="email" class="form-control" name="email" aria-describedby="emailHelp" value="<?php echo $email ?>">
					<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
					<div class="form-text text-danger"><?php echo $errors["email"] ?></div>
				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Password</label>
					<input type="password" class="form-control" name="password"  value="<?php echo $password ?>">
					<div id="emailHelp" class="form-text">Make an awesome one.</div>
					<div class="form-text text-danger"><?php echo $errors["password"] ?></div>
				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Repeat Password</label>
					<input type="password" class="form-control" name="rpassword" value="<?php echo $rpassword ?>">
					<div id="emailHelp" class="form-text">Match with the awesome one.</div>
					<div class="form-text text-danger"><?php echo $errors["rpassword"] ?></div>
				</div>
				<button type="submit" class="btn mybutton" name="register">Register</button>
			</form>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 mb-4">
		<div class="position-relative min-height text-center">
			<div class="position-absolute bottom-0 start-50 translate-middle-x">
				<p>Already have an account? Great!</p>
				<a href="login.php"?<button type="button" class="btn mybutton">Login Account</button></a>
			</div>
		</div>
	</div>
</div>

</div> <!--extra div for container from header-->
<?php include 'templates/footer.php'; ?>
</html>