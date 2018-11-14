 <?php
	require_once('../conexion.php');
	$datos = "SELECT * FROM alm.item  where remover_flag = 0 order by id_item";
		$resDatos = pg_query($datos)or die('consulta fallida'.pg_last_error());
	if (isset($_POST['id'])) {
		$idd = $_POST['id'];

	}
	$nota = "SELECT max(nro_nota) nro FROM alm.ingreso_k";
		$resnota = pg_query($nota)or die('consulta fallida'.pg_last_error());
		$record = pg_fetch_array($resnota);
			
            $nro =$record['nro']; 
            $nro= $nro +1;
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ingreso de item en Kardex</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<!--<link rel="stylesheet" type="text/css" href="estilo.css">-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	
</head>
<body>
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-1"> </div>
		<div class="col-md-10" >

			<h1>Nota: Ingreso Items</h1>
			<div class="row">				
				<br>
				<div class="col-md-1">
					<label>Nro°:</label><br>
					<label>Fecha:</label><br>
					<label>Solicitante:</label><br>
				</div>
				<div class="col-md-2">
					<label>000<?php echo $nro;?></label><br>
					<label><?php echo date("d/m/y"); ?></label><br>
					<input type="text" id="nom_solicitante" name="nom_solicitante"><br>
				</div>
				<div class="col-md-6"></div>
				<div class="col-md-3">
					<a href="kardex.php" class="btn btn-secondary">Volver a Kardex</a>					
					<a href="kardexSalida.php" class="btn btn-warning">Nota Salida</a>
				</div>

			</div>	

			<br>

		    	<div class="row" >
		    		<div class="col-md-2">
		    			<label>Selecione item:</label>
		        		<select class="form-control" name="sel_item" id="sel_item"></select>    			
		    		</div>
		    		<div class="col-md-1">
		    			<label>id item:</label>		    			
		        		<input class="form-control" id="id_item" type="text" name="id_item" readonly>		
		    		</div>
		    		<div class="col-md-1">
		    			<label>Codigo:</label>		    			
		        		<input class="form-control" id="codigo" type="text" name="codigo" readonly>
		    		</div>
		    		<div class="col-md-2">
		    			<label>Descripcion:</label>
		        		<input class="form-control" id="descripcion" type="text" name="descripcion" readonly>		
		    		</div>
		    		<div class="col-md-1">
		    			<label>Unidad:</label>		    			
		        		<input class="form-control" id="unidad" type="text" name="unidad" readonly>    			
		    		</div>
		    	
		    		<div class="col-md-2">
		    			<label>Cantidad:</label>		    			
		        		<input class="form-control" id="cantidad" type="text" name="cantidad" placeholder="Cantidad...">
		    		</div>
		    		<div class="col-md-2">
		    			<label>Valor unitario:</label>		    			
		        		<input class="form-control" id="e_valor_unitario" type="text" name="e_valor_unitario" placeholder="Valor unitario...">
		    		</div>						        		
		    	
		    	<div class="col-md-1">
		    		<button id="bt_add" class="btn btn-success">Agregar</button>
		    	</div>
		    </div>
			
			<br>
		<!--tabla-->
		<div class="row">
			

			<br>
			<form name="form_tabla" method="POST" action="php/kardexcrud.php">	
			<input type="hidden" name="solicitante" id="solicitante">		
			<table id="table1" class="table table-bordered">
				<thead>
					<tr>
						<th>Codigo</th>
						<th>Cantidad</th>
						<th>Valor Unitario</th>
						<th>Unidad</th>
						<th>Descripcion</th>
						<th>Eliminar</th> 
					</tr>
				</thead>
				<tbody>
					

				</tbody>
			</table>
			<input type="submit" name="enviar_ingreso" class="btn btn btn-danger" value="Guardar Nota">
			</form>

		</div>

		</div>
		<div class="col-md-1"></div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/ingreso.js"></script>
</body>

</html>