<!-- Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title title mini-title m-0 mt-2" id="confirmDeleteModal">
				Confirm
			</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<!-- Delete user ''? -->
			Delete user with ID '<span id="changeSpan"></span>'?
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
			<div class="text-end">
				<button type="button" class="btn btn-danger"  onclick="deleteUser(<?php echo $account['id'];?>)" name="save">
					<i class="fas fa-trash-alt m-1"></i>
					Delete
				</button>
			</div>
		</div>
		</div>
	</div> <!--end of modal container-->
</div> <!--end of modal-->