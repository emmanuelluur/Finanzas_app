function saveCategoria() {
    let btn_guarda = document.querySelector("#saveCategoria");

    btn_guarda.addEventListener("click", function () {
        let url = "../app/Controller/CategoriasController.php";
        let form = document.querySelector("#registraCategoria");
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
}

function ListaCategorias() {
    let url = "../app/Controller/CategoriasController.php?getCategoria=true";
    let request = new XMLHttpRequest();
    request.open('GET', url, true);
    //  request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            let select = document.querySelector("#categoria");
            let datos = JSON.parse(this.responseText);
            for (let i = 0; i < datos.length; i++)
            {
                let opt = document.createElement ("option");
                let opt_txt = document.createTextNode(datos[i].categoria);
                opt.appendChild(opt_txt);
                opt.setAttribute("value",datos[i].id);
                select.appendChild(opt);
            }
              
        }
    }
    request.send();
}