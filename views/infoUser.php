<?php
require_once "../content/header.html";
?>

<div class = "container">
    <hr>
    <h3>Usuario</h3>
    <div class = "row">
        <div class = 'col-sm-4'>
            <div class="row">
                <div class="col"><div id="image"></div></div>
                <div class="col-sm-4"><p ><span id = 'name'></span></p> </div>
            </div>
            
        </div>
        <div class = 'col'></div>
    </div>
</div>
<script src="../views/js/usuarioJs.js"></script>
<script>
getUsers(1);
</script>
<?php
require_once "../content/footer.html";
?>
