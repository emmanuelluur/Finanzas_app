<?php
require_once "../content/header.html";
?>

<div class = "container">
    <hr>
    <h3>Registro de Ingresos</h3>
    <div class = "row">
        <div class = 'col-sm-4'>
            <form id = 'registraIngresos'>
                <div class = "form-group">
                    <label for="description">Descripción</label>
                    <input type="text" class='form-control' id = 'description' name='description'>
                </div>
                <div class = "form-group">
                    <label for="ticket"># Ticket</label>
                    <input type="text" class='form-control' id = 'ticket' name='ticket'>
                </div>
                <div class = "form-group">
                    <label for="mount">Monto</label>
                    <input type="bumber" step = 'any' class='form-control' id = 'mount' name='mount'>
                </div>
                <span id = 'responseText'></span>
                <button type='button' class='btn btn-success btn-sm btn-block' id = 'saveIngreso' name = 'saveIngreso'> Registrar</button>
            </form>
        </div>
        <div class = 'col'></div>
    </div>
</div>
<script src="../views/js/ingresosJs.js"></script>
<script>
saveIngreso();
</script>
<?php
require_once "../content/footer.html";
?>
