<?php
require_once "../content/header.html";

?>

<div class = "container">
    <hr>
    <h3>Edita:  <span id = 'nombreCompleto'></span></h3>
    <div class = "row" >
        <div class = 'col-sm-2' style = 'text-align:center;'>
            <div id="image"></div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#change">
                Edita Contraseña
            </button>
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
                    Subir Imagen: <input type="file" class = 'form-control' id = 'imageProfile' name = 'imageProfile'>
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
<!-- Modal -->
<div class="modal fade" id="change" tabindex="-1" role="dialog" aria-labelledby="changeLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changeLabel">Cambiar Contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name = "changePassword" id = "changePassword">
            <div class = "form-group">
                <label for="odlPass">Contraseña Actual</label>
                <input type="password" class = 'form-control'  name="actualPassword" id="actualPassword">
            </div>
            <div class = "form-group">
                <label for="odlPass">Contraseña Nueva</label>
                <input type="password" class = 'form-control'  name="nuevoPass" id="nuevoPass">
            </div>
            <div class = "form-group">
                <label for="odlPass">Verifica</label>
                <input type="password" class = 'form-control'  name="verifica" id="verifica">
            </div>
            <span id = "response"></span>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary"  type = "button" id = "changePass">Guardar</button>
      </div>
    </div>
  </div>
</div>
<script src="../views/js/usuarioJs.js"></script>
<script>
getUsersEdit();
editUser();
changePassword();
</script>
<?php
require_once "../content/footer.html";
?>