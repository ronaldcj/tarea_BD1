<?php
	include('conexion.php');


        if (isset($_POST['save'])) {
        	$usuario=$_POST['usuario']; 
        	$clave=$_POST['clave']; 
        	$nombres=$_POST['nombres']; 
        	$paterno=$_POST['paterno']; 
        	$materno=$_POST['materno']; 
        	$obs= $_POST['obs'];

        	$result= pg_query($conn, "SELECT alm.insertar_usuario('$usuario','$clave','$nombres','$paterno','$materno','$obs',1);");        	
        	header('location:usuarios.php');      	
        }

        	//editar
	
		if (isset($_POST['edit'])) {
            $id=$_POST['id_usuario']; 
			$usuario=$_POST['usuario']; 
            $clave=$_POST['clave']; 
            $nombres=$_POST['nombres']; 
            $paterno=$_POST['paterno']; 
            $materno=$_POST['materno']; 
            $obs= $_POST['obs'];
        	
        	
        	$result= pg_query($conn, "SELECT alm.editar_usuarios('$id','$usuario','$clave','$nombres','$paterno','$materno','$obs');");        	
        	header('location:usuarios.php');      	
        }

        if (isset($_GET['del'])) {
            $id = $_GET['del'];
            $result= pg_query($conn, "SELECT alm.remover_logico_usuarios('$id');");        	
        	header('location:usuarios.php');  
        }
      




	
        


 

?>