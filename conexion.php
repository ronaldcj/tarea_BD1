<?php
    $host="localhost";
    $port="5432";
    $username="postgres";
    $password="root";
    $dbname="ejemplo";

//esto no se cambia

    $conn=pg_connect("host=$host dbname=$dbname user=$username password=$password") or die ("no se pudo conectar a la base de datos");


    if ($conn) {
       // echo "se conecto a la base de datos";
    }

   // pg_close($conn);
?>