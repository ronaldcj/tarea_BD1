<?php 
	include('conexion.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$edit_state = true;
		$rec = pg_query($conn,"SELECT * FROM alm.item WHERE id_item = $id");
		$record = pg_fetch_array($rec);
			
            $codigo =$record['codigo']; 
            $descripcion =$record['descripcion'];
            $unidad =$record['unidad'];  
            $ubicacion= $record['ubicacion'];  
            $partida_pr= $record['partida_presup']; 
        }  
            //$status= $record['activo_cartelera'];
?>
<!DOCTYPE html>
	<html>
	<head>
		<title>editar</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					
					<form action="itemcrud.php" id="formregistro" method="POST" enctype="multipart/form-data">
						<fieldset class="scheduler-border">
							<legend class="scheduler-border" style="border:none;width:150px;">Detalles de item</legend>
							<div class="row">
								<input type="hidden" name="id_item" value="<?php echo $id;?>">
								<div class="col-md-3">
									<label>Codigo:</label>
								</div>
								<div class="col-md-7">
									<input type="text" class="form-control" name="codigo" value="<?php echo $codigo;?>">
								</div>
								
							</div>
							<br>
							<div class="row">
								<div class="col-md-3">
									<label>Descripcion:</label>
								</div>
								<div class="col-md-7">
									<input type="text" class="form-control" name="descripcion" value="<?php echo $descripcion;?>">
								</div>
								
							</div>
							<br>
							<div class="row">
								<div class="col-md-3">
									<label>Unidad:</label>
								</div>
								<div class="col-md-7">
									<select class="form-control" name="unidad" value="<?php echo $unidad;?>">
										<option value="pza">Pza</option>
									</select>
								</div>
								
							</div>
							<br>
							<div class="row">
								<div class="col-md-3">
									<label>Ubicacion:</label>
								</div>
								<div class="col-md-7">
									<select class="form-control" name="ubicacion" >
										<option value="<?php echo $ubicacion;?>"><?php echo $ubicacion;?></option>
										<option>Almacen 1</option>
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
										<input type="text" class="form-control" name="partida_pr" value="<?php echo $partida_pr;?>">
								</div>										
							</div>										
					    
					      
			           		<button type="submit" name="edit" class="btn btn-primary">Grabar</button>
			        		<a class="btn btn-danger" href="items.php">Volver</a>
									     
						</fieldset>
					</form>	
				</div>
				<div class="col-md-3"></div>

			</div>
		</div>
	</body>
	</html>