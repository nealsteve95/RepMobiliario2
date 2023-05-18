<?php

if (empty($_POST["txtnombres"]) || empty($_POST["txtapellidos"]) || empty($_POST["txttelefono"]) || empty($_POST["txtcorreo"])) {
    header('Location: index2.php?mensaje=falta');
    exit();
}

include_once("modelo/conexion.php");
$nombres = $_POST["txtnombres"];
$apellidos = $_POST["txtapellidos"];
$telefono = $_POST["txttelefono"];
$correo= $_POST["txtcorreo"];

$sentencia = $bd->prepare("INSERT INTO agentes(nombres,apellidos,telefono,correo) VALUES (?,?,?,?);");
$resultado = $sentencia->execute([$nombres,$apellidos,$telefono,$correo]);

if ($resultado === TRUE ){
    header('Location: index2.php?mensaje=registrado');
}  else{
    header('Location: index2.php?mensaje=error');
   exit();
}

?>