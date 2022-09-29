<?php
// error_reporting(0);
include ('key.php');
//Google

if ($_POST['entrar']) {

    $googleToken = $_POST['entrar'];

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$googleToken}");
    $response = json_decode($response);

    $response = (array) $response;

    if($response['success'] && ($response['score'] && $response['score'] > 0.5)){ 
	
class Datos{

	private $archivo;
	private $tipoentidad;
	private $NombreEni;
	private $nit;
	private $numV;
	private $nombre;
	private $representante;
	// private $cargo;
	private $correo;
	private $telefono;
	private $idsolicitud;
	private $tipoDoc;


	public function set_archivo($archivo,$tipoDoc){
		$this->archivo = $archivo;
		$this->tipoDoc = $tipoDoc;
	}
	public function get_archivo(){
		include ('conexion.php');
		$tipoArchivo = $this-> tipoDoc;
		
		$dir_subida = '../files/'.Date('Y')."/".Date('m')."/";
		$hora = Date('his');
		$archivo_subido = $dir_subida.$hora.basename($this->archivo['name']);
		if (!file_exists($dir_subida)) {
			mkdir($dir_subida,0777,true);
		}
		if (!file_exists($archivo_subido)) {
			if (move_uploaded_file($this->archivo['tmp_name'], $archivo_subido)) {
				
				$nombreArchivo = $this->archivo['name'];
				$fecha = Date('Y-m-d h:i:s');

				$insert = "INSERT INTO `archivos`(`Nombre`,`TipoDoc`, `Ruta`, `FechaSubida`, `IdSolicitud`) VALUES ('$nombreArchivo','$tipoArchivo','$archivo_subido','$fecha','$this->idsolicitud')";
				$ejecutar = $conn->prepare($insert);
				if ($ejecutar->execute()) {
					echo "Archivo subido a bd.";
				}

			}else{
				echo "<script>alert('Error al cargar el archivo ".$this->archivo['name'].". Vuelva a intentarlo.')</script>";
				// echo "<script>window.location.replace('../index.php')</script>";
			}
		}		
	}
	public function subir_archivo(){

		
		$funcionarios = Datos::set_archivo($_FILES['funcionarios'],4); 
		$funcionarios = Datos::get_archivo();
		
		$asignacionUsuarios = Datos::set_archivo($_FILES['asignacionUsuarios'],1); 
		$asignacionUsuarios = Datos::get_archivo();

		$representante = Datos::set_archivo($_FILES['representante'],3); 
		$representante = Datos::get_archivo(); 

		$comunicado = Datos::set_archivo($_FILES['comunicado'],2); 
		$comunicado = Datos::get_archivo();
		
		
		
	}
	public function insertarDatosUsuario(){
		include ('conexion.php');
		$tipoentidadSUC=filter_var($_POST['tipoEntidad'], FILTER_SANITIZE_STRING);
		$this->tipoentidad = preg_replace('/[@\.\;\"\´ ]+/','',$tipoentidadSUC);
		// $this->tipoentidad = filter_var($_POST['tipoEntidad'], FILTER_SANITIZE_STRING);
		$nitSUC=filter_var($_POST['nit'], FILTER_SANITIZE_STRING);
		$this->nit = preg_replace('/[@\.\;\"\´  ]+/','',$nitSUC);
		// $this->nit = filter_var($_POST['nit'], FILTER_SANITIZE_STRING);
		$numVSUC=filter_var($_POST['numV'], FILTER_SANITIZE_STRING);
		$this->numV = preg_replace('/[@\.\;\"\´  ]+/','',$numVSUC);
		// $this->numV = filter_var($_POST['numV'], FILTER_SANITIZE_STRING);
		$nombreSUC=filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
		$this->nombre = preg_replace('/[@\.\;\"\´  ]+/','',$nombreSUC);
		// $this->nombre = filter_var(strtoupper($_POST['nombre']), FILTER_SANITIZE_STRING);
		$representanteSUC=filter_var($_POST['representante'], FILTER_SANITIZE_STRING);
		$this->representante = preg_replace('/[@\.\;\"\´  ]+/','',$representanteSUC);
		// $this->representante = filter_var(strtoupper($_POST['representante']), FILTER_SANITIZE_STRING);
		$this->cargo = 'N/A';
		$correoSUC=filter_var($_POST['correo'], FILTER_SANITIZE_STRING);
		$this->correo = preg_replace('/[;\"\´  ]+/','',$correoSUC);
		// $this->correo = filter_var($_POST['correo'], FILTER_SANITIZE_STRING);
		$telefonoSUC=filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
		$this->telefono = preg_replace('/[@\.\;\"\´  ]+/','',$telefonoSUC);
		// $this->telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
		$NombreEniSUC=filter_var($_POST['NombreEni'], FILTER_SANITIZE_STRING);
		$this->NombreEni = preg_replace('/[@\.\;\"\´  ]+/','',$NombreEniSUC);
		
		$fecha = Date('Y-m-d h:i:s');	

		$UpdateToken="UPDATE `token_au` SET `Token`='Used' WHERE  IdToken = '$NombreEni'";
		echo $NombreEni;
		$smtm = $conn->prepare($UpdateToken);

		$insertar="INSERT INTO `solicitudes`(`IdTipoEntidad`, `NIT`, `NumVNIT`, `Nombre`, `RepresentanteLegal`, `Cargo`, `Correo`, `Telefono`, `FechaCreacion`, `IdAsignadoA`, `IdEstado`) VALUES ('$this->tipoentidad','$this->nit','$this->numV','$this->nombre','$this->representante','$this->cargo','$this->correo','$this->telefono','$fecha','1','1')";
		$smtm = $conn->prepare($insertar);

		if ($smtm->execute()) {
			$this->idsolicitud = $conn->lastInsertId();
			include('correo.php');
			
			
			

			echo "<script>alert('Información registrada con éxito.')</script>";
			// echo "<script>window.location.replace('../index.php')</script>";
		}
		else{
			echo "<script>alert('Error al guardar la información. Por favor vuelva a intentarlo')</script>";
			echo "<script>window.location.replace('../index.php')</script>";
		}
	}

	public function validar(){

		if (!file_exists($_FILES['comunicado']['tmp_name']) || !file_exists($_FILES['representante']['tmp_name']) || !file_exists($_FILES['asignacionUsuarios']['tmp_name']) || !file_exists($_FILES['funcionarios']['tmp_name'])) {
			echo "<script>alert('Error al cargar los archivos. Vuelva a intentarlo.')</script>";
			echo "<script>window.location.replace('../index.php')</script>";
		}else{
			if ($_FILES['comunicado']['error'] > 0 || $_FILES['representante']['error'] > 0 || $_FILES['asignacionUsuarios']['error'] > 0 || $_FILES['funcionarios']['error'] > 0) {

				echo "<script>alert('Archivos con errores. Vuelva a intentarlo.')</script>";
				// echo "<script>window.location.replace('../index.php')</script>";
			}else{
				$permitidos = array("application/vnd.openxmlformats-officedocument.spreadsheetml.sheet","application/vnd.ms-excel","application/pdf");
				$limite_kb = 5000;

				if (in_array($_FILES['comunicado']['type'], $permitidos) && in_array($_FILES['representante']['type'], $permitidos) && in_array($_FILES['asignacionUsuarios']['type'], $permitidos) && in_array($_FILES['funcionarios']['type'], $permitidos)) {
					if ($_FILES['comunicado']['size']<=$limite_kb*1024 && $_FILES['representante']['size']<=$limite_kb*1024 && $_FILES['asignacionUsuarios']['size']<=$limite_kb*1024 && $_FILES['funcionarios']['size']<=$limite_kb*1024) {

						Datos::insertarDatosUsuario();
						Datos::subir_archivo();		
					}
				}else{
					echo "<script>alert('Uno o más archivos presentan errores en la extensión permitida. Vuelva a intentarlo.')</script>";
					// echo "<script>window.location.replace('../index.php')</script>";
				}
			}
		}
	}
}

$gestionar = new Datos();
$gestionar->validar();

	}else{
		echo "<script>alert('Vuelve a intentarlo')</script>";
		// echo "<script>window.location.replace('../index.php')</script>";
	}

}else{
	echo "<script>alert('Vuelve a intentarlo...')</script>";
	// echo "<script>window.location.replace('../index.php')</script>";
}

?>