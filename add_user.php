
<?php 

include "config/db_connect_pdo.php";

$name = $email = $phone = $title = "";

if(isset($_POST["addStudent"])){
	if($_POST["name"]){
		$name = $_POST["name"];
	}
	
	if($_POST["age"]){
		$email = $_POST["age"];
	}
	
	if($_POST["address"]){
		$phone = $_POST["address"];
	}
	
	if($_POST["section"]){
		$title = $_POST["section"];
	}
	
	// escape sql char
	$name = $_POST["name"];
	$age = $_POST["age"];
	$address = $_POST["address"];
	$section = $_POST["section"];
	
	// // create sql
	// $sql = "INSERT INTO users (name,email,phone,title) VALUES('$name','$email','$phone','$title')";
	
	// // save to db and check
	// if(mysqli_query($conn, $sql)){
	// 	// succes
	// 	header('Refresh: 0');
	// 	$name = $email = $phone = $title = "";
	// 	echo '<script>localStorage.clear();</script>';
	// } else {
	// 	echo "query error: " . mysqli_error($conn);
	// }

	// $stmt = $conn->prepare("INSERT INTO students_tbl (name, age, address, section) VALUES ('$name', '$age', '$address', '$section')");
	// $result = $stmt->execute([$name, $age, $address, $section]);

	// $sql = "INSERT INTO students_tbl (name, age, address, section) 
	// 		VALUES ('$name', '$age', '$address', '$section')";
	// $restul = $stmt->execute(
	// 	array(	"name" => $name,
	// 			"age" => $age,
	// 			"address" => $address,
	// 			"section" => $section)
	// );

	try {
		$sql = "INSERT INTO students_tbl (name, age, address, section) 
		VALUES ('$name', '$age', '$address', '$section')";
		// use exec() because no results are returned
		$conn->exec($sql);
		header('Refresh: 0');
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	

	// if($result){
	// 	echo json_encode([
	// 	'code' => '201'
	// 	]);
	// }else{
	// 	echo json_encode([
	// 		'code' => '400'
	// 	]);
	// }

	$conn = null;
	
} // end POST check
?>

<!-- Button trigger modal -->
<div class="text-center">
	<button type="button" class="btn mybutton" data-bs-toggle="modal" data-bs-target="#exampleModal">
		<i class="fas fa-user-plus m-1"></i>Add Student
	</button>
</div>

<!-- Modal -->
<div class="modal fade in" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
					<div >
						<label class="form-label">Name</label>
						<input type="text" class="form-control" name="name" value="<?php echo $name ?>">
						<div class="form-text">Let us know your name.</div>
					</div>
					<div >
						<label for="exampleInputEmail1" class="form-label">Age</label>
						<input type="text" class="form-control" name="age" aria-describedby="emailHelp" value="<?php echo $email ?>">
						<div id="emailHelp" class="form-text">How old are you?</div>
					</div>
					<div class="mb-3 row">
						<div class="col">
							<label for="exampleInputphone1" class="form-label">Address</label>
							<input type="phone" class="form-control" name="address"  value="<?php echo $phone ?>">
							<div id="emailHelp" class="form-text">Write your address.</div>
						</div>
						<div class="col">
							<label class="form-label">Section</label>
							<input type="text" class="form-control" name="section" value="<?php echo $title ?>">
							<div class="form-text">What is section.</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="text-end">
						<button type="submit" class="btn mybutton" name="addStudent">
							<i class="fas fa-user-plus m-1"></i>
							Add
						</button>
					</div>
				</div>
			</form>
		</div><!-- end of modal content -->
	</div><!-- end of modal container -->
</div><!-- end of modal -->
