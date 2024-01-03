<?php
session_start();

function agregarProducto($id,$nombre,$precio,$empleado){
    if (isset($_COOKIE['carrito'])) {
        $carrito = $_COOKIE['carrito'];
        $carrito = json_decode($carrito, true);
        //añaadir el nuevo producto
        $carrito[] = array(
            'id' => $id,
            'nombre' => $nombre,
            'precio' => $precio,
            'cantidad' => 1, //por defecto
            'empleado' => $empleado
        );
        $carrito = json_encode($carrito, true);
        setcookie('carrito', $carrito, time() + 30 * 24 * 60 * 60, '/');
    } else {
        $carrito = array();
        $carrito[] = array(
            'id' => $id,
            'nombre' => $nombre,
            'precio' => $precio,
            'cantidad' => 1, //por defecto
            'empleado' => $empleado
        );
        $carrito = json_encode($carrito, true);
        setcookie('carrito', $carrito, time() + 30 * 24 * 60 * 60, '/');
    }
}

if (isset($_POST['token']) && $_POST['token'] == $_SESSION['token'] && isset($_POST['id']) && isset($_POST['precio']) && isset($_POST['nombre'])) {
    $id = $_POST['id'];
    $precio = $_POST['precio'];
    $nombre = $_POST['nombre'];
    $empleado = $_SESSION['idempleado'];
    //si el producto ya esta en el carrito aumentar la cantidad
    if (isset($_COOKIE['carrito'])) {
        $carrito = $_COOKIE['carrito'];
        $carrito = json_decode($carrito, true);
        $encontro = false;
        $indice = 0;
        for ($i = 0; $i < count($carrito); $i++) {
            if ($carrito[$i]['id'] == $id) {
                $encontro = true;
                $indice = $i;
            }
        }
        if ($encontro == true) {
            $carrito[$indice]['cantidad'] = $carrito[$indice]['cantidad'] + 1;
            $carrito = json_encode($carrito, true);
            setcookie('carrito', $carrito, time() + 30 * 24 * 60 * 60, '/');
            $logo = "../assets/gif/aceptar.gif";
            $titulo = "Listo!";
            $mensaje = "¡El plato aumento su cantidad!";
        } else {
            agregarProducto($id,$nombre,$precio,$empleado);
            $logo = "../assets/gif/aceptar.gif";
            $titulo = "Listo!";
            $mensaje = "¡Plato agregado!";
        }
    } else {
        agregarProducto($id,$nombre,$precio,$empleado);
        $logo = "../assets/gif/aceptar.gif";
            $titulo = "Listo!";
            $mensaje = "¡Plato agregado!";
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
        <button id="btnaceptonoti" data-bs-dismiss="modal" class="btn btn-info ms-auto w-25">Ok</button>
    </div>
<?php
}else{
    echo "No tienes acceso a esta informacion si no tienes un token valido";
    
}
