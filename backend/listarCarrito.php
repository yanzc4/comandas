<?php

//listar la coockie
if (isset($_COOKIE['carrito'])) {
    $carrito = $_COOKIE['carrito'];
    $carrito = json_decode($carrito, true);
    $total = 0;
    ?>
    <div class="pedidos pe-2 ps-2">
        <h3 class="arriba" style="background: #EFEFEF;">Carrito</h3>
        <div class="row">
    <?php
    for ($i = 0; $i < count($carrito); $i++) {
        $total = $total + ($carrito[$i]['precio'] * $carrito[$i]['cantidad']);
        ?>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2 lp">
            <div class="container bg-light text-center redondear p-0 m-0 pt-2">
                <label for="plato" class="fw-bold lblPlato"><?php echo $carrito[$i]['nombre']; ?></label>
                <br>
                <span class="row">
                <span class="col-12">
                <button class="cant" onclick="disminuir('<?php echo $carrito[$i]['id']; ?>')"><i class="bi bi-dash"></i></button>
                    
                    <label for="cantidad" class="fw-bold pe-1 ps-1"><?php echo $carrito[$i]['cantidad']; ?></label>
                    
                        <button class="cant" onclick="aumentar('<?php echo $carrito[$i]['id']; ?>')"><i class="bi bi-plus"></i></button>
                </span>
                </span>

                <label for="precio" class="fw-bold text-primary"><?php echo $carrito[$i]['precio']; ?></label>
                    <div class="container p-2">
                        <button type="button" class="btn btn-secondary w-100" onclick="eliminar('<?php echo $carrito[$i]['id']; ?>');">
                        <i class="bi bi-trash-fill"></i> Eliminar
                        </button>
                    </div>
                    
            </div>
        </div>
        <?php
    }
    ?>
    </div>
    </div>
    <div class="row">
    <hr class="mt-2 p-1 fw-bold">
        <div class="col-6">
            <label for="total" class="fw-bold">Total</label>
        </div>
        <div class="col-6">
            <label for="total" class="fw-bold"><?php echo $total; ?> Bs</label>
        </div>
            <div class="w-100 mt-3">
            <button type="button" class="btn btn-primary w-100" onclick="pagar('<?php echo $total; ?>');">
            <i class="bi bi-cash-stack"></i> Enviar
            </button>
            </div>
            </div>
    <?php
} else {
    echo "No hay productos en el carrito";
}