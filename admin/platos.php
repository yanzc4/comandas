<?php
$cabecera = "Crud Platos";
require_once '../frontend/cabecera.php';
$user_agent = $_SERVER["HTTP_USER_AGENT"];
if (preg_match("/(android|webos|avantgo|iphone|ipod|ipad|bolt|boost|cricket|docomo|fone|hiptop|opera mini|mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $user_agent)) {
    require_once "../frontend/header.php";
}
?>

<div class="container">
    <div class="sticky-top pb-2 pt-3 bg-primer">
        <h3>Registro de menu</h3>
        <div class="d-flex mt-2">
            <div class="col">
                <input oninput="buscar_ahora($('#buscar_1').val());" type="text" class="form-control" id="buscar_1" name="buscar_1" placeholder="Buscar Plato">
            </div>
            <div class="col-auto ms-2">
                <a class="btn btn-secondary">
                    <i class="bi bi-plus-circle"></i>
                    Agregar Plato
                </a>
            </div>
        </div>
    </div>
    <input id="token" value="<?php echo $token; ?>" type="hidden">
    <div class="table-responsive pt-2">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">Plato</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody id="tcuerpo">

            </tbody>
        </table>
    </div>
</div>

<!-- Modal para editar -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content redondear">
            <div class="modal-header">
                <h5 class="modal-title">Editar Plato</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="row">
                        <div class="col-4">
                        <input type="text" id="id" class="form-control">
                        </div>
                        <div class="col-8">
                        <select name="categoria" id="cate" class="form-select">
                            <option selected>Seleccione una categoria...</option>
                            <option value="1">Desayunos</option>
                            <option value="2">Almuerzos</option>
                            <option value="3">Sandwiches</option>
                            <option value="4">Jugos</option>
                            <option value="5">Bebidas</option>
                            <option value="6">Extras</option>
                        </select>
                        </div>
                    </div>
                    <div>
                        <input type="text" id="nombre" class="form-control" placeholder="Nombre del plato">
                    </div>
                    <div>
                        <input type="number" id="precio" class="form-control" placeholder="Precio">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
require_once '../frontend/footer.php';
?>
<script>
    function listar() {
        var token = $("#token").val();
        $.ajax({
            data: {
                token: token
            },
            type: "POST",
            url: "../backend/listarTablaP.php",
            success: function(data) {
                document.getElementById('tcuerpo').innerHTML = data;
            },
        });
    }
    listar();

    function buscar_ahora(buscar) {
        // Obtener el término de búsqueda
        busca = buscar.toLowerCase();
        // Obtener la lista de nombres
        var con = document.getElementsByClassName('lp');
        var nombres = document.getElementsByClassName('nomPlato');

        // Iterar sobre la lista de nombres y mostrar/ocultar según la coincidencia con el término de búsqueda
        for (var i = 0; i < nombres.length; i++) {
            var nombre = nombres[i].innerText.toLowerCase();
            var mostrar = nombre.includes(busca);
            con[i].style.display = mostrar ? '' : 'none';
        }
    }

    //funcion para seleccionar una categoria
    function seleccionarCategoria(id) {
        var select = document.getElementById('cate');
        for (var i = 0; i < select.length; i++) {
            if (select[i].value == id) {
                select[i].selected = true;
            }
        }
    }

    function mostrar(datos) {
        var d = datos.split('||');
        document.getElementById('id').value = d[0];
        document.getElementById('precio').value = d[1];
        document.getElementById('nombre').value = d[2];
        //convertir a numero
        seleccionarCategoria(d[3]);
    }
</script>
</body>

</html>