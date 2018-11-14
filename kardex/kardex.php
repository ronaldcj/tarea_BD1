<?php
	require_once('../conexion.php');
	$datos = "SELECT * FROM alm.item  where remover_flag = 0 order by id_item";
	$resDatos = pg_query($datos)or die('consulta fallida'.pg_last_error());
	$rows=pg_num_rows($resDatos);
	

?>


<!DOCTYPE html>
<html>
<head>
	<title>Kardex</title>
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
					<a class="btn btn-secondary" href="../items.php"> CRUD Items</a>
					<a class="btn btn-secondary" href="../usuarios.php"> CRUD Usuarios</a>
					<br>
					<br>
					<a class="btn btn-danger" href="kardexIngreso.php">Registrar Ingreso</a>
					<a class="btn btn-warning" href="kardexSalida.php">Registrar Salida</a>
					
			</div>
			<div class="col-md-6">
				
				
				<div class="row">	
					<div class="col-md-6" >
					 <br>
										
											 <div class="row">
											 
											</div>
												<br>
					<div class="card">
					  <div class="card-header">
					  <h2>Kardex</h2>
					  </div>
					  <div class="card-body">
					    <blockquote class="blockquote mb-0">
					    	<h4><strong>Seleccion rapida <i class="fas fa-arrow-right"></i></strong> </h4>
					      <p><i class="fas fa-info-circle"></i>  Tiene que seleccionar un item del para mostrar el kardex...</p>
					      
					    </blockquote>
					  </div>
					</div>
					</div>				 	
					<div class="col-md-6">
						<br><br>
					<p>Codigo y Descripcion:</p>
						 <form name="item" action="<?=$_SERVER["PHP_SELF"]?>" method="POST" >
							 <select class="form-control" name="codigo">
							 	<option>Seleccione un codigo de item...</option>
									<?php
									while ($registro = pg_fetch_array($resDatos, null, PGSQL_ASSOC)){
									?>
								<option value="<?php echo $registro['id_item'];?>"> <?php echo $registro['codigo']. " ".$registro['descripcion'];?></option>

									<?php
									}
									?>
							 </select>
							 <br>
							 <input type="submit" name="buscar"  class="btn btn-info" value="Buscar">
						 </form>						
					</div>				 	
				</div>
			</div>
			<div class="row">
				<div class="col-md-1"></div>
					
				<div class="col-md-10">
					<div class="row"> 				
						<div class="col-md-6">
						<table class="table table-bordered">
								<?php
									if ($_SERVER["REQUEST_METHOD"] == "POST") {
										$id = $_POST["codigo"];
										$kar="SELECT * FROM  alm.kardex WHERE id_item = $id";
										$resKar = pg_query($kar)or die('consulta fallida'.pg_last_error());
										$item="SELECT * FROM alm.item WHERE  id_item = $id";
										$resItem = pg_query($item)or die('consulta fallida'.pg_last_error());
										$record =pg_fetch_array($resItem);
										//atributos del item
										$descripcion = $record['descripcion'];
										$codigo = $record['codigo'];
										$unidad = $record['unidad'];
										$ubicacion = $record['ubicacion'];

															 	
										?>
						<thead class="thead-dark">
						    <tr>
						      <th scope="col">id item</th>
						      <th scope="col">Descripcion</th>
						      <th scope="col">Codigo</th>
						      <th scope="col">Unidad</th>
						      <th scope="col">Ubicacion</th>
						            								
						    </tr>
					  	</thead>
					  	<tbody>
							<tr>									
								<td scope="row"> <?php echo $id;?></td>
								<td> <?php echo $descripcion;?></td>
								<td> <?php echo $codigo;?></td>
								<td> <?php echo $unidad;?></td> 
                                <td> <?php echo $ubicacion;?></td>
                                
                            </tr>
									
							

					  	</tbody>
					  	</table>
					</div>

						<div class="col-md-6"></div>
					</div>
					<div class="row">
					  	<table class="table table-bordered">
	
						<thead class="thead-dark">
						    <tr>
						      <th scope="col">Fecha</th>
						      <th scope="col">Concepto</th>
						      <th scope="col">Documento</th>
						      <th cope="col" >ENTRADA cantidad</th>
						      <th scope="col">ENTRADA valor unitario</th>
						      <th scope="col">ENTRADA importe</th>	
						      <th scope="col">SALIDA cantidad</th>
						      <th scope="col">SALIDA valor unitario</th>
						      <th scope="col">SALIDA importe</th>	
						      <th scope="col">SALDO cantidad</th>
						      <th scope="col">SALDO valor unitario</th>
						      <th scope="col">SALDO importe</th>
						      <th scope="col">SUMA CANTIDAD</th>								

						    </tr>
					  	</thead>
					  	<tbody>
										<?php
										while ($registro = pg_fetch_array($resKar, null, PGSQL_ASSOC))
										{						 	
										?>
									<tr>
									
										<td scope="row"> <?php echo $registro['fecha'];?></td>
										<td> <?php echo $registro['concepto'];?></td>
										<td> <?php echo $registro['documento'];?></td>
										<td class="table-success"> <?php echo $registro['e_cantidad'];?></td> 
		                                <td class="table-success"> <?php echo $registro['e_valor_unitario'];?></td>
		                                <td class="table-success"> <?php echo $registro['e_importe'];?></td>
		                                <td class="table-warning"> <?php echo $registro['sl_cantidad'];?></td>
										<td class="table-warning" class="table-success"> <?php echo $registro['sl_valor_unitario'];?></td>
										<td class="table-warning"> <?php echo $registro['sl_importe'];?></td>
										<td class="table-primary"> <?php echo $registro['sd_cantidad'];?></td> 
		                                <td class="table-primary"> <?php echo $registro['sd_valor_unitario'];?></td>
		                                <td class="table-primary"> <?php echo $registro['sd_importe'];?></td>
		                                <td> <?php echo $registro['sum_cantidad'];?></td>

	                                </tr>
									
									<?php	
										}
									}
								?>

					  	</tbody>					
					</table>
					</div>
					
				</div>
				<div class="col-md-1"></div>
			</div>

				
			
		</div>
	</div>




</body>
</html>