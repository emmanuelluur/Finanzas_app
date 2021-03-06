function Eventos() {
    let url = "../app/Controller/BalanceController.php?getEvents=true";
    let request = new XMLHttpRequest();
    request.open('GET', url, true);
    //  request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            let datos = JSON.parse(this.responseText);
            
            let description;
            let textoDes;
            let monto;
            let montoCan;
            let categoria;
            let categoriaTxt;
            console.log(datos);
            
            //  console.log(datos[0].description);
            for (let i = 0; i < datos.length; i++) {
                description = document.createElement("p");
                textoDes = document.createTextNode(datos[i].descripcion);
                description.appendChild(textoDes);
                monto = document.createElement("p");
                montoCan = document.createTextNode("| $ "+parseFloat(datos[i].monto).toFixed(2));
                monto.appendChild(montoCan);
                categoria = document.createElement("p");
                categoriaTxt = document.createTextNode(datos[i].cate);
                categoria.appendChild(categoriaTxt)
                document.querySelector("#description").appendChild(description);
                document.querySelector("#monto").appendChild(monto);
                document.querySelector("#categoria").appendChild(categoria);
            }


            
        }
    }
    request.send();
}

function Balance() {
    let url = "../app/Controller/BalanceController.php?getBalance=true";
    let request = new XMLHttpRequest();
    request.open('GET', url, true);
    //  request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.querySelector("#balance").innerHTML = this.responseText;
        }
    }
    request.send();
}