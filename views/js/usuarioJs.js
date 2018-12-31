function getUsers() {
    let url = "../app/Controller/UsuariosController.php?getUser=true";

    let request = new XMLHttpRequest();
    request.open('GET', url, true);
    //  request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {


            console.log(JSON.parse(this.responseText));
            var img = document.createElement('img');
            img.src = JSON.parse(this.responseText)['imagen'];
            img.setAttribute("class", "rounded-circle img-fluid img-thumbnail");

            document.querySelector('#image').appendChild(img);
            document.querySelector('#name').innerHTML = JSON.parse(this.responseText)['nombre'];
            document.querySelector('#lastname').innerHTML = JSON.parse(this.responseText)['appelido'];
            document.querySelector('#mail').innerHTML = JSON.parse(this.responseText)['email'];
            document.querySelector('#balance').innerHTML = JSON.parse(this.responseText)['balance'];
            document.querySelector('#nombreCompleto').innerHTML = JSON.parse(this.responseText)['nombre'] + " " + JSON.parse(this.responseText)['appelido'];

        }
    }
    request.send();
}

function getUsersEdit() {
    let url = "../app/Controller/UsuariosController.php?getUser=true";

    let request = new XMLHttpRequest();
    request.open('GET', url, true);
    //  request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {


            console.log(JSON.parse(this.responseText));
            var img = document.createElement('img');
            img.src = JSON.parse(this.responseText)['imagen'];
            img.setAttribute("class", "rounded-circle img-fluid img-thumbnail");

            document.querySelector('#image').appendChild(img);
            document.querySelector('#name').value = JSON.parse(this.responseText)['nombre'];
            document.querySelector('#lastname').value = JSON.parse(this.responseText)['appelido'];
            document.querySelector('#mail').innerHTML = JSON.parse(this.responseText)['email'];
            document.querySelector('#img').value = JSON.parse(this.responseText)['imagen'];
            document.querySelector('#nombreCompleto').innerHTML = JSON.parse(this.responseText)['nombre'] + " " + JSON.parse(this.responseText)['appelido'];

        }
    }
    request.send();
}

function editUser() {
    let btn_guarda = document.querySelector("#editUser");

    btn_guarda.addEventListener("click", function () {
        let url = "../app/Controller/UsuariosController.php";
        let imageProfile = document.querySelector("#imageProfile");
        let form = document.querySelector("#usuarioEdita");
        let formData = new FormData(form);
        formData.append("editUser", true);
        formData.append("imageProfile", imageProfile.files[0]);
        let request = new XMLHttpRequest();
        request.open('POST', url, true);
        //  request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.querySelector("#responseText").innerHTML = this.responseText;
                //  getUsersEdit();
                location.reload();
            }
        }
        request.send(formData);
    });
}


function changePassword() {
    let btn_guarda = document.querySelector("#changePass");

    btn_guarda.addEventListener("click", function () {
        let url = "../app/Controller/UsuariosController.php";
        let form = document.querySelector("#changePassword");
        let formData = new FormData(form);
        formData.append("newPassword", true);
        let request = new XMLHttpRequest();
        request.open('POST', url, true);
        //  request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.querySelector("#response").innerHTML = this.responseText;
                form.reset(); 
            }
        }
        request.send(formData);
    });
}