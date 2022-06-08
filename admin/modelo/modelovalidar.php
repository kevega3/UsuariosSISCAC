<?php 
	class Model{
		var $Id;
		var $usuario;
		var $clave;
		// var $Id;
		// var $NombreTabla;

		function __construct(){

		}
		function Logear(){
			$cadenaCnx="sqlsrv:server=MKBOG016\MKBOG016;database=DWH";
			$user="sa";
			$pass="Cuent42021$*";

			$cnx= new PDO($cadenaCnx,$user,$pass);

			try {
				$consulta=$cnx->prepare("SELECT * FROM usuario WHERE usarname=:parametro1 AND rol=:parametro3 AND clave=(SELECT dbo.fun_encriptarLogin(:parametro2))");


				$consulta->bindValue(":parametro1",$this->usuario);
				$consulta->bindValue(":parametro2",$this->clave);

				$consulta->execute();
				$filaModel=$consulta->fetch();

				return $filaModel;

			} catch (PDOException $e) {
				echo "EROR EN LA CONEXION->".$e;
			}
		}


	}
?>