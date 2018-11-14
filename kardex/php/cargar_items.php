 <?php 
require_once 'conexion.php';

function getListasRep(){
  $conn = getConn();
  $query = 'SELECT * FROM alm.item';
  $result = pg_query($query)or die('consulta fallida'.pg_last_error());
  $listas = '<option value="0">Elige una opción</option>';
  while($row = pg_fetch_array($result, null, PGSQL_ASSOC)){
    $listas .= "<option value='$row[id_item]'>$row[codigo]  $row[descripcion]</option>";
  }
  return $listas;
}

echo getListasRep();