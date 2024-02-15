<?php
include_once '../inc/conexion.php';
session_start();


if (isset($_POST['token']) && $_POST['token'] == $_SESSION['token']) {
    $conexion = conectar();
    $query = "SELECT p.id, p.nombre, p.precio, p.estado, p.categoria as idcat, c.categoria FROM productos p JOIN categorias c on p.categoria=c.id;";
    $resultado = $conexion->query($query);
    while ($fila = $resultado->fetch_assoc()) {
        $datos = $fila['id'] . "||" .
            $fila['precio'] . "||" .
            $fila['nombre']."||".
            $fila['idcat']."||".
            $fila['estado'];
?>
        <tr class="lp">
            <td><?php echo $fila['id']; ?></td>
            <td class="nomPlato"><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['precio']; ?></td>
            <td><?php echo $fila['categoria']; ?></td>
            <td>
                <?php 
                $esta = $fila['estado']; 
                if($esta == 1){
                    echo "<span class='badge bg-success'>Activo</span>";
                }else{
                    echo "<span class='badge bg-danger'>Inactivo</span>";
                }
                ?>
            </td>
            <td>
                <div>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit" onclick="mostrar('<?php echo $datos; ?>')">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <button class="btn btn-danger">
                        <i class="bi bi-trash"></i>
                    </button>

                </div>
            </td>
        </tr>
<?php
    }
    mysqli_close($conexion);
} else {
    echo "No tienes acceso a esta informacion si no tienes un token valido";
}
//cerrar conexion;
