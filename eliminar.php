<?php
// Yo elimino por numero de partida para buscar
    if (!isset($_GET['id'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include("modelo/conexion.php");
    $codigo = $_GET['id'];

    $sentencia = $bd->prepare("DELETE FROM registro where id = ?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE){
        header ('Location: index.php?mensaje=Borrado');
    } else{
        header('Location: index.php?mensaje=Error');
    }
?>