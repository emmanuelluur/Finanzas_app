<?php
require_once "../content/header.html";
?>

<div class = "container">
    <hr>
    <h3>Usuario</h3>
    <div class = "row">
        <div class = 'col-sm-2'>
            <div id="image"></div>
        </div>
        <div class = 'col'>
            <p>Nombre: <span id = 'name'></span></p> 
            <p>Apellidos: <span id = 'lastname'></span></p> 
            <p>Email: <span id = 'mail'></span></p> 
            <p>Balance: $ <span id = 'balance'></span></p> 
        </div>
    </div>
</div>
<script src="../views/js/usuarioJs.js"></script>
<script>
getUsers(1);
</script>
<?php
require_once "../content/footer.html";
?>
