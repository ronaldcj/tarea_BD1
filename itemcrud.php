<?php
	include('conexion.php');


        if (isset($_POST['save'])) {
        	$codigo=$_POST['codigo']; 
        	$descripcion=$_POST['descripcion']; 
        	$unidad=$_POST['unidad']; 
        	$ubicacion=$_POST['ubicacion']; 
        	$partida_pr=$_POST['partida_pr']; 
        	$cantidad= $_POST['cantidad'];

        	$result= pg_query($conn, "SELECT alm.insertar_item('$descripcion','$codigo','$cantidad','$partida_pr','$unidad','$ubicacion');");        	
        	header('location:items.php');      	
        }

        	//editar
	
		if (isset($_POST['edit'])) {
			$id=$_POST['id_item']; 
        	$codigo=$_POST['codigo']; 
        	$descripcion=$_POST['descripcion']; 
        	$unidad=$_POST['unidad']; 
        	$ubicacion=$_POST['ubicacion']; 
        	$partida_pr=$_POST['partida_pr']; 
        	
        	
        	$result= pg_query($conn, "SELECT alm.editar_item('$id','$codigo','$descripcion','$unidad','$ubicacion','$partida_pr');");        	
        	header('location:items.php');      	
        }

        if (isset($_GET['del'])) {
            $id = $_GET['del'];
            $result= pg_query($conn, "SELECT alm.remover_logico_item('$id');");        	
        	header('location:items.php');  
        }
      




	
        


 

?>