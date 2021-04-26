<?php 
    headerAdmin($data); 
    getModal('modalClientes',$data);
?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-user-md" aria-hidden="true"></i> <?= $data['page_title'] ?>
          <button class="btn btn-primary" type="button" onclick="openModal();" ><i class="fa fa-plus-circle" aria-hidden="true"></i>Nuevo</button>
          </h1> 
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/clientes"><?= $data['page_title'] ?></a></li>
        </ul>
      </div>
        
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableClientes">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Fecha Nacimiento</th>
                      <th>Email</th>
                      <th>Direccion</th>
                      <th>Telefono</th>
                      <th>Status</th>
                      <th>ID Usuario</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </main>
    <?php footerAdmin($data); ?>
    