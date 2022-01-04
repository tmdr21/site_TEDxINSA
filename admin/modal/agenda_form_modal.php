        
        <!-- Agenda Form Modal-->
        <div class="modal fade" id="agendaFormModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body object-view">
                        <div class="card shadow mb-12">
                            <div class="card-body row">
                                <div class="form-group col-6 row">
                                    <label class="col-form-label col-sm-2">Jour</label>
                                    <select name="day" class="form-control col-sm-5" id="day">
                                        <?php 
                                            for ($i = 1; $i <= 31; $i++) {
                                                print_r('<option value="'.$i.'">'.$i.'</option>');
                                            } 
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-6 row">
                                    <label class="col-form-label col-sm-2">Mois</label>
                                    <select name="month" class="form-control col-sm-5" id="month">
                                        <?php 
                                            for ($i = 1; $i <= 12; $i++) {
                                                print_r('<option value="'.$i.'">'.$i.'</option>');
                                            } 
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row object-detail">

                            <div class="col-md-6">
                                <div class="card shadow mb-6">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-danger">
                                            <img class="table_flag_icon" src="../img/fr_flag.svg" />Version Française 
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="col-form-label">Titre</label>
                                            <input id="title_fr" class="form-control">
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label">Information supplémentaire</label>
                                            <textarea id="info_fr" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="card shadow mb-6">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-danger">
                                            <img class="table_flag_icon" src="../img/en_flag.svg" />English Version
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="col-form-label">Titre</label>
                                            <input id="title_en" class="form-control">
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label">Information supplémentaire</label>
                                            <textarea id="info_en" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                        <a class="btn btn-danger">Valider</a>
                    </div>
                </div>
            </div>
        </div>