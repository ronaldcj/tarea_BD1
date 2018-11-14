<?php
  include('conexion.php');

        if (isset($_POST['enviar_ingreso'])) {
          $conn = getConn();
          $id_item=$_POST['id_item'];
          $codigo=$_POST['codigo']; 
          $cantidad=$_POST['cantidad']; 
          $valor_unitario=$_POST['vu']; 
          $unidad=$_POST['unidad'];          
          $descripcion= $_POST['descripcion'];
          $solicitante= $_POST['solicitante'];
            
            $result= pg_query($conn, "SELECT alm.ingreso_nota('$solicitante');");  

          
          
          for ($i=0; $i < sizeof($codigo); $i++) { 
            
              $result= pg_query($conn, "SELECT alm.kardex_ingreso('$id_item[$i]','$codigo[$i]','$cantidad[$i]','$valor_unitario[$i]','$descripcion[$i]','$unidad[$i]');");  
          }

          header('location:../kardexIngreso.php'); 
        }


        if (isset($_POST['enviar_salida'])) {
          $conn = getConn();
          $id_item=$_POST['id_item'];
          $codigo=$_POST['codigo']; 
          $cantidad=$_POST['cantidad']; 
          $valor_unitario=$_POST['vu']; 
          $importe=$_POST['importe']; 
          $unidad=$_POST['unidad'];          
          $descripcion= $_POST['descripcion'];
          $solicitante= $_POST['solicitante'];
            
            $result= pg_query($conn, "SELECT alm.salida_nota('$solicitante');");  

          
          
          for ($i=0; $i < sizeof($codigo); $i++) { 
            
              $result= pg_query($conn, "SELECT alm.kardex_salida('$id_item[$i]','$codigo[$i]','$cantidad[$i]','$valor_unitario[$i]','$descripcion[$i]','$unidad[$i]');");  
          }

          header('location:../kardexSalida.php'); 
        }


?>
					
					

