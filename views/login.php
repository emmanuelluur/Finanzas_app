<?php
require_once "../content/login.html";
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Finanzas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">


            </ul>
            <form class="form-inline my-2 my-lg-0" id = "auth" name="auth" >
                <label class = 'nota mr-sm-2'> Ya tienes cuenta? Inicia sesión</label>
                <input type="email" name = 'mail' id="inputEmail" class="form-control mr-sm-2" placeholder="Email" required autofocus>
                <input type="password" name = 'password' id="inputPassword" class="form-control mr-sm-2" placeholder="Password" required>
                <button id = 'loginAuth' class="btn btn-primary my-2 my-sm-0" type="button">Sign in</button>

            </form>
        </div>
    </nav>

    <div class = "container">
    <hr>
    <h3>Nuevos Usuarios</h3>
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
                

                <span id = 'responseText'></span>
                <button type='button' class='btn btn-success btn-sm btn-block' id = 'saveUsuario' name = 'saveUsuario'> Registrar</button>
            </form>
        </div>
        <div class = 'col-sm-4'></div>
    </div>
</div>



<script>
var btn_auth = document.querySelector("#loginAuth");

btn_auth.addEventListener("click", function () {
    let url = "../app/Controller/authController.php";
    let form = document.querySelector("#auth");
    let formData = new FormData(form);
    formData.append("loginAuth", true);

    let request = new XMLHttpRequest();
    request.open('POST', url, true);
    //  request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            //  document.querySelector("#responseText").innerHTML = this.responseText;
            self.location = "usuario";
            //form.reset();
        }
    }
    request.send(formData);
});

var btn_guarda = document.querySelector("#saveUsuario");

btn_guarda.addEventListener("click", function () {
    let url = "../app/Controller/UsuariosController.php";
    let form = document.querySelector("#registraUsuario");
    let formData = new FormData(form);
    formData.append("save", true);
    let request = new XMLHttpRequest();
    request.open('POST', url, true);
    //  request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.querySelector("#responseText").innerHTML = this.responseText;
            form.reset();
        }
    }
    request.send(formData);
});
</script>
<?php
require_once "../content/footer.html";
?>