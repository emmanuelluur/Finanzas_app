<?php
require_once "../content/header.html";
?>
<div class = "container">
    <hr>
    <h3>Inicio</h3>
    <div class = "row">
        <div class = 'col-sm-4'>
            <div class="card text-white bg-secondary mb-6">
                <div class="card-header">Balance</div>
                <div class="card-body">
                    <h5 class="card-title">$ <span id = 'balance'></span></h5>
                    
                </div>
            </div>
        </div>
        <div class = 'col-sm-2'></div>
        <div class = 'col'>
            <div class = 'card text-white bg-secondary mb-6'>
                <div class='card-header'>Ultimos 10 eventos</div>
                <div class = 'card-body'>
                <div class = 'row'>
                        <div class = 'col-sm-4'>Descripción <hr></div>
                        <div class = 'col-sm-4'>Monto <hr></div>
                        <div class = 'col-sm-4'>Categoria <hr></div>
                    </div>
                    <div class = 'row'>
                        <div class = 'col-sm-4'> <span id = 'description'></span></div>
                        <div class = 'col-sm-4'> <span id = 'monto'></span></div>
                        <div class = 'col-sm-4'> <span id = 'categoria'></span></div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../views/js/balance.js"></script>
<script>
Eventos();
Balance();
</script>
<?php
require_once "../content/footer.html";
?>