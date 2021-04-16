<?php 
    headerAdmin($data); 
    getModal('modalUsuarios',$data);
?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-user-tag"></i> <?= $data['page_title'] ?>
          <button class="btn btn-primary" type="button" onclick="openModal();" ><i class="fa fa-plus-circle"></i>Nuevo</button>
          </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>roles"><?= $data['page_title'] ?></a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableUsuarios">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Fecha Nacimiento</th>
                      <th>Email</th>
                      <th>Dirección</th>
                      <th>Telefono</th>
                      <th>Rol</th>
                      <th>Status</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Carlos</td>
                      <td>Hernandez</td>
                      <td>1998-01-01</td>
                      <td>Anabanana@gmail.com</td>
                      <td>Cra 77 t Bis # 44</td>
                      <td>3125488787</td>
                      <td>Administrador</td>
                      <td>Activo</td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </main>
    <?php footerAdmin($data); ?>
    