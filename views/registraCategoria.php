<?php
require_once "../content/header.html";
?>

<div class = "container">
    <hr>
    <h3>Registra Categoría</h3>
    <div class = "row">
        <div class = 'col-sm-4'>
            <form id = 'registraCategoria'>
                <hr>
                <div class = "form-group">
                    <label for="description">Categoría</label>
                    <input type="text" class='form-control' id = 'description' name='description'>
                </div>
                <hr>
                <span id = 'responseText'></span>
                <button type='button' class='btn btn-success btn-sm btn-block' id = 'saveCategoria' name = 'saveCategoria'> Registrar</button>
            </form>
        </div>
        <div class = 'col'></div>
    </div>
</div>
<script src="../views/js/categoriaJs.js"></script>
<script>
    saveCategoria();
</script>
<?php
require_once "../content/footer.html";
?>
