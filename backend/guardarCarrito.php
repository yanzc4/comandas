<?php
include_once '../inc/conexion.php';
session_start();
$conexion = conectar();

if (isset($_POST['token']) && $_POST['token'] == $_SESSION['token'] && isset($_POST['total'])) {
    $cat = $_POST['total'];
    $empleado=$_SESSION['idempleado'];
    //obtener fecha actual bolivia
    date_default_timezone_set('America/La_Paz');
    $fecha = date('d/m/Y');
    //obtener el carrito
    $carrito = $_COOKIE['carrito'];
    $carrito = json_decode($carrito, true);

    $conexion->begin_transaction();

    try{
        $sql1 = "INSERT INTO comandas(empleado, fecha) VALUES ('$empleado', '$fecha')";
        $conexion->query($sql1);

        $ultimoId = $conexion->insert_id;
        //fi la session no existe guardar el id de la comanda si ya existe borralo y guardalo
        if(isset($_SESSION['idcomanda'])){
            unset($_SESSION['idcomanda']);
        }
            $_SESSION['idcomanda'] = $ultimoId;
        

        foreach ($carrito as $detalle) {
            $idProducto = $detalle['id'];
            $cantidad = $detalle['cantidad'];
            $precio = $detalle['precio'];
    
            $sql2 = "INSERT INTO detallecomanda(idcomanda, idproducto, cantidad, precio) VALUES ('$ultimoId', '$idProducto', '$cantidad', '$precio')";
            $conexion->query($sql2);
        }
        
        $conexion->commit();
        //si todo sale bien eliminar la cookie
        setcookie('carrito', '', time() - 3600, '/');
        
        $logo = "../assets/gif/aceptar.gif";
        $titulo = "Listo!";
        $mensaje = "¡Enviado a la base!";
    }catch(Exception $e){
        $conexion->rollback();
        $logo = "../assets/gif/error-img.gif";
        $titulo = "Error!";
        $mensaje = "¡Ocurrio un error!";
    }
    $conexion->close();

}else{
    $logo = "../assets/gif/error-img.gif";
    $titulo = "Error!";
    $mensaje = "¡No tienes acceso a esta informacion si no tienes un token valido!";
}
?>
<div class="text-center">
        <img class="w-50" src="<?php echo $logo ?>" alt="">
    </div>
    <div>
        <h3 class="text-center"><?php echo $titulo ?></h3>
    </div>
    <div class="text-center">
        <p><?php echo $mensaje ?></p>
    </div>
    <div class="container text-center mt-4 mb-2">
        <div class="row">
            <div class="col-6">
                <button id="btnaceptonoti" data-bs-dismiss="modal" class="btn btn-info w-100">Ok</button>
            </div>
            <div class="col-6">
                <a href="../backend/ticket" target="_blank" class="btn bg-lila w-100"><i class="bi bi-printer-fill"></i></a>
            </div>
        </div>
    </div>