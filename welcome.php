
<?php

	session_start();

	include 'config/db_connect.php';

	// make an sql
	$sql = "SELECT id,firstname,lastname,email FROM users_original";

	// make a query and get result
	$result = mysqli_query($conn,$sql);

	// fetch result and make an array
	$accounts = mysqli_fetch_all($result,MYSQLI_ASSOC);

	// close connection
	mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<?php include 'templates/header.php'; ?>

<div class="alert title-active mt-2 shadow " role="alert">
	<div class="d-flex justify-content-center" role="alert">
		<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
		<div>
			Logged in as <?php echo htmlspecialchars($_SESSION["firstname"]) . " " . htmlspecialchars($_SESSION["lastname"]);?>
		</div>
	</div>
</div>
<div class="container row mb-5 mx-auto shadow">
	<div class="col min-height p-4">
		<h2 class=" mini-title text-center">Table Records</h2>
		<div class="mt-3 mb-3 table-responsive">
			<table class="table table-hover mb-3">
				<thead>
					<tr class="text-center">
						<th scope="col">ID</th>
						<th scope="col">First Name</th>
						<th scope="col">Last Name</th>
						<th scope="col">Email</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($accounts as $account) { ?>
						<tr class="text-center">
							<th scope="row"><?php echo $account["id"]; ?></th>
							<td><?php echo htmlspecialchars($account["firstname"]); ?></td>
							<td><?php echo htmlspecialchars($account["lastname"]); ?></td>
							<td><?php echo htmlspecialchars($account["email"]); ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

</div> <!--extra div for container from header-->
<?php include 'templates/footer.php'; ?>
</html>