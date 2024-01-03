<?php
session_start();

//if la id del producto existe eliminar de la cookie
if (isset($_POST['token']) && $_POST['token'] == $_SESSION['token'] && isset($_POST['id'])) {
    $id = $_POST['id'];
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
            array_splice($carrito, $indice, 1);
            $carrito = json_encode($carrito, true);
            setcookie('carrito', $carrito, time() + 30 * 24 * 60 * 60, '/');
            $logo = "../assets/gif/aceptar.gif";
            $titulo = "Listo!";
            $mensaje = "¡Plato eliminado con exito!";
        } else {
            $logo = "../assets/gif/error-img.gif";
            $titulo = "Error!";
            $mensaje = "¡No se puede eliminar!";
        }
    } else {
        $logo = "../assets/gif/error-img.gif";
        $titulo = "Error!";
        $mensaje = "¡No existe carrito!";
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
} else {
        echo "no tienes un token";
}