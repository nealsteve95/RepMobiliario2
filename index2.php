<?php include "Componentes/cabecera.php" ?>
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
</div>
<div class="d-flex justify-content-start align-items-center fuente-2 fw-bold">

    <div class="mx-2">
        <button type="button" class="btn bg-success text-white fw-bold fs-4" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            <span class="align-middle">Registrar Agente</span>
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
                                <th scope=" col">#id_agente</th>
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
                            <td><a class="text-success"
                                    href="agregarPromocion.php?codigo=<?php echo $dato->id_agente; ?>"><i
                                        class="bi bi-cart3"></i></a></td>
                            <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger"
                                    href="eliminar2.php?id_agente=<?php echo $dato->id_agente; ?>"><i
                                        class="bi bi-trash"></i></a></td>
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