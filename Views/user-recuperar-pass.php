

<!-- Modal -->
<div class="modal fade" id="userRecuperarPass" tabindex="-1" aria-labelledby="userRecuperarPassLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="userRecuperarPassLabel">Recuperar cuenta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?php echo FRONT_ROOT."User/RecuperarCuenta" ?>" method="POST">            
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label text-primary">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="inputEmail3">
                        </div>
                    </div>                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Recuperar cuenta</button>
                </div>        
                
            </form>

        </div>
    </div>
</div>