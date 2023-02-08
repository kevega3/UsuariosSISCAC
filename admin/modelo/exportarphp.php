<?php

require __DIR__ . "/vendor/autoload.php";

function ConexionBD(){
	
    $base_datos = "users_siscac";
    $usuario = "root";
    $password = "";

    try {

        $conn = new PDO('mysql:host=localhost;dbname=' . $base_datos, $usuario, $password);
        $conn->query("set names utf8;");
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $conn;
    } catch (Exception $e) {
        exit("Error obteniendo BD: " . $e->getMessage());
        return null;
    }
}

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$con = ConexionBD();

$spread = new Spreadsheet();
$spread
->getProperties()
->setCreator("Cuenta de Alto Costo")
->setLastModifiedBy('Nicolas Gutierrez')
->setTitle('Reporte sistema de correspondencia')
->setSubject('Reporte')
->setDescription('Reporte sistema de correspondencia')
->setKeywords('CAC')
->setCategory('Reportes');

$hojaDeSolicitudes = $spread->getActiveSheet();
$hojaDeSolicitudes->setTitle("Solicitudes");

$encabezado = ["IdSolicitud", "DescripcionEntidad", "NIT", "NumVNIT", "Nombre","RepresentanteLegal","Correo","Telefono","FechaSISCAC"];

$hojaDeSolicitudes->fromArray($encabezado, null, 'A1');


$consulta = "SELECT DISTINCT s.IdSolicitud, t.DescripcionEntidad,s.NIT,s.NumVNIT,s.FechaSISCAC,s.Nombre,s.RepresentanteLegal,s.Cargo,s.Correo,s.Telefono,s.FechaCreacion,s.IdEstado FROM solicitudes s INNER JOIN tipoentidad t ON s.IdTipoEntidad = t.IdTipoEntidad WHERE IdEstado = 4";


$sentencia = $con->prepare($consulta, [
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
$sentencia->execute();
$numeroDeFila = 2;

while ($solicitud = $sentencia->fetchObject()) {
    # Obtener registros de MySQL
    $IdSolicitud = $solicitud->IdSolicitud;
    $DescripcionEntidad = $solicitud->DescripcionEntidad;
    $NIT = $solicitud->NIT;
    $NumVNIT = $solicitud->NumVNIT;
    $Nombre = $solicitud->Nombre;
    $RepresentanteLegal = $solicitud->RepresentanteLegal;
    $Correo = $solicitud->Correo;
    $Telefono = $solicitud->Telefono;
    $FechaSISCAC = $solicitud->FechaSISCAC;
    
    
    $hojaDeSolicitudes->setCellValueByColumnAndRow(1, $numeroDeFila, $IdSolicitud);
    $hojaDeSolicitudes->setCellValueByColumnAndRow(2, $numeroDeFila, $DescripcionEntidad);
    $hojaDeSolicitudes->setCellValueByColumnAndRow(3, $numeroDeFila, $NIT);
    $hojaDeSolicitudes->setCellValueByColumnAndRow(4, $numeroDeFila, $NumVNIT);
    $hojaDeSolicitudes->setCellValueByColumnAndRow(5, $numeroDeFila, $Nombre);
    $hojaDeSolicitudes->setCellValueByColumnAndRow(6, $numeroDeFila, $RepresentanteLegal);
    $hojaDeSolicitudes->setCellValueByColumnAndRow(7, $numeroDeFila, $Correo);
    $hojaDeSolicitudes->setCellValueByColumnAndRow(8, $numeroDeFila, $Telefono);
    $hojaDeSolicitudes->setCellValueByColumnAndRow(9, $numeroDeFila, $FechaSISCAC);
    $numeroDeFila++;
}
$fileName="ReporteCreados.xlsx";
$writer = new Xlsx($spread);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
$writer->save('php://output');
?>
