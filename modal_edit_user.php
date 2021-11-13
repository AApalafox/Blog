
<?php 

include "config/db_connect.php";

$name = $email = $phone = $title = "";

$errors = array("name"=>"", "email"=>"", "phone"=>"", "title"=>"");

if(isset($_POST["saveEdit"])){
	$id = intval($_POST["id"]);
	// check name
	if(empty($_POST["name"])){
		$errors["name"] = "Your name is required";
	} else {
		$name = $_POST["name"];
	}
	// check email
	if(empty($_POST["email"])){
		$errors["email"] = "An email is required";
	} else {
		$email = $_POST["email"];
	}
	// check phone
	if(empty($_POST["phone"])){
		$errors["phone"] = "A phone is required";
	} else {
		$phone = $_POST["phone"];
	}
	// check title
	if(empty($_POST["title"])){
		$errors["title"] = "A title is required";
	} else {
		$title = $_POST["title"];
	}
	
	if(array_filter($errors)){
		// display label errors
		echo '<script>alert("invalid input");</script>';
	} else {
		// escape sql char
		$name = mysqli_real_escape_string($conn, $_POST["name"]);
		$email = mysqli_real_escape_string($conn, $_POST["email"]);
		$phone = mysqli_real_escape_string($conn, $_POST["phone"]);
		$title = mysqli_real_escape_string($conn, $_POST["title"]);
		
		// create sql
		$sql = "UPDATE users SET name='$name', email='$email', phone='$phone', title='$title' WHERE id=$id";
		
		// save to db and check
		if(mysqli_query($conn, $sql)){
			// succes
			$name = $email = $phone = $title = "";
			echo '<script>localStorage.clear();</script>';
			header("Refresh:0");
		} else {
			echo "query error: " . mysqli_error($conn);
		}
		
		mysqli_close($conn);
	}
	
} // end POST check
?>

<!-- Modal -->
<div class="modal fade in" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form action="welcome.php" method="POST">
				<div class="modal-header">
					<!-- <h5 class="modal-title" id="exampleModalLabel">User Details</h5> -->
					<h5 class="modal-title title mini-title m-0 mt-2">
						<i class="fas fa-info-circle m-1"></i></i>User Details
					</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body p-4">
					<div>
						<label class="form-label">ID: </label>
						<input type="text" id="editID" class="form-control" name="id" value="" readonly>
					</div>
					<div >
						<label class="form-label">Name</label>
						<input type="text" id="editName" class="form-control" name="name" value="<?php echo htmlspecialchars($account["name"]); ?>">
						<div class="form-text">Let us know your name.</div>
						<div class="form-text text-danger"><?php echo $errors["name"] ?></div>
					</div>
					<div >
						<label for="exampleInputEmail1" class="form-label">Email address</label>
						<input type="email" id="editEmail" class="form-control" name="email" aria-describedby="emailHelp" value="<?php echo htmlspecialchars($account["email"]);?>">
						<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
						<div class="form-text text-danger"><?php echo $errors["email"] ?></div>
					</div>
					<div class="mb-3 row">
						<div class="col">
							<label for="exampleInputphone1" class="form-label">Phone Number</label>
							<input type="phone" id="editPhone" class="form-control" name="phone"  value="<?php echo htmlspecialchars($account["phone"]); ?>">
							<div id="emailHelp" class="form-text">Write your contact number.</div>
							<div class="form-text text-danger"><?php echo $errors["phone"] ?></div>
						</div>
						<div class="col">
							<label class="form-label">Title</label>
							<input type="text" id="editTitle" class="form-control" name="title" value="<?php echo htmlspecialchars($account["title"]); ?>">
							<div class="form-text">What is your title.</div>
							<div class="form-text text-danger"><?php echo $errors["title"] ?></div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="text-end">
						<button type="submit" class="btn mybutton" name="saveEdit">
							<i class="fas fa-user-plus m-1"></i>
							Save
						</button>
					</div>
				</div>
			</form>
		</div><!-- end of modal content -->
	</div><!-- end of modal container -->
</div><!-- end of modal -->