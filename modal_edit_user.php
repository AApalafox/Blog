
<?php 

include "config/db_connect_pdo.php";

$name = $email = $phone = $title = "";

$errors = array("name"=>"", "email"=>"", "phone"=>"", "title"=>"");

if(isset($_POST["saveEdit"])){
	$id = intval($_POST["id"]);

	if($_POST["name"]){
		$name = $_POST["name"];
	}

	if($_POST["age"]){
		$age = $_POST["age"];
	}

	if($_POST["address"]){
		$address = $_POST["address"];
	}

	if($_POST["section"]){
		$section = $_POST["section"];
	}
	
	// escape sql char
	$name = $_POST["name"];
	$age = $_POST["age"];
	$address = $_POST["address"];
	$section = $_POST["section"];
	
	// // create sql
	// $sql = "UPDATE users SET name='$name', email='$email', phone='$phone', title='$title' WHERE id=$id";
	
	// // save to db and check
	// if(mysqli_query($conn, $sql)){
	// 	// succes
	// 	$name = $email = $phone = $title = "";
	// 	echo '<script>localStorage.clear();</script>';
	// 	header("Refresh:0");
	// } else {
	// 	echo "query error: " . mysqli_error($conn);
	// }
	// mysqli_close($conn);

	// $sql = "UPDATE students_tbl SET name='$name', age='$age', address='$address', section='$section' WHERE id = $id";
	// $stmt = $conn->prepare($sql);
	// $stmt->execute();
	try {
		$sql = "UPDATE students_tbl SET name='$name', age='$age', address='$address', section='$section' WHERE id = $id";
		// use exec() because no results are returned
		$conn->exec($sql);
		header('Refresh: 0');
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}

	$conn = null;
	
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
						<i class="fas fa-info-circle m-1"></i></i>Student Details
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
					</div>
					<div >
						<label for="exampleInputEmail1" class="form-label">Age</label>
						<input type="text" id="editAge" class="form-control" name="age" aria-describedby="emailHelp" value="<?php echo htmlspecialchars($account["age"]);?>">
						<div id="emailHelp" class="form-text">How old are you?</div>
					</div>
					<div class="mb-3 row">
						<div class="col">
							<label for="exampleInputphone1" class="form-label">Address</label>
							<input type="phone" id="editAddress" class="form-control" name="address"  value="<?php echo htmlspecialchars($account["address"]); ?>">
							<div id="emailHelp" class="form-text">Write your addres.</div>
						</div>
						<div class="col">
							<label class="form-label">Section</label>
							<input type="text" id="editSection" class="form-control" name="section" value="<?php echo htmlspecialchars($account["section"]); ?>">
							<div class="form-text">What is your section.</div>
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