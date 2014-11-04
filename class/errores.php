<?php
/**
 * Ejemplo de manejo de errores.
 * -1 E_ERROR:
 * -2 E_WARNING:
 * -4 E_PARSE:
 * -8 E_NOTICE:
 * -16 E_CORE_ERROR:
 * -32 E_CORE_WARNING:
 * -64 E_COMPILE_ERROR:
 * -128 E_COPILE_WARNING:
 * -256 E_USER_ERROR:
 * -512 E_USER_WARNING:
 * -1024 E_USER_NOTICE: Mensaje de aviso generado por el usuario.
 */

/**
 * Clase Errores
 * Manejo de los diferentes tipos de errores.
 * @package app
 * @author sergio canul
 * @param array $errorTipos Los tipos de errores.
 * @param bool $mostrarErrores
 * @access private
 * @param bool $logearErrores
 * @access private
 * @param file $archivoErrores
 * @access private
 */
class Errores{
	public $errorTipos = array(
		1=>"EROOR",
		2=>"WARNING",
		4=>"PARSE EROOR",
		8=>"NOTICE",
		16=>"CORE EROOR",
		32=>"CORE WARNING",
		64=>"COMPILE EROOR",
		128=>"COMPILE WARNING",
		256=>"USER EROOR",
		512=>"USER WARNING",
		1024=>"USER NOTICE"
		);
	private $mostrarErrores = true;
	private $logearErrores = true;
	private $archivoErrores = "temp/PHP_errores.log";

	/**
	 * Construct
	 * 
	 * @param array $gestor
	 */
	public function __construct(){
		$gestor = set_error_handler(array($this, 'gestionErrores'));
		error_reporting(E_ALL);
	}
	/**
	* Gestión de los errores.
	* Gestiona los erroes que se producen en un formato.
	* 
	* @param array $errno Tipo del error.
	* @param array $errstr Mensaje del error.
	* @param file  $file URL del archivo donde se encuentra el error.
	* @param string $linea Linea donde se produjo el error.
	* @param string $context
	*/
	public function gestionErrores($errno, $errstr, $file, $linea, $context){
		$strErr = "<pre>";
		$strErr .="--ERROR ".$this->errorTipos[$errno]." --".PHP_EOL;
		$strErr .="FECHA: ".date("y-m-d H:i:s").PHP_EOL;
		$strErr .="ARCHIVO: ".$file.PHP_EOL;
		$strErr .="LINEA: ".$linea.PHP_EOL;
		$strErr .="IP SERVIDOR: ".$_SERVER['SERVER_ADDR'].PHP_EOL;
		$strErr .="IP USUARIO: ".$_SERVER['REMOTE_ADDR'].PHP_EOL;
		$strErr .="MENSAJE: ".$errstr.PHP_EOL;
		$strErr .="--ERROR: ".$this->errorTipos[$errno]." --".PHP_EOL;
		$strErr .= "</pre>";

		if ($this->logearErrores) {
			if ($this->archivoErrores) {
				$logTxt = file_get_contents($this->archivoErrores);
				$logTxt .= $strErr.PHP_EOL;
				file_put_contents($this->archivoErrores, $logTxt);
			}
		}

		if ($this->mostrarErrores) {
			echo $strErr;
		} else {
			echo "ERROR".PHP_EOL;
		}
	} #Fin del método gestionErrores
}

$error = new Errores();
echo $xx; #Ejemplo para comprobar que funciona el manejo de errores.
?>