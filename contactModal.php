<?php
print_r('
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">'.$modalTitle.'</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="controller/sendMail.php" method="post">
				<div class="modal-body">
						<div class="row">
							<div class="form-group col">
								<p class="form-label">'.email_address.required_field.'</p>
								<input name="email" type="email" class="form-control" placeholder="'.your_email.'" required>
								<small class="form-text text-muted">'.never_share_information.'</small>
							</div>
							<input name="title" type="hidden" value="'.$mailTitle.'">
							<input name="location" type="hidden" value="'.$_SERVER['REQUEST_URI'].'">
						</div>
						');
						include($formToShow);
						print_r('
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">'.close.'</button>
					<button type="submit" class="btn red-btn">'.send.'</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="modalSuccess" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Mail envoyé</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
</div>
');
if(isset($_GET['success']) && $_GET['success'] == 1){
	echo '
	<script>
	$("#modalSuccess").modal();
	$("#my-modal").bind("hide", function () {
	   
	});
	</script>';
}
?>