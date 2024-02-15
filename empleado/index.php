<?php
require_once '../frontend/cabecera.php';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistema de caja Demo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="row p-0 m-0 pe-3 ps-3 pt-2 contenedor">
        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 mb-2">
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
                        <button class="btn bg-celeste text-light fw-bold h-total w-100" id="btnD">Desayunos</button>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 p-2">
                        <button class="btn bg-azul text-light fw-bold h-total w-100" id="btnA">Almuerzos</button>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 p-2">
                        <button class="btn bg-gris text-light fw-bold h-total w-100" id="btnS">Sandwishes</button>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 p-2">
                        <button class="btn bg-lila text-light fw-bold h-total w-100" id="btnJ">Jugos</button>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 p-2">
                        <button class="btn bg-rosa text-light fw-bold h-total w-100" id="btnB">Bebidas</button>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 p-2">
                        <button class="btn btn-warning fw-bold h-total w-100" id="btnE">Extras</button>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="resumen col-sm-12 col-md-4 col-lg-4 col-xl-4 pt-3 pb-3">
            <div id="carrito"></div>
        </div>
    </div>

<?php
require_once '../frontend/footer.php';
?>
    <script src="../assets/js/platos.js"></script>
</body>

</html>