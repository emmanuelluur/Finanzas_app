<?php
require_once "../content/header.html";
?>

<div class = "container">
    <hr>
    <h3>Registro de Usuarios</h3>
    <div class = "row">
        <div class = 'col'>
            <form id = 'registraUsuario'>
                <div class = "form-group">
                    <label for="description">Nombre</label>
                    <input type="text" class='form-control' id = 'name' name='name'>
                </div>
                <div class = "form-group">
                    <label for="description">Apellidos</label>
                    <input type="text" class='form-control' id = 'lastname' name='lastname'>
                </div>
                <div class = "form-group">
                    <label for="description">E-mail</label>
                    <input type="email" class='form-control' id = 'mail' name='mail'>
                </div>
                <div class = "form-group">
                    <label for="description">Contraseña</label>
                    <input type="password" class='form-control' id = 'password' name='password'>
                </div>
                <div class = "form-group">
                    <label for="description">Url Imagen</label>
                    <input type="text" class='form-control' id = 'image' name='image'>
                </div>
                
                <span id = 'responseText'></span>
                <button type='button' class='btn btn-success btn-sm btn-block' id = 'saveUsuario' name = 'saveUsuario'> Registrar</button>
            </form>
        </div>
        <div class = 'col-sm-4'></div>
    </div>
</div>
<script src="../views/js/usuarioJs.js"></script>
<script>
saveUser(1);
</script>
<?php
require_once "../content/footer.html";
?>
