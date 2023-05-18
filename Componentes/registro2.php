<div class="card">
    <div class="card-header">
        Registrar datos de agentes:
    </div>
    <form class="p-4" method="POST" action="registrar2.php">
        <div class="mb-3">
            <label class="form-label">Nombres: </label>
            <input type="text" class="form-control" name="txtnombres" autofocus required>
        </div>
        <div class="mb-3">
            <label class="form-label">Apellidos: </label>
            <input type="text" class="form-control" name="txtapellidos" autofocus required>
        </div>
        <!-- el primer cambio del registro de datos-->
        <div class="mb-3">
            <label class="form-label">Telefono: </label>
            <input type="number" class="form-control" name="txttelefono" autofocus required>
        </div>
        <div class="mb-3">
            <label class="form-label">Correo: </label>
            <input type="text" class="form-control" name="txtcorreo" autofocus required>
        </div>
        <div class="d-grid">
            <input type="hidden" name="oculto" value="1">
            <input type="submit" class="btn btn-primary" value="Registrar">
        </div>
    </form>
</div>

