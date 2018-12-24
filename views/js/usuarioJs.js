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
    request.send( );
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
    request.send( );
}