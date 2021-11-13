<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<?php
	ob_start();
	session_start();

	include 'config/db_connect_pdo.php';
	try {
		$stmt = $conn->prepare("SELECT id,name,age,address,section FROM students_tbl");
		$stmt->execute();
	  
		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$accounts = $stmt->fetchAll();

	  } catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	  }
	  $conn = null;
?>

<!DOCTYPE html>
<html>

<?php include 'templates/header.php'; ?>

<div class="alert title-active mt-2 shadow-sm " role="alert">
	<div class="d-flex justify-content-center" role="alert">
		<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
		<div>
			Logged in as <?php echo htmlspecialchars($_SESSION["firstname"]) . " " . htmlspecialchars($_SESSION["lastname"]);?>
		</div>
	</div>
</div>
<div class=" mb-5 shadow min-height p-4 mx-auto">
	<h2 class=" mini-title text-center">Student Records</h2>
	<div class="m-5 table-responsive">
		<table class="table table-hover mb-3">
			<thead>
				<!-- <tr class="text-center"> -->
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Name</th>
					<th scope="col">Age</th>
					<th scope="col">Address</th>
					<th scope="col">Section</th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($accounts as $account) { ?>
					<tr  class="align-middle">
						<th scope="row"><?php echo htmlspecialchars($account["id"]); ?></th>
						<td><?php echo htmlspecialchars($account["name"]); ?></td>
						<td><?php echo htmlspecialchars($account["age"]); ?></td>
						<td><?php echo htmlspecialchars($account["address"]); ?></td>
						<td><?php echo htmlspecialchars($account["section"]); ?></td>
						<td>
							<span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Student">
								<button type="button" onclick='editUser(
									{
										id: "<?php echo $account["id"];?>",
										name: "<?php echo $account["name"];?>",
										age: "<?php echo $account["age"];?>",
										address: "<?php echo $account["address"];?>",
										section: "<?php echo $account["section"];?>"
									})' class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#editModal">
									<i class="fas fa-edit"></i>
								</button>
							</span>
							<span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Student">
								<button type="button" onclick="deleteStudent(<?php echo $account['id'];?>)" class="btn btn-outline-danger btn-tooltip">
									<i class="fas fa-trash-alt"></i>
								</button>
							</span>
							
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div> <!--end of items container-->

	<?php include 'modal_edit_student.php' ?>
	<?php include 'add_student.php'; ?>

</div> <!--end of table container-->

</div> <!--extra div for container from header-->
<?php include 'templates/footer.php'; ?>
</html>

<script>
	function deleteStudent(id){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				location.reload();
				alert('Student record deleted');
			}
		};
		xmlhttp.open("GET","delete_student.php?q="+id,true);
		xmlhttp.send();
	}
	function editUser(data){
		$("#editID").val(data["id"]);
		$("#editName").val(data["name"]);
		$("#editAge").val(data["age"]);
		$("#editAddress").val(data["address"]);
		$("#editSection").val(data["section"]);
	}
</script>
<? ob_flush(); ?>
