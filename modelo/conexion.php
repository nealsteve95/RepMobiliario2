<?php 
$contrasena = "AVNS_JoHKvJ-siwLjSK225X1";
$usuario = "doadmin";
$nombre_bd = "defaultdb";
$host = "db-mysql-nyc1-15835-do-user-14090458-0.b.db.ondigitalocean.com";
$port = "25060";

try {
	$bd = new PDO (
		'mysql:host='.$host.';port='.$port.';dbname='.$nombre_bd,
        $usuario,
        $contrasena,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
	);
} catch (Exception $e) {
	echo "Problema con la conexion: ".$e->getMessage();
}
?>