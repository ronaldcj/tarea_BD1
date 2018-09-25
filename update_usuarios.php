<?php 
	include('conexion.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$edit_state = true;
		$rec = pg_query($conn,"SELECT * FROM alm.usuarios WHERE id_usuario = $id");
		$record = pg_fetch_array($rec);
			
            $id=$record['id_usuario']; 
			$usuario=$record['usuario']; 
            $clave=$record['clave']; 
            $nombres=$record['nombres']; 
            $paterno=$record['paterno']; 
            $materno=$record['materno']; 
            $obs= $record['obs']; 
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
					
					<form action="usuariocrud.php" id="formregistro" method="POST" enctype="multipart/form-data">
						<fieldset class="scheduler-border">
							<legend class="scheduler-border" style="border:none;width:150px;">Detalles de Usuario</legend>
							<div class="row">
								<input type="hidden" name="id_usuario" value="<?php echo $id;?>">
								<div class="col-md-3">
									<label>Usuario:</label>
								</div>
								<div class="col-md-7">
									<input type="text" class="form-control" name="usuario" value="<?php echo $usuario;?>">
								</div>
								
							</div>
							<br>
							<div class="row">
								<div class="col-md-3">
									<label>Clave:</label>
								</div>
								<div class="col-md-7">
									<input type="text" class="form-control" name="clave" value="<?php echo $clave;?>">
								</div>
								
							</div>
							<br>
							<div class="row">
								<div class="col-md-3">
									<label>Nombres:</label>
								</div>
								<div class="col-md-7">
									<input type="text" class="form-control" name="nombres" value="<?php echo $nombres;?>">
								</div>
								
							</div>
							<br>
							<div class="row">
								<div class="col-md-3">
									<label>Apellido Paterno:</label>
								</div>
								<div class="col-md-7">
									<input type="text" class="form-control" name="paterno" value="<?php echo $paterno;?>">
								</div>
								
							</div>
							<br>
							<div class="row">
								<div class="col-md-3">
									<label>Apellido Materno:</label>
								</div>
								<div class="col-md-7">
										<input type="text" class="form-control" name="materno" value="<?php echo $materno;?>">
								</div>										
							</div>
							<div class="row">
								<div class="col-md-3">
									<label>Observaciones:</label>
								</div>
								<div class="col-md-7">
										<input type="text" class="form-control" name="obs" value="<?php echo $obs;?>">
								</div>										
							</div>										
					    
					      
			           		<button type="submit" name="edit" class="btn btn-primary">Grabar</button>
			        		<a class="btn btn-danger" href="usuarios.php">Volver</a>
									     
						</fieldset>
					</form>	
				</div>
				<div class="col-md-3"></div>

			</div>
		</div>
	</body>
	</html>