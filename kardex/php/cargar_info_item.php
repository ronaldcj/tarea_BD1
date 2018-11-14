<?php 
require_once 'conexion.php'; 

function getVideos(){
 
  $conn = getConn();
  $id = $_POST['id'];
  
  $query = "SELECT * FROM alm.item where id_item = $id ";
  $result = pg_query($query)or die('consulta fallida'.pg_last_error());

  $record =pg_fetch_array($result);
					//atributos del item
    $id_item = $id;
		$descripcion = $record['descripcion'];
		$codigo = $record['codigo'];
    $unidad = $record['unidad'];
    //valor unitario o partida presupuestaria 
    $vu_pp = $record['partida_presup'];
		

	$array_item = [$id_item,$codigo,$descripcion,$unidad,$vu_pp];

  
  return json_encode($array_item);
}

echo getVideos();
