<?php
//print_r($_POST);
if (empty($_POST["txtdocumento"]) || empty($_POST["txttipoarchivo"]) || empty($_FILES["ImgPromo"]["name"]) || $_FILES["ImgPromo"]["error"] != 0)  {
    header('Location: index2.php');
    exit();
}

include_once ('modelo/conexion.php');
$nombre_documento = $_POST["txtdocumento"];
$tipo_documento = $_POST["txttipoarchivo"];
$codigo = $_POST["codigo"];
$img_name = $_FILES["ImgPromo"]["name"];
$img_tmpname = $_FILES["ImgPromo"]["tmp_name"];
$img_bytes = file_get_contents($img_tmpname);

$sentencia = $bd->prepare("INSERT INTO documentos(nombre_documento,tipo_documento,id_agente,imagen, img_name) VALUES (?,?,?,?,?);");
$resultado = $sentencia->execute([$nombre_documento,$tipo_documento, $codigo, $img_bytes, $img_name ]);

if ($resultado === TRUE) {
    header('Location: agregarPromocion.php?codigo='.$codigo);
}
