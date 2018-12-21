<?php
require_once "../content/header.html";
?>

<div class = "container">
    <hr>
    <h3>Registro de Ingresos</h3>
    <div class = "row">
        <div class = 'col'>
            <form id = 'registraIngresos'>
                <div class = "form-group">
                    <label for="description">Descripción</label>
                    <input type="text" class='form-control' id = 'description' name='description'>
                </div>
                <div class = "form-group">
                    <label for="ticket"># Ticket</label>
                    <input type="number" class='form-control' id = 'ticket' name='ticket'>
                </div>
                <div class = "form-group">
                    <label for="mount">Monto</label>
                    <input type="bumber" step = 'any' class='form-control' id = 'mount' name='mount'>
                </div>
                <span id = 'responseText'></span>
                <button type='button' class='btn btn-success btn-sm btn-block' id = 'saveIngreso' name = 'saveIngreso'> Registrar</button>
            </form>
        </div>
        <div class = 'col'></div>
    </div>
</div>
<script>
let btn_guarda = document.querySelector("#saveIngreso");
    btn_guarda.addEventListener("click", function () {
        let url = "../app/Controller/IngresosController.php";
        let form = document.querySelector("#registraIngresos");
        let formData = new FormData(form);
        formData.append("save", true);
        let request = new XMLHttpRequest();
        request.open('POST', url, true);
        //  request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.querySelector("#responseText").innerHTML = this.responseText;
            }
        }
        request.send(formData);
    });

</script>
<?php
require_once "../content/footer.html";
?>
