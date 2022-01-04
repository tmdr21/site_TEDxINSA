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
                    <h1 class="h3 mb-0 text-gray-800">Agenda</h1>
                    <a class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm " data-toggle="modal" data-target="#agendaFormModal" data-action="add"><i class="fas fa-plus fa-sm "></i> Nouveau</a>
                </div>

				<!-- DataTales Example -->
				<div class="card shadow mb-4">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered object-detail" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
									  <th>Date</th>
									  <th><img class="table_flag_icon" src="../img/fr_flag.svg" /> Titre</th>
									  <th><img class="table_flag_icon" src="../img/fr_flag.svg" /> Information supplémentaire</th>
									  <th><img class="table_flag_icon" src="../img/en_flag.svg" /> Title</th>
									  <th><img class="table_flag_icon" src="../img/en_flag.svg" /> Additional informations</th>
									  <th>Actions</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
									  <th>Date</th>
									  <th><img class="table_flag_icon" src="../img/fr_flag.svg" /> Titre</th>
									  <th><img class="table_flag_icon" src="../img/fr_flag.svg" /> Information supplémentaire</th>
									  <th><img class="table_flag_icon" src="../img/en_flag.svg" /> Title</th>
									  <th><img class="table_flag_icon" src="../img/en_flag.svg" /> Additional informations</th>
									  <th>Actions</th>
									</tr>
								</tfoot>
								<tbody>
									<?php 
										$agendas = Connection::getInstance()->selectAgenda();
										foreach ($agendas as $agenda){
											print_r('
											<tr id="agenda-'.$agenda->getId().'">
												<td class="agenda-date" data-day="'.$agenda->getDay().'" data-month="'.$agenda->getMonth().'">
													'.$agenda->getDay().'/'.$agenda->getMonth().'
												</td>
												<td class="agenda-title-fr" data-value="'.utf8_encode($agenda->getTitleFrench()).'">
													'.utf8_encode($agenda->getTitleFrench()).'
												</td>
												<td class="agenda-info-fr" data-value="'.utf8_encode($agenda->getInfoFrench()).'">
													'.utf8_encode($agenda->getInfoFrench()).'
												</td>
												<td class="agenda-title-en" data-value="'.utf8_encode($agenda->getTitleEnglish()).'">
													'.utf8_encode($agenda->getTitleEnglish()).'
												</td>
												<td class="agenda-info-en" data-value="'.utf8_encode($agenda->getInfoEnglish()).'">
													'.utf8_encode($agenda->getInfoEnglish()).'
												</td>
												<td style="vertical-align: middle;">
                                                    <div class="row table_icon" style="text-align: center;">
                                                        <a class="col-6" data-toggle="modal" data-target="#agendaFormModal" data-action="edit" data-id="'.$agenda->getId().'">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        <a class="col-6" target="" data-toggle="modal" data-target="#deleteModal" data-object="agenda" data-id="'.$agenda->getId().'" data-name="'.utf8_encode($agenda->getTitleFrench()).'">
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
        <?php include('modal/agenda_form_modal.php'); ?>

        <?php include('footer.php'); ?>


        <!-- SCRIPTS -->
        <?php include('scripts.php'); ?>

    </body>

</html>