<!-- Modal -->
<div class="modal fade" id="modalFormCliente" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tile">
          <div class="tile-body">
            <form id="formCliente" name="formCliente">
              <input type="hidden" id="idCliente" name="idCliente" value="">
              <p class="text-primary">Todos los campos con obligatorios </p>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtNombre">Nombres</label>
                  <input type="text" class="form-control" id="txtNombre" name="txtNombre" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="txtApellido">Apellidos</label>
                  <input type="text" class="form-control" id="txtApellido" name="txtApellido" required="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtFecha">Fecha Nacimiento</label>
                  <input type="date" class="form-control" id="txtFecha" name="txtFecha" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="txtEmail">Email</label>
                  <input type="email" class="form-control" id="txtEmail" name="txtEmail" required="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtDireccion">Direccion</label>
                  <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="txtTelefono">Telefono</label>
                  <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" required="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="exampleSelect1">Estado</label>
                  <select class="form-control" id="listStatus" name="listStatus" required="">
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="idUsuario">ID Usuario</label>
                  <input type="text" class="form-control" id="idUsuario" name="idUsuario" required="">
                </div>
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