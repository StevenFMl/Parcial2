<?php
include_once('../../config/sesiones.php');
if (isset($_SESSION["idUsuario"])) {
    $_SESSION["ruta"] = "Usuarios";
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tablas /</span> Usuarios</h4>
              <h1 class="h3 mb-0 text-gray-800"><?php echo $_SESSION["ruta"] ?></h1>
            
        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Lista de <?php echo $_SESSION["ruta"] ?></h6>
                                    <button onclick="cargaSelectRoles()" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUsuarios">Nuevo Usuario</button>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                    <tr>
               <th>#</th>
            <th>Nombres</th>
         <th>Apellidos</th>
         <th>Contraseña</th>
           <th>Rol</th>
                    </tr>
                    </thead>
                    <tbody id="TablaUsuarios"></tbody>
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
<!-- Modal -->
<div class="modal fade" id="modalUsuarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="TituloModalUsuario">Nuevo Usuario</h1>
                            <button type="button" onclick="limpiar()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="usuarios_form">
                                <div class="modal-body">
                                    <input type="hidden" name="idUsaurio" id="idUsaurio">
                                    <div class="form-group">
                                        <label for="Nombres" class="control-label">Nombres</label>
                                        <input type="text" name="Nombres" id="Nombres" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Apellidos" class="control-label">Apellidos</label>
                                        <input type="text" name="Apellidos" id="Apellidos" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="correo" class="control-label">Correo</label>
                                        <input type="mail" name="correo" id="correo" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="contrasenia" class="control-label">contrasenia</label>
                                        <input type="text" name="contrasenia" id="contrasenia" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="Rol" class="control-label">Rol</label>
                                        <select name="idRoles" id="idRoles" class="form-control">
                                           
                                        </select>
                                    </div>
                        </div>
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
        <script src="usuarios.js"></script>
</body>
</html>

<?php
    } else {
        header("Location:../../index.php");
    }
        ?>



