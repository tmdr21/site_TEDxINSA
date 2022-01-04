<!DOCTYPE html>
<html lang="en">

    <?php include('header.php'); ?>
    <?php include('authenticated.php'); ?>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <?php include('navbar.php'); ?>

			<!-- Begin Page Content -->
			<div class="container-fluid object-view">
			
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"><strong>Codes</strong></h1>
					<button class="btn btn-primary shadow-sm" style="color:#fff" data-toggle="modal" data-target="#genererCodeModal" data-action="genererCode">Générer des codes</button>
					<a class="btn btn-danger shadow-sm" data-toggle="modal" data-target="#deleteModal" data-action="deleteCode" data-object="allCode">Tout supprimer</a>
					<a href="controller/code_download.php" class="btn btn-info">Télécharger</a>
					<a class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm " data-toggle="modal" data-target="#addCodeModal" data-action="addCode"><i class="fas fa-plus fa-sm "></i> Nouveau</a>
                </div>

                <!-- DataTales Example -->
				<div class="card shadow mb-4">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered object-detail" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
									  <th>VoteKey</th>
                                      <th>Valide</th>
                                      <th>Actions</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
                                        <th>VoteKey</th>
                                        <th>Valide</th>
                                        <th>Actions</th>
									</tr>
								</tfoot>
								<tbody>
									<?php 
										$voteKey = Connection::getInstance()->selectAllVoteKeys();
										foreach ($voteKey as $voteKey){
											print_r('
											<tr id="code-'.$voteKey->getId().'">
												<td class="code-code" data-value="'.$voteKey->getCode() .'">
													'.$voteKey->getCode().'
												</td>
												<td class="code-valid" data-value="'.$voteKey->isValid() .'">
													'.$voteKey->isValid().'
												</td>
												<td style="vertical-align: middle;">
                                                    <div class="row table_icon" style="text-align: center;">
                                                        <a class="col-6" target="" data-toggle="modal" data-target="#deleteModal" data-object="code" data-id="'.$voteKey->getId().'" data-name="'.$voteKey->getCode().'">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                   </div>
                                                </td>
											</tr>
                                        ');
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- End of Main Content -->
		
        <?php include('modal/delete_modal.php'); ?>
        <?php include('modal/addCode_modal.php'); ?>
		<?php include('modal/generer_codes_modal.php'); ?>

        <?php include('footer.php'); ?>


        <!-- SCRIPTS -->
        <?php include('scripts.php'); ?>

    </body>

</html>