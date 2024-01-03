<?php

# Incluyendo librerias necesarias #
require "../assets/libs/code128.php";
include_once '../inc/conexion.php';
session_start();
$con = conectar();

date_default_timezone_set('America/La_Paz');
$fechad =getdate();
$fecha=$fechad['mday']."-".$fechad['mon']."-".$fechad['year'];
$hora = date("h:i A");


function money(float $valor, string $simbolo = 'Bs.'): string
{
    return $simbolo . number_format($valor, 2, '.', ',');
}

$idv=$_SESSION['idcomanda'];
$vendedor=$_SESSION['nombreempleado'];
$idempleado=$_SESSION['idempleado'];

$consulta2=$con->query("SELECT p.nombre, dc.cantidad, dc.precio FROM detallecomanda dc JOIN productos p on dc.idproducto=p.id WHERE dc.idcomanda='$idv';");

$pdf = new PDF_Code128('P', 'mm', array(80, 258));
$pdf->SetMargins(4, 0, 4);
$pdf->AddPage();

# Encabezado y datos de la empresa #
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Ln(10);
$pdf->MultiCell(0, 5, utf8_decode(strtoupper("Sistema de Caja")), 0, 'C', false);
$pdf->SetFont('Arial', '', 9);
//$pdf->MultiCell(0, 5, utf8_decode("RUC: 0000000000"), 0, 'C', false);
//$pdf->MultiCell(0, 5, utf8_decode("Direccion Av Los Olivos de Pro 123"), 0, 'C', false);
//$pdf->MultiCell(0, 5, utf8_decode("Teléfono: 123456789"), 0, 'C', false);
//$pdf->MultiCell(0, 5, utf8_decode("Email: restaurante@boomerang.com"), 0, 'C', false);

$pdf->Ln(1);
$pdf->Cell(0, 5, utf8_decode("------------------------------------------------------"), 0, 0, 'C');
$pdf->Ln(5);

$pdf->MultiCell(0, 5, utf8_decode("Fecha: " . date("d/m/Y", strtotime($fecha)) . " " . $hora), 0, 'C', false);
//$pdf->MultiCell(0, 5, utf8_decode("Caja Nro: 1"), 0, 'C', false);
$pdf->MultiCell(0, 5, utf8_decode("Moso: " . $vendedor), 0, 'C', false);
$pdf->SetFont('Arial', 'B', 10);
$pdf->MultiCell(0, 5, utf8_decode(strtoupper("Ticket Nro: " . $idv)), 0, 'C', false);
$pdf->SetFont('Arial', '', 9);

$pdf->Ln(1);
$pdf->Cell(0, 5, utf8_decode("------------------------------------------------------"), 0, 0, 'C');
$pdf->Ln(5);

$pdf->MultiCell(0, 5, utf8_decode("Codigo: " . $idempleado), 0, 'C', false);
//$pdf->MultiCell(0, 5, utf8_decode("Documento: DNI 00000000"), 0, 'C', false);
//$pdf->MultiCell(0, 5, utf8_decode("Teléfono: 00000000"), 0, 'C', false);
//$pdf->MultiCell(0, 5, utf8_decode("Dirección: San Salvador, El Salvador, Centro America"), 0, 'C', false);

$pdf->Ln(1);
$pdf->Cell(0, 5, utf8_decode("-------------------------------------------------------------------"), 0, 0, 'C');
$pdf->Ln(3);

# Tabla de productos #
$pdf->Cell(10, 4, utf8_decode("Cant."), 0, 0, 'C');
$pdf->Cell(62, 4, utf8_decode("Pedido"), 0, 0, 'C');

$pdf->Ln(3);
$pdf->Cell(72, 5, utf8_decode("-------------------------------------------------------------------"), 0, 0, 'C');
$pdf->Ln(3);

$stotal=0;
$ssubtotal=0;

/*----------  Detalles de la tabla  ----------*/
while($resultado = $consulta2->fetch_assoc()) {
$pdf->Cell(10, 4, utf8_decode($resultado['cantidad']), 0, 0, 'C');
$pdf->Cell(62, 4, utf8_decode($resultado['nombre']), 0, 0, 'C');
$pdf->Ln(6);
$ssubtotal += $resultado['precio']*$resultado['cantidad'];
}

$stotal=$ssubtotal;
//$pdf->MultiCell(0, 4, utf8_decode("Garantía de fábrica: 2 Meses"), 0, 'C', false);
//$pdf->Ln(7);
/*----------  Fin Detalles de la tabla  ----------*/


$pdf->Cell(72, 5, utf8_decode("-------------------------------------------------------------------"), 0, 0, 'C');

$pdf->Ln(5);

$pdf->Cell(18, 5, utf8_decode(""), 0, 0, 'C');
$pdf->Cell(22, 5, utf8_decode("TOTAL A PAGAR"), 0, 0, 'C');
$pdf->Cell(32, 5, utf8_decode(money($stotal)), 0, 0, 'C');

/*$pdf->Ln(5);

$pdf->Cell(18, 5, utf8_decode(""), 0, 0, 'C');
$pdf->Cell(22, 5, utf8_decode("TOTAL PAGADO"), 0, 0, 'C');
$pdf->Cell(32, 5, utf8_decode("$100.00 USD"), 0, 0, 'C');

$pdf->Ln(5);

$pdf->Cell(18, 5, utf8_decode(""), 0, 0, 'C');
$pdf->Cell(22, 5, utf8_decode("CAMBIO"), 0, 0, 'C');
$pdf->Cell(32, 5, utf8_decode("$30.00 USD"), 0, 0, 'C');

$pdf->Ln(5);

$pdf->Cell(18, 5, utf8_decode(""), 0, 0, 'C');
$pdf->Cell(22, 5, utf8_decode("USTED AHORRA"), 0, 0, 'C');
$pdf->Cell(32, 5, utf8_decode("$0.00 USD"), 0, 0, 'C');
*/
$pdf->Ln(10);


# Nombre del archivo PDF #
$user_agent = $_SERVER["HTTP_USER_AGENT"];
if (preg_match("/(android|webos|avantgo|iphone|ipod|ipad|bolt|boost|cricket|docomo|fone|hiptop|opera mini|mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $user_agent)) {
    $pdf->Output('D', 'COD' . $idv . '.pdf');
} else {
    $pdf->Output();
}
