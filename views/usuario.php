<?php
require_once "../content/header.html";


?>

<div class = "container">
    <hr>
    <h3>Bienvenidio <span id = 'nombreCompleto'></span></h3>
    <div class = "row" >
        <div class = 'col-sm-2' style = 'text-align:center;'>
            <div id="image"></div>
            <p> <h5> <a href="edita-usuario"> Editar </a> </h5> </p>
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
getUsers();
</script>
<?php
require_once "../content/footer.html";
?>
