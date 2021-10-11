        <!-- Agenda Form Modal-->
        <div class="modal fade" id="genererCodeModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body object-view">
                        <div class="row object-detail">

                            
                                <div class="card shadow mb-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="number" class="col-form-label">Nombre de codes à génerer</label>
                                            <input type="number" id="number" name="number" required value="100" onfocus="this.value='100'" onblur="if(this.value=='')this.value='100'" min="0" max="1000" step="10" class="form-control">
                                            <p class="comments"></p>
                                        </div>
                                    </div>
                                </div>

                            

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                        <button class="btn btn-primary">Génerer</button>
                    </div>
                </div>
            </div>
        </div>