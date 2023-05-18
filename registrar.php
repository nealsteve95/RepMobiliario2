<?php
// Este oculto no se a que hace referencia tal vez al id
if (empty($_POST["txtnropartida"]) || empty($_POST["txtdireccion"]) || empty($_POST["txtprecioventa"]) || empty($_POST["txttamaño_cuadrados"]) || empty($_POST["txtnrohabitaciones"]) 
   || empty($_POST["txtnrobaños"]) || empty($_POST["txtfechaconstruccion"]) || empty($_POST["txtcomentario"]) || empty($_POST["txtidagente"]) ) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once("modelo/conexion.php");
$nro_partida = $_POST["txtnropartida"];
$direccion = $_POST["txtdireccion"];
$precio_venta = $_POST["txtprecioventa"];
$tipo_propiedad= $_POST["txttipopropiedad"];
$tamaño_metros_cuadrados=$_POST["txttamaño_cuadrados"];
$nro_habitaciones = $_POST["txtnrohabitaciones"];
$nro_baños = $_POST["txtnrobaños"];
$fecha_construccion =$_POST["txtfechaconstruccion"];
$comentario = $_POST["txtcomentario"];
$id_agente = $_POST["txtidagente"];

$sentencia = $bd->prepare("INSERT INTO registro(nro_partida,direccion,precio_venta,tipo_propiedad,tamaño_metros_cuadrados,nro_habitaciones,nro_baños,fecha_construccion,comentario,id_agente) VALUES (?,?,?,?,?,?,?,?,?,?);");
$resultado = $sentencia->execute([$nro_partida,$direccion,$precio_venta,$tipo_propiedad,$tamaño_metros_cuadrados,$nro_habitaciones,$nro_baños,$fecha_construccion,$comentario,$id_agente]);

if ($resultado === TRUE ){
    header('Location: index.php?mensaje=registrado');
}  else{
    header('Location: index.php?mensaje=error');
   exit();
}
?>

