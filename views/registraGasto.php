<?php
require_once "../content/header.html";
?>

<div class = "container">
    <hr>
    <h3>Registro de Gastos</h3>
    <div class = "row">
        <div class = 'col-sm-4'>
            <form id = 'registraGastos'>
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
                <button type='button' class='btn btn-success btn-sm btn-block' id = 'saveGasto' name = 'saveGasto'> Registrar</button>
            </form>
        </div>
        <div class = 'col'></div>
    </div>
</div>
<script src="../views/js/gastosJs.js"></script>
<script>
saveGasto(1);
</script>
<?php
require_once "../content/footer.html";
?>
