<?php
require_once "../content/login.html";
?>

<form id = "auth" name="auth" class="form-signin">

  <h1 class="h3 mb-3 font-weight-normal">Inicio de sesión</h1>
  <label for="inputEmail" class="sr-only">Email</label>
  <input type="email" name = 'mail' id="inputEmail" class="form-control" placeholder="Email" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name = 'password' id="inputPassword" class="form-control" placeholder="Password" required>
  <span id = "responseText"></span>
  <button id = 'loginAuth' class="btn btn-lg btn-primary btn-block" type="button">Sign in</button>
  <p class="mt-5 mb-3 text-muted">&copy; <?php echo DATE('Y'); ?></p>
</form>

<script>
let btn_auth = document.querySelector("#loginAuth");

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
            document.querySelector("#responseText").innerHTML = this.responseText;
            self.location = "usuariosInfo";
            //  form.reset();
        }
    }
    request.send(formData);
});
</script>
<?php
require_once "../content/footer.html";
?>