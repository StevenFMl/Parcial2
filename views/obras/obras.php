<?php
include_once('../../config/sesiones.php');
if (isset($_SESSION["ID_Obra"])) 
    $_SESSION["ruta"] = "Obras";
?>

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <?php require_once('../html/head.php')  ?>
    </head>
    
    <body>
        <!-- ======= Header ======= -->
        <?php require_once('../html/header.php') ?>
        <!-- End Header -->

        <!-- ======= Sidebar ======= -->
        <?php require_once('../html/menu.php') ?>
        
        <!-- End Sidebar-->
 <!-- Content wrapper -->
 <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tablas /</span> Obras</h4>
              <h1 class="h3 mb-0 text-gray-800"><?php echo $_SESSION["ruta"] ?></h1>
            
        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Lista de <?php echo $_SESSION["ruta"] ?></h6>
                                    <button onclick="cargaSelectRoles()" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalObras">Nueva Obras</button>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Obra</th>
                      </tr>
                    </thead>
                    <tbody id="TablaObras"></tbody>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> 
                          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="Lilian Fuller"
                            >
                          
                      
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->
<!-- Modal -->
<div class="modal fade" id="modalObras" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="TituloModalObras">Nueva Obra</h1>
                            <button type="button" onclick="limpiar()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                    <form id= "Obras_form">
                        <div class="modal-body">
                        <input type="hidden" name="obras_id" id="obras_id">

                        <div class="form-group">
                                    <label for="ob_nombre" class="control-label">Nombres</label>
                                    <input type="text" name="ob_nombre" id="ob_nombre" class="form-control" required>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="limpiar()" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <!--scripts-->
        <?php include_once('../html/scripts.php')  ?>
        <script src="obras.js"></script>
</body>
</html>