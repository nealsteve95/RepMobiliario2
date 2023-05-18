<?php
    print_r($_POST);
    if (!isset($_POST['codigo'])){
        header('Location: index2.php?mensaje=error');
    }

    include('modelo/conexion.php');
    $codigo = $_POST['codigo'];
    $nombres = $_POST["txtnombres"];
    $apellidos = $_POST["txtapellidos"];
    $telefono = $_POST["txttelefono"];
    $correo= $_POST["txtcorreo"];
    
    $sentencia = $bd->prepare("UPDATE agentes SET nombres=?, apellidos = ?, telefono = ?, correo = ? where id_agente = ?;");
    $resultado = $sentencia->execute([$nombres,$apellidos,$telefono,$correo,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index2.php?mensaje=Cambio hecho');
    } else {
        header('Location: index2.php?mensaje=Error');
        exit();
    }

?>