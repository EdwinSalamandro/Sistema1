<!-- Modal -->
<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tile">
          <div class="tile-body">
            <form id="formUsuario" name="formUsuario" class="form-horizontal">
              <p class="text-primary">Todos los campos con obligatorios </p>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="idUsuario">Identificación</label>
                  <input type="text" class="form-control" id="idUsuario" name="idUsuario" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="txtEmail">Email</label>
                  <input type="email" class="form-control" id="txtEmail" name="txtEmail" required="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtPassword">Contraseña</label>
                  <input type="password" class="form-control" id="txtPassword" name="txtPassword" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="txtTipo">Tipo Usuario</label>
                  <input type="text" class="form-control" id="txtTipo" name="txtTipo" required="">
                </div>             
              </div>
              <div class="form-group">
                <label for="exampleSelect1">Estado</label>
                <select class="form-control" id="listStatus" name="listStatus" required="">
                  <option value="1">Activo</option>
                  <option value="2">Inactivo</option>
                </select>
              </div>
              <div class="tile-footer">
                <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText"><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                <a class="btn btn-secondary" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>