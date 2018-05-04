<?php require_once '../controller/UsuarioController.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Index Usuarios</title>
		<?php include_once '../src/head.php'; ?>
		<script type="text/javascript" src="../resources/js/usuario.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-9" style="margin-top: 30px;">
		            <p class="robo" style="font-weight: 300; margin-bottom: 0px; font-size: 30px;">Usuarios</p>
		            <p class="robo" style="font-weight: 300; font-size: 14px; height: 40px;">Gesti&oacute;n  de usuarios</p>
        		</div>
				<div class="col-md-3" style="margin-top: 30px;">
					<div class="btn-group pull-right">
	                   <a href="#" class="admin-menu-navi">
	                      <button class="btn btn-primary  btn-sm " style="margin-left: 5px;" id="nuevoUsuario">Nuevo</button>
	                   </a>
                    </div>
				</div>
				<div class="clearfix"></div>
				 <div class="col-md-12" style="margin-top: 10px;">
					<table id="listadoUsuarios" class="mdl-data-table" cellspacing="1" width="100%">
				 		<thead>
				 			<th>Username</th>
				 			<th>Password</th>
				 			<th>Acciones</th>
				 		</thead>
				 		<tbody>
				 		<?php 
			 				$objUsuario = new Usuario();
			 				$data = $objUsuario->getAll();
			 				if ($data!=false) {
			 					foreach ($data as  $value) {
			 						
			 						echo "<tr>
			 								<td>".$value['username']."</td>
			 								<td>".$value['password']."</td>
			 								<td>
			 									<input type='button' class='btn-success btn-sm editarUsuario' id='".$value['id']."' value='Editar'>
			 									<input type='button' class='btn-danger btn-sm eliminarUsuario' id='".$value['id']."' value='Eliminar'>
			 								</td>
			 						      </tr>";
			 					}
			 				}

			 			 ?>
				 			
				 		</tbody>
			 		</table>
			 	</div>
			</div>
		</div>	
	</body>
</html>



<!-- Modal de unsercion de usuario -->
<div class="modal fade modal" id="modalIngresoUsuario" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header " Style="height:45px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <span class="robo" style="font-size: 20px;">Agregar Usuario</span>
                </div>
                <div class="modal-body" >
                	
                      <div class="row" id="infoUsuario">
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                                 <div class="form-group required">
                                     <label for="nombreCiclo" class="control-label">Username</label>
                                     <input type="text" class="form-control requerido"  
                                            placeholder="Username" name="username" id="username" required>
                                 </div>
                          </div>
                           <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="password" class="control-label">Password</label>            
                              <input type="password"  name="password" class="form-control" id="password" required >
                            </div>
                          </div>
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="repassword" class="control-label">Re-Password</label>            
                              <input type="password"  name="repassword" class="form-control" id="repassword" required>
                            </div>
                          </div>
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="rol" class="control-label">Rol</label>            
                              <select name="rol" class="form-control">
                            <?php 

                            	$objUsuario = new Usuario();
                            	$data = $objUsuario->getAllRol();
                            	if ($data!=null) {
                            		foreach ($data as $value) {
                            			echo "<option value='".$value['id']."'>".$value['nombre']."</option>";
                            		}
                            	}
                             ?>
                              	
                              </select>
                            </div>
                          </div>

            
                          <div class="clearfix"></div>

                    </div>
                    <div>
                  	<button class="btn btn-primary  btn-sm " id="agregarUsuario" >Guardar</button>
                  </div>

              </div>         
               <div class="modal-footer" id="modalFooter" >
                  
               </div>
            </div>
        </div> 
</div>   

<!-- Modal de modificacon de usuario -->

<div class="modal fade modal" id="modalModificacionUsuario" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header " Style="height:45px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <span class="robo" style="font-size: 20px;">Modificar Usuario</span>
                </div>
                <div class="modal-body" >
                  
                      <div class="row" id="infoUsuarioEdit">
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                                 <div class="form-group required">
                                     <label for="nombreCiclo" class="control-label">Username</label>
                                     <input type="hidden" name="idUsuario">
                                     <input type="text" class="form-control requerido"  
                                            placeholder="Username" name="username" id="usernameEdit" required>
                                 </div>
                          </div>
                           <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="password" class="control-label">Password</label>            
                              <input type="password"  name="password" class="form-control" id="passwordEdit" required >
                            </div>
                          </div>
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="repassword" class="control-label">Re-Password</label>            
                              <input type="password"  name="repassword" class="form-control" id="repasswordEdit" required>
                            </div>
                          </div>
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="rol" class="control-label">Rol</label>            
                              <select name="rol" class="form-control" id="rolEdit">
                            <?php 

                              $objUsuario = new Usuario();
                              $data = $objUsuario->getAllRol();
                              if ($data!=null) {
                                foreach ($data as $value) {
                                  echo "<option value='".$value['id']."'>".$value['nombre']."</option>";
                                }
                              }
                             ?>
                                
                              </select>
                            </div>
                          </div>

            
                          <div class="clearfix"></div>

                    </div>
                    <div>
                    <button class="btn btn-primary  btn-sm " id="modificarUsuario" >Guardar Cambios</button>
                  </div>

              </div>         
               <div class="modal-footer" id="modalFooter" >
                  
               </div>
            </div>
        </div> 
</div>    
