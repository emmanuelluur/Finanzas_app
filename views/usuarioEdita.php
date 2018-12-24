<?php
require_once "../content/header.html";


?>

<div class = "container">
    <hr>
    <h3>Edita:  <span id = 'nombreCompleto'></span></h3>
    <div class = "row" >
        <div class = 'col-sm-2' style = 'text-align:center;'>
            <div id="image"></div>
        </div>
        <div class = 'col'>
            <form name = 'usuarioEdita' id = 'usuarioEdita'>
                <div class = 'form-group'>
                    Nombre: <input type="text" class = 'form-control' id = 'name' name = 'name'>
                </div>
                <div class = 'form-group'>
                    Apellidos: <input type="text" class = 'form-control' id = 'lastname' name = 'lastname'>
                </div>
                <div class = 'form-group'>
                    URL imagen: <input type="text" class = 'form-control' id = 'img' name = 'image'>
                </div>
                <div class = 'form-group'>
                    Email: <span id = 'mail'></span>
                </div>
                <button type='button' class = 'btn btn-primary btn-sm' id = 'editUser'>Guardar</button>
                <strong><a href="usuario"> Regresar </a></strong>
            </form>
            
        </div>
    </div>
</div>
<script src="../views/js/usuarioJs.js"></script>
<script>
getUsersEdit();
</script>
<?php
require_once "../content/footer.html";
?>