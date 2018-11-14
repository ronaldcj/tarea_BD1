<?php 
function getConn(){
/*  $mysqli = mysqli_connect('localhost', 'root', '', "tutoriales");
  if (mysqli_connect_errno($mysqli))
    echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
  $mysqli->set_charset('utf8');
  return $mysqli;*/
 
    $host="localhost";
    $port="5432";
    $username="postgres";
    $password="root";
    $dbname="ejemplo";

//esto no se cambia

    $conn = pg_connect("host=$host dbname=$dbname user=$username password=$password") or die ("no se pudo conectar a la base de datos");


    if ($conn) {
       //echo "se conecto a la base de datos";
    }
    return $conn;
    //pg_close($conn);

}