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

<body class="bg-dark">

<?php
    if(!isset($_GET['codigo'])){
        header('Location: propiedades.php?mensaje=error');
        exit();
    }

    include_once ('modelo/conexion.php');
    // 
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from registro where id = ?;");
    $sentencia->execute([$codigo]);
    $registro = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>
    <header>
        <div class="d-flex bg-5 justify-content-center">
            <div>
                <img src="imagenes/img1.png" alt="" height="80px" class="my-3">
            </div>
        </div>
    </header>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar registro:
                </div>

                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">N° de partida: </label>
                        <input type="text" class="form-control" name="txtnropartida" required 
                        value="<?php echo $registro->nro_partida; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dirección: </label>
                        <input type="text" class="form-control" name="txtdireccion" autofocus required
                        value="<?php echo $registro->direccion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio de Venta: </label>
                        <input type="number" class="form-control" name="txtprecioventa" autofocus required
                        value="<?php echo $registro->precio_venta; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo de Propiedad: </label>
                        <input type="text" class="form-control" name="txttipopropiedad" autofocus required
                        value="<?php echo $registro->tipo_propiedad; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tamaño M2: </label>
                        <input type="number" class="form-control" name="txttamaño_cuadrados" autofocus required
                        value="<?php echo $registro->tamaño_metros_cuadrados; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">N° de habitaciones : </label>
                        <input type="number" class="form-control" name="txtnrohabitaciones" autofocus required
                        value="<?php echo $registro->nro_habitaciones; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">N° de baños: </label>
                        <input type="number" class="form-control" name="txtnrobaños" autofocus required
                        value="<?php echo $registro->nro_baños; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de construccion: </label>
                        <input type="date" class="form-control" name="txtfechaconstruccion" autofocus required
                        value="<?php echo $registro->fecha_construccion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Comentario: </label>
                        <input type="text" class="form-control" name="txtcomentario" autofocus required
                        value="<?php echo $registro->comentario; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Id Agente </label>
                        <input type="text" class="form-control" name="txtidagente" autofocus required
                        value="<?php echo $registro->nombre_agente_inmo; ?>">
                    </div>
                    <!-- El id en el q guarda la variable-->
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $registro->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>