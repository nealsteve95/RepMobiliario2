<?php
// Yo elimino por numero de partida para buscar
    if (!isset($_GET['id_agente'])){
        header('Location: index2.php?mensaje=error');
        exit();
    }

    include("modelo/conexion.php");
    $codigo = $_GET['id_agente'];

    $sentencia = $bd->prepare("DELETE FROM agentes where id_agente = ?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE){
        header ('Location: index2.php?mensaje=Borrado');
    } else{
        header('Location: index2.php?mensaje=Error');
    }
?>