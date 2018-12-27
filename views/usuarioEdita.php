<?php
require_once "../content/header.html";


?>

<div class = "container">
    <hr>
    <h3>Edita:  <span id = 'nombreCompleto'></span></h3>
    <div class = "row" >
        <div class = 'col-sm-2' style = 'text-align:center;'>
            <div id="image"></div>
            <!-- form for change password -->
            <div class = 'btn-group'>
                <button type="button" class="btn btn-info">Edita contraseña</button>
                <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
               
                    <form class="dropdown-menu p-3">
                        <div class = "form-group">
                            <label for="odlPass">Contraseña Actual</label>
                            <input type="password"  name="actualPassword" id="actualPassword">
                        </div>
                        <div class = "form-group">
                            <label for="odlPass">Contraseña Nueva</label>
                            <input type="password"  name="nuevoPass" id="nuevoPass">
                        </div>
                        <div class = "form-group">
                            <label for="odlPass">Verifica</label>
                            <input type="password"  name="verifica" id="verifica">
                        </div>
                        <button type = "button" class = "btn btn-success btn-sm btn-block">Guarda</button>
                    </form>
                
            </div>
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
                <span id = 'responseText'></span>
                <button type='button' class = 'btn btn-primary btn-sm' id = 'editUser'>Guardar</button>
                <strong><a href="usuario"> Regresar </a></strong>
            </form>
            
        </div>
    </div>
</div>
<script src="../views/js/usuarioJs.js"></script>
<script>
getUsersEdit();
editUser();
</script>
<?php
require_once "../content/footer.html";
?>