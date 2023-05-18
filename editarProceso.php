<?php
    print_r($_POST);
    if (!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include('modelo/conexion.php');
    $codigo = $_POST['codigo'];
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
    
    $sentencia = $bd->prepare("UPDATE registro SET nro_partida=?, direccion = ?, precio_venta = ?, tipo_propiedad = ?,tamaño_metros_cuadrados = ?,nro_habitaciones = ?,nro_baños = ?,fecha_construccion = ?,comentario = ?,id_agente = ? where id = ?;");
    $resultado = $sentencia->execute([$nro_partida,$direccion,$precio_venta,$tipo_propiedad,$tamaño_metros_cuadrados,$nro_habitaciones,$nro_baños,$fecha_construccion,$comentario,$id_agente,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=Cambio hecho');
    } else {
        header('Location: index.php?mensaje=Error');
        exit();
    }

?>