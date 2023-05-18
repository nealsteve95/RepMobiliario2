<div class="card">
    <div class="card-header">
        Registrar datos de propiedades:
    </div>
    <form class="p-4" method="POST" action="registrar.php">
        <div class="mb-3">
            <label class="form-label">N° de partida: </label>
            <input type="text" class="form-control" name="txtnropartida" autofocus required>
        </div>
        <div class="mb-3">
            <label class="form-label">Dirección: </label>
            <input type="text" class="form-control" name="txtdireccion" autofocus required>
        </div>
        <!-- el primer cambio del registro de datos-->
        <div class="mb-3">
            <label class="form-label">Precio de Venta: </label>
            <input type="number" class="form-control" name="txtprecioventa" autofocus required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo de propiedad: </label>
            <input type="text" class="form-control" name="txttipopropiedad" autofocus required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tamaño M2: </label>
            <input type="number" class="form-control" name="txttamaño_cuadrados" autofocus required>
        </div>
        <!-- Al colocar el number aparece esa barrita para aumentar y quitar-->
        <div class="mb-3">
            <label class="form-label">N° Habitaciones: </label>
            <input type="number" class="form-control" name="txtnrohabitaciones" autofocus required>
        </div>
        <div class="mb-3">
            <label class="form-label">N° Baños: </label>
            <input type="number" class="form-control" name="txtnrobaños" autofocus required>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha construcción: </label>
            <input type="date" class="form-control" name="txtfechaconstruccion" autofocus required>
        </div>
        <div class="mb-3">
            <label class="form-label">Comentario : </label>
            <input type="text" class="form-control" name="txtcomentario" autofocus required>
        </div>
        <!-- SE AGREGO ID AGENTE-->
        <div class="mb-3">
            <label class="form-label">Id Agente : </label>
            <input type="text" class="form-control" name="txtidagente" autofocus required>
        </div>
        <div class="d-grid">
            <input type="hidden" name="oculto" value="1">
            <input type="submit" class="btn btn-primary" value="Registrar">
        </div>
    </form>
</div>