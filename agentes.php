<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css" />
    <title>Document</title>
</head>

<body class="bg-dark">

    <?php
        include("modelo/conexion.php");
        $sentencia = $bd->query("select * from agentes");
        $agentes = $sentencia->fetchAll(PDO::FETCH_OBJ);
        ?>

        <!-- MENSAJES DE ESTADO -->
        <div class="text-center py-2">
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="align-middle"><strong>Error!</strong> Rellena todos los campos.</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
            }
            ?>
            <!-- Para el mensaje de error -->

            <!-- Cuando se registraron los datos -->
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="align-middle"><strong>Registrado!</strong> Se agregaron los datos.</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
            }
            ?>
            <!-- Cuando se registraron los datos -->


            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="align-middle"><strong>Error!</strong> No se agregaron los datos.</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
            }
            ?>

            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="align-middle"><strong>Editado!</strong> Se actualizaron los datos.</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
            }
            ?>

            <!-- habria que evaluar el condicional -->
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <span class="align-middle"><strong>Eliminado!</strong> Se eliminaron los datos.</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
            }
            ?>

    <header>
            <div class="px-3 py-2 bg-warning bg-gradient d-flex justify-content-around">
                <!-- ICONO NOMBRE -->
                <div class="d-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor"
                        class="bi bi-house-gear-fill" viewBox="0 0 16 16">
                        <path
                            d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5Z" />
                        <path
                            d="M11.07 9.047a1.5 1.5 0 0 0-1.742.26l-.02.021a1.5 1.5 0 0 0-.261 1.742 1.5 1.5 0 0 0 0 2.86 1.504 1.504 0 0 0-.12 1.07H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6 4.724 4.724a1.5 1.5 0 0 0-1.654 1.03Z" />
                        <path
                            d="m13.158 9.608-.043-.148c-.181-.613-1.049-.613-1.23 0l-.043.148a.64.64 0 0 1-.921.382l-.136-.074c-.561-.306-1.175.308-.87.869l.075.136a.64.64 0 0 1-.382.92l-.148.045c-.613.18-.613 1.048 0 1.229l.148.043a.64.64 0 0 1 .382.921l-.074.136c-.306.561.308 1.175.869.87l.136-.075a.64.64 0 0 1 .92.382l.045.149c.18.612 1.048.612 1.229 0l.043-.15a.64.64 0 0 1 .921-.38l.136.074c.561.305 1.175-.309.87-.87l-.075-.136a.64.64 0 0 1 .382-.92l.149-.044c.612-.181.612-1.049 0-1.23l-.15-.043a.64.64 0 0 1-.38-.921l.074-.136c.305-.561-.309-1.175-.87-.87l-.136.075a.64.64 0 0 1-.92-.382ZM12.5 14a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Z" />
                    </svg>
                    <span class="align-middle ms-3 fuente-Bebas fs-1">REGISTRO AGENTES</span>
                </div>
                <!-- FIN ICO/NOMBRE -->

                <!-- BOTON REGISTRAR -->
                <div class="d-flex">
                    <button type="button" class="btn btn-success fuente-Bebas fs-2 align-middle mb-0 rounded-4" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <span class="align-middle">REGISTRAR AGENTE</span>
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-success text-white fuente-Bebas fs-5">
                                    <h1 class="modal-title" id="exampleModalLabel">REGISTRO</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body fuente-Roboto bg-dark">
                                    <?php
                                    include('Componentes/registro2.php');
                                    ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIN BOTON REGISTRAR -->
            </div>
        </header>
            <!-- TABLA -->

        <div class="container my-4 py-4">
            <div class="card border-warning border-4 fuente-Roboto">
                <div class="table-responsive align-middle text-center">
                    <h2 class="card-header p-2 text-center bg-dark text-warning fw-bold">LISTA DE AGENTES</h2>

                    <table class="table table-striped table-hover table-sm">
                        <thead class="bg-warning">
                            <tr class="border-top-0 border-end-0 border-start-0 border-dark border-4"">
                                <th scope="col">#id_agente</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Correo</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody class="border-0">
                            <?php
                            foreach ($agentes as $dato) {
                                ?>
                            <tbody>
                                <tr>
                                    <td scope="row">
                                        <?php echo $dato->id_agente; ?>
                                    </td>
                                    <td>
                                        <?php echo $dato->nombres; ?>
                                    </td>
                                    <td>
                                        <?php echo $dato->apellidos; ?>
                                    </td>
                                    <td>
                                        <?php echo $dato->telefono; ?>
                                    </td>
                                    <td>
                                        <?php echo $dato->correo; ?>
                                    </td>
                                    <!-- La razon por la que imprime no se cambiar la referencia es porque tiene el mismo nombre de nuestros archivos-->
                                    <td><a class="text-success" href="editar2.php?codigo=<?php echo $dato->id_agente; ?>"><i
                                                class="bi bi-pencil-square"></i></a></td>
                                    <td><a class="text-success" href="agregarPromocion.php?codigo=<?php echo $dato->id_agente; ?>"><i 
                                                class="bi bi-cart3"></i></a></td>
                                    <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger"
                                            href="eliminar2.php?id_agente=<?php echo $dato->id_agente; ?>"><i class="bi bi-trash"></i></a></td>
                                </tr>
                            </tbody>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

</body>