
function saveIngreso(id_user){
    let btn_guarda = document.querySelector("#saveIngreso");

    btn_guarda.addEventListener("click", function () {
        let url = "../app/Controller/IngresosController.php";
        let form = document.querySelector("#registraIngresos");
        let formData = new FormData(form);
        formData.append("save", true);
        formData.append("idUser", id_user);
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
