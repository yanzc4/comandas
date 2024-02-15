<?php
include_once '../inc/conexion.php';
session_start();


if (isset($_POST['token']) && $_POST['token'] == $_SESSION['token'] && isset($_POST['cat'])) {
    $conexion = conectar();
    $cat = $_POST['cat'];
    $query = "SELECT * FROM productos WHERE estado = 1 AND categoria = '$cat';";
    $resultado = $conexion->query($query);
    while ($fila = $resultado->fetch_assoc()) {
        $datos=$fila['id']."||".
                $fila['precio']."||".
                $fila['nombre'];
        ?>
        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 mb-2 lp">
            <div class="container bg-light text-center redondear p-0 m-0 pt-2">
                <label for="plato" class="fw-bold lblPlato"><?php echo $fila["nombre"]; ?></label>
                <br>
                <label for="precio" class="fw-bold text-primary"><?php echo $fila["precio"]; ?></label>
                    <div class="container p-2">
                        <button type="button" class="btn btn-secondary w-100" onclick="mandar_agregar('<?php echo $datos ?>');" data-bs-toggle="modal" data-bs-target="#actualizarusuario">
                        <i class="bi bi-bag-plus-fill"></i> Agregar
                        </button>
                    </div>
                    
            </div>
        </div>
        <?php
    }
    mysqli_close($conexion);
}else{
    echo "No tienes acceso a esta informacion si no tienes un token valido";
}
//cerrar conexion;

