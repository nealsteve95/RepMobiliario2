<?php include "Componentes/cabecera.php" ?>
<?php
    include("modelo/conexion.php");
    $sentencia = $bd->query("select * from registro");
    $registro = $sentencia->fetchAll(PDO::FETCH_OBJ);
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
    </div>
<div class="d-flex justify-content-start align-items-center fuente-2 fw-bold">

    <div class="mx-2">
        <button type="button" class="btn bg-success text-white fw-bold fs-4"
            data-bs-toggle="modal" data-bs-target="#exampleModal">
            <span class="align-middle">Registrar Propiedad</span>
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white fuente-Bebas fs-5">
                        <h1 class="modal-title" id="exampleModalLabel">REGISTRO</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body fuente-Roboto bg-dark">
                        <?php
                        include('Componentes/registro.php');
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

    <div class="mx-2">
        <a class="btn bg-5 text-white fw-bold fs-4" href="propiedades.php" role="button"
            aria-controls="offcanvasExample">
            Propiedades
        </a>
    </div>
    <div class="mx-2">
        <a class="btn bg-5 text-white fw-bold fs-4" href="index2.php" role="button" aria-controls="offcanvasExample">
            Agentes
        </a>
    </div>
    <div class="mx-2">
        <a class="btn bg-5 text-white fw-bold fs-4" href="index.php" role="button" aria-controls="offcanvasExample">
            Inicio
        </a>
    </div>
</div>
</div>

<!-- BOTON REGISTRAR -->

</header>

<div class="container my-4 py-4">
        <div class="card border-warning border-4 fuente-Roboto">
            <div class="table-responsive align-middle text-center">
                <h2 class="card-header p-2 text-center bg-dark text-warning fw-bold">LISTA PROPIEDADES</h2>

                <table class="table table-striped table-hover table-sm">
                    <thead class="bg-warning">
                        <tr class="border-top-0 border-end-0 border-start-0 border-dark border-4"">
                            <th scope="col">#id</th>
                            <th scope="col">nro_partida</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Precio </th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Tamaño</th>
                            <th scope="col">N° habitaciones</th>
                            <th scope="col">N° baños</th>
                            <th scope="col">Fecha construcción</th>
                            <th scope="col">Comentario</th>
                            <th scope="col">Id_Agente</th>
                            <th scope="col" colspan="2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="border-0">
                        <?php
                        foreach ($registro as $dato) {
                            ?>
                        <tbody>
                            <tr>
                                <td scope="row">
                                    <?php echo $dato->id; ?>
                                </td>
                                <td>
                                    <?php echo $dato->nro_partida; ?>
                                </td>
                                <td>
                                    <?php echo $dato->direccion; ?>
                                </td>
                                <td>
                                    <?php echo $dato->precio_venta; ?>
                                </td>
                                <td>
                                    <?php echo $dato->tipo_propiedad; ?>
                                </td>
                                <td>
                                    <?php echo $dato->tamaño_metros_cuadrados; ?>
                                </td>
                                <td>
                                    <?php echo $dato->nro_habitaciones; ?>
                                </td>
                                <td>
                                    <?php echo $dato->nro_baños; ?>
                                </td>
                                <td>
                                    <?php echo $dato->fecha_construccion; ?>
                                </td>
                                <td>
                                    <?php echo $dato->comentario; ?>
                                </td>
                                <!-- PRIMER CAMBIO LAB07-->
                                <td>
                                    <?php echo $dato->id_agente; ?>
                                </td>
                                <!-- La razon por la que imprime no se cambiar la referencia es porque tiene el mismo nombre de nuestros archivos-->
                                <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->id; ?>"><i
                                            class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger"
                                        href="eliminar.php?id=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
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

<?php include "Componentes/piedepagina.php" ?>