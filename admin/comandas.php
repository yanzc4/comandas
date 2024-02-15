<?php
$cabecera = "Comandas";
require_once '../frontend/cabecera.php';
$user_agent = $_SERVER["HTTP_USER_AGENT"];
if (preg_match("/(android|webos|avantgo|iphone|ipod|ipad|bolt|boost|cricket|docomo|fone|hiptop|opera mini|mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $user_agent)) {
    require_once "../frontend/header.php";
}
?>

<div class="row p-0 m-0 pe-3 ps-3 pt-2 contenedor">
    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 mb-2">
        <div class="d-flex mt-2">
            <div class="col">
                <input oninput="buscar_ahora($('#buscar_1').val(), categorias);" type="text" class="form-control" id="buscar_1" name="buscar_1" placeholder="Buscar Plato">
            </div>
            <div class="col-auto ms-2">
                <a class="btn btn-secondary">
                    <i class="bi bi-search"></i>
                </a>
            </div>
        </div>
        <input id="token" value="<?php echo $token; ?>" type="hidden">
        <div class="platos w-100 pt-2 pe-3 ps-3">
            <div class="row" id="platos">

            </div>
        </div>

        <div class="categorias w-100 pe-3 ps-3">
            <div class="row h-total">
                <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 p-2">
                    <button class="btn bg-celeste text-light fw-bold h-total w-100 text-truncate" id="btnD">Desayunos</button>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 p-2">
                    <button class="btn bg-azul text-light fw-bold h-total w-100 text-truncate" id="btnA">Almuerzos</button>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 p-2">
                    <button class="btn bg-gris text-light fw-bold h-total w-100 text-truncate" id="btnS">Sandwishes</button>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 p-2">
                    <button class="btn bg-lila text-light fw-bold h-total w-100 text-truncate" id="btnJ">Jugos</button>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 p-2">
                    <button class="btn bg-rosa text-light fw-bold h-total w-100 text-truncate" id="btnB">Bebidas</button>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 p-2">
                    <button class="btn btn-warning fw-bold h-total w-100 text-truncate" id="btnE">Extras</button>
                </div>
            </div>

        </div>
    </div>
    <div class="resumen col-sm-12 col-md-12 col-lg-4 col-xl-4 pt-3 pb-3">
        <div id="carrito"></div>
    </div>
</div>

<?php
require_once '../frontend/footer.php';
?>
    <script src="../assets/js/platos.js"></script>
</body>

</html>