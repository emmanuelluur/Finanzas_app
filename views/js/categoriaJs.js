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