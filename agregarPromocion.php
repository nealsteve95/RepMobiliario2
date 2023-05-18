<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestion Inmobiliaria</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>


<header>
        <div class="container-fluid bg-5 d-flex justify-content-center py-2">
            <img src="imagenes/img1.png" alt="" height="80px">
        </div>
    </header>



<?php
include_once('modelo/conexion.php');
$codigo = $_GET['codigo'];

// ESTA TABLA SE VINCULA A LA LINEA 62 DEL CODIGO PORQUE PERMITE LLAMAR A ALGUIENE DE OTRA TABLA
$sentencia = $bd->prepare("select * from agentes where id_agente = ?;");
$sentencia->execute([$codigo]);
$agentes = $sentencia->fetch(PDO::FETCH_OBJ);

$sentencia_documentos = $bd->prepare("select * from documentos where id_agente = ?;");
$sentencia_documentos->execute([$codigo]);
$documentos = $sentencia_documentos->fetchAll(PDO::FETCH_OBJ); 

?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <!---Si hay algun problema ver el punto al final-->
                    Enviar documento a : <br><?php echo $agentes->nombres.' '.$agentes->apellidos; ?>
                </div>
                <form class="p-4" method="POST" action="registrarPromocion.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Nombre del Documento: </label>
                        <input type="text" class="form-control" name="txtdocumento" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo de archivo </label>
                        <input type="text" class="form-control" name="txttipoarchivo" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Archivo: </label>
                        <input class="form-control" type="file" name="ImgPromo" >
                    </div>
                    <div class="d-grid">
                    <input type="hidden" name="codigo" value="<?php echo $agentes->id_agente; ?>"><P></P>
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    Lista de Documentos
                </div>
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre del Documento</th>
                                <th scope="col">Tipo de archivo</th>
                                <th scope="col">Imagen</th>
                                <th scope="col" colspan="3">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($documentos as $dato) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->id_documento; ?></td>
                                    <td><?php echo $dato->nombre_documento; ?></td>
                                    <td><?php echo $dato->tipo_documento; ?></td>
                                    <td><img width="30px" height="30px" src="data:image/jpeg;base64,<?php echo base64_encode($dato->imagen); ?>" alt="Imagen de promoción"></td>
                                    <!---Si hay algun problema ver el punto al final-->
                                    <td><a class="text-primary" href="enviarMensaje.php?codigo=<?php echo $dato->id_agente; ?>"><i class="bi bi-cursor"></i></a></td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>