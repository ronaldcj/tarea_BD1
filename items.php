<?php
	require_once('conexion.php');
	$datos = "SELECT * FROM alm.item  where remover_flag = 0 order by id_item";
	$resDatos = pg_query($datos)or die('consulta fallida'.pg_last_error());
	$rows=pg_num_rows($resDatos);
	

	//codigo para el if de la busqueda 
	if ($_POST){
	//Incrementamos el valor y hacer la busqueda con los datos 
	$conta = $_POST["conta"] + 1;
	//variables
	$codigo=$_POST['codigo']; 
	echo $codigo;
	$descripcion=$_POST['descripcion']; 
	$unidad=$_POST['unidad']; 
	$ubicacion=$_POST['ubicacion']; 
	//funcion de busqueda
	$result= pg_query($conn, "SELECT alm.sel_by_page_items('$codigo','','','','') "); 
	$res_busqueda = pg_fetch_array($result, null, PGSQL_ASSOC);
	echo $res_busqueda['codigo'];
	}
	else{
	//Valor inicial
	$conta = 0;
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Gestion de Items</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<br>
				<a class="btn btn-secondary" href="usuarios.php"> CRUD Usuarios</a>
			</div>
			<div class="col-md-6">				
				<h2>Gestion de Items</h2>
				<!--INICIO formulario de busqueda-->
				<form name="busqueda" action="<?=$_SERVER["PHP_SELF"]?>" method="post">
					<fieldset class="scheduler-border">
						<legend class="scheduler-border">Buscar item</legend>
						<div class="row">
							<div class="col-md-2">
								<label>Codigo:</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="form-control" name="codigo">
							</div>
							<div class="col-md-2">
								<label>Descripcion:</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="form-control" name="descripcion">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-2">
								<label>Unidad:</label>
							</div>
							<div class="col-md-4">
								<select class="form-control" name="unidad">
									<option value="Pza">Pza</option>
									<option>2</option>
								</select>
							</div>
							<div class="col-md-2">
								<label>Ubicacion:</label>
							</div>
							<div class="col-md-4">
								<select class="form-control" name="ubicacion">
									<option>almacen 1</option>
									<option>almacen 2</option>
								</select>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-2">
								<label>Partida presupuesto:</label>
							</div>
							<div class="col-md-4">
								<select class="form-control">
									<option>1</option>
									<option>2</option>
								</select>
							</div>
							<div class="col-md-2">
								<a href="items.php"  class="btn btn-outline-danger">Cancelar Busqueda</a>
							</div>
							<div class="col-md-2"><input type="text" name="conta" value="<?=$conta?>"></div>
							<div class="col-md-2">
								<input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
							</div>
						</div>	
					</fieldset>
				</form>
				<!--FIN formulario de busqueda-->
				<br>
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevo">
				  Nuevo
				</button>
				<button type="button" class="btn btn-light">Imprimir</button>
			</div>
			<div class="col-md-3"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<!-- INICIO Modal -->
				<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h2 class="modal-title" id="exampleModalLabel">NUEVO ITEM</h2>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				        <div class="modal-body">
				      	
				       		<form action="itemcrud.php" id="formregistro" method="POST" enctype="multipart/form-data">
								<fieldset class="scheduler-border">
									<legend class="scheduler-border" style="border:none;width:150px;">Detalles de item</legend>
									<div class="row">
										<div class="col-md-3">
											<label>Codigo:</label>
										</div>
										<div class="col-md-7">
											<input type="text" class="form-control" name="codigo">
										</div>
										
									</div>
									<br>
									<div class="row">
										<div class="col-md-3">
											<label>Descripcion:</label>
										</div>
										<div class="col-md-7">
											<input type="text" class="form-control" name="descripcion">
										</div>										
									</div>
									<br>
									<div class="row">
										<div class="col-md-3">
											<label>Unidad:</label>
										</div>
										<div class="col-md-7">
											<select class="form-control" name="unidad">
												<option value="pzzaa">Pza</option>
											</select>
										</div>										
									</div>
									<br>
									<div class="row">
										<div class="col-md-3">
											<label>Ubicacion:</label>
										</div>
										<div class="col-md-7">
											<select class="form-control" name="ubicacion">
												<option value="almacen4">Almacen 1</option>
												<option>Almacen 2</option>
												<option>Almacen 3</option>
											</select>
										</div>										
									</div>
									<br>
									<div class="row">
										<div class="col-md-3">
											<label>Partida presupuestaria:</label>
										</div>
										<div class="col-md-7">
												<input type="text" class="form-control" name="partida_pr">
										</div>										
									</div>	
									<div class="row">
										<div class="col-md-3">
											<label>Cantidad:</label>
										</div>
										<div class="col-md-7">
												<input type="text" class="form-control" name="cantidad">
										</div>										
									</div>
								</fieldset>								
									<div class="row">
										<div class="col-md-2"></div>
										<div class="col-md-2">
											<button type="submit" name="save" class="btn btn-primary">Grabar</button>
										</div>
										<div class="col-md-4"></div>
										<div class="col-md-2">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>	
										</div>
										<div class="col-md-2"></div>
									</div>
							</form>				       		
						</div>
							      <div class="modal-footer"></div>
				    </div>
				  </div>
				</div>
				<!--FIN modal-->
				<!--la tabla-->
				<br>
				<table class="table table-striped">
					<thead>
					    <tr>
					      <th scope="col">Comando</th>
					      <th scope="col">Codigo<i class="fas fa-caret-down"></i></th>
					      <th scope="col">Descripcion</th>
					      <th scope="col">Unidad<i class="fas fa-caret-down"></i></th>
					      <th scope="col">Ubicacion<i class="fas fa-caret-down"></i></th>
					      <th scope="col">Partida presupuestada</th>						
					    </tr>
				  	</thead>
				  	<tbody>
							<?php

							if ($conta == 0) {

							while ($registro = pg_fetch_array($resDatos, null, PGSQL_ASSOC))
							 {						 	
							?>
									<tr>
									<td> 
										<a class="edit" href="updateItem.php?edit=<?php echo $registro['id_item'];?>"><i class="fas fa-pen-square fa-2x"></i></a> 
										<a href="itemcrud.php?del=<?php echo $registro['id_item'];?>"> <i class="fas fa-trash fa-2x" style="color: red;"></i></a>  

									</td>
									<td> <?php echo $registro['codigo'];?></td>
									<td> <?php echo $registro['descripcion'];?></td>
									<td> <?php echo $registro['unidad'];?></td>
									<td> <?php echo $registro['ubicacion'];?></td> 
	                                <td> <?php echo $registro['partida_presup'];?></td>
									</tr>
									
						<?php	
							}
						}
						else if($conta!=0){
							while ($res_busqueda = pg_fetch_array($result, null, PGSQL_ASSOC))
							 {	
							?>
								<tr>
									<td> 
										<a class="edit" href="updateItem.php?edit=<?php echo $res_busqueda['id_item'];?>"><i class="fas fa-pen-square fa-2x"></i></a> 
										<a href="itemcrud.php?del=<?php echo $res_busqueda['id_item'];?>"> <i class="fas fa-trash fa-2x" style="color: red;"></i></a>  

									</td>
									<td> <?php echo $res_busqueda[0];?></td>
									<td> <?php echo $res_busqueda[1];?></td>
									<td> <?php echo $res_busqueda[2];?></td>
									<td> <?php echo $res_busqueda[3];?></td> 
	                                <td> <?php echo $res_busqueda[4];?></td>
									</tr>

							<?php
							}
						}
						?> 

				  	</tbody>					
				</table>				
			</div>
			<div class="col-md-2"></div>			
		</div>			
	</div>

	
</body>
</html>