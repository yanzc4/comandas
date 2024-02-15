<?php
session_start();
//sesion id empleado
$_SESSION['idempleado']="AGC001";
$_SESSION["nombreempleado"]="Administrador";
if (!isset($_SESSION['token'])) {
    $token = md5(uniqid(mt_rand(), true));
    $_SESSION['token'] = $token;
} else {
    $token = $_SESSION['token'];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/libs/bootstrap-icons/font/bootstrap-icons.min.css">
    <title>Caja</title>
    <style>
        .h-header {
            height: 50px;
        }
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .redondear {
            border-radius: 10px;
        }
        body {
            background: #EFEFEF;
        }
        .contenedor {
            width: 100%;
            /*height: calc(100vh - 56px);*/
        }
        .platos, .pedidos{
            height: 400px;
            overflow-y: scroll;
            overflow-x: hidden;
        }
        .platos::-webkit-scrollbar, .pedidos::-webkit-scrollbar {
            width: 6px;
            border-radius: 15px;
        }

        .platos::-webkit-scrollbar-track, .pedidos::-webkit-scrollbar-track {
            background: #fff;
            border-radius: 15px;
        }

        .platos::-webkit-scrollbar-thumb, .pedidos::-webkit-scrollbar-thumb {
            border-radius: 15px;
            background-image: linear-gradient(45deg, #E0AAEC 10%, #817eeb 100%);
        }

        .platos::-webkit-scrollbar-thumb:hover, .pedidos::-webkit-scrollbar-thumb:hover {
            background-image: linear-gradient(45deg, #E0AAEC 10%, #817eeb 100%);
        }
        .categorias, .subtotal{
            height: 100px;
        }
        .h-total{
            height: 100%;
        }
        .bg-celeste{
            background: #9BC7D4;
        }
        .bg-azul{
            background: #659099;
        }
        .bg-gris{
            background: #626671;
        }
        .bg-lila{
            background: #AB87B5;
        }
        .bg-rosa{
            background: #D87174;
        }
        .resumen{
            height: calc(100vh - 75px);
        }
        .cant{
            width: 25px;
            height: 25px;
            background: #817eeb;
            border-radius: 50%;
            color: #fff;
            text-align: center;
            border: none;
        }
        .bg-light{
            background: #fff !important;
        }
        .arriba{
            position: sticky;
            top: 0;
            z-index: 1;
        }
        .perfil{
            width: 50px;
            height: 50px;
        }
        .bg-primer{
            background: #EFEFEF;
        }
        @media screen and (max-width: 720px), screen and (max-width: 900px), screen and (max-width: 480px) {
            .contenedor{
                width: 100%;
            }
            .platos{
                height: 400px;
            }
            .categorias{
                height: auto;
            }
            .h-total{
                height: auto;
            }
            .resumen{
                height: 100%;
            }
            .pedidos{
                height: 100%;
                overflow-y: auto;
            }
            .subtotal{
                height: 100%;
                width: 100%;
            }
        }

    </style>
</head>
<body>
<?php
    