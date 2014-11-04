<?php 
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * Short description for file
 *
 * Long description for file (if any)...
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Mvce con POO
 * @package    PackageName
 * @author     Sergio canul balam <serch_501_@hotmail.com>
 * @copyright  2014 Utrm.
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    app2.0
 */

define('DS', DIRECTORY_SEPARATOR);#diagonal separador de direcciones
define('ROOT', dirname(__FILE__)).DS;#nombre del archivo
define('APP_PATH', ROOT);#

function __autoload($classname) {
    $filename = "class/". $classname .".php";
    include_once $filename;
}
//$error = new Errores();

//include_once APP_PATH.DS. 'Class'.DS.'pdo.php';
include_once APP_PATH. DS . 'class'.DS.'Validations.php';
//include_once APP_PATH.DS. 'Class'.DS.'errores.php';
include_once APP_PATH.DS. 'Controllers'.DS.'AppController.php';

//print_r(get_required_files());

if (isset($_GET['url'])){


$urL= filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
$urL= explode("/", $urL);
$urL= array_filter($urL);

$Controller = array_shift($urL);
$action = array_shift($urL);
$args = $urL;
}

if (!isset($Controller)){
	$Controller="users";
}
if (!isset($action)){
	$action= "index";
}

if (empty($args)){
	$args= array(0=>null);
}
if($action=="login" or $action=="index"){
	
}else{
	#Authorization::logged();
}
/**
 * 
 * directorios de carpetas modelo vista controlador
 * 
 * */
$path  = APP_PATH.DS."Controllers".DS.$Controller."Controller.php";
$view  = APP_PATH.DS."Views".DS.$Controller.DS.$action.".php";
$header = APP_PATH.DS."Views".DS."Layouts".DS."default".DS."header.php";
$footer = APP_PATH.DS."Views".DS."Layouts".DS."default".DS."footer.php";


if(file_exists($path)){
	include_once ($path);
	$className = trim($Controller,'s');
	$ob = new $className();

	if (isset($args)){
		$ob->$action($args[0]);
	}else{
		$ob->$action();
			}

	if(file_exists($view)){
		include_once $header;
		include_once $view;
		include_once $footer;

	}else{
		echo "La vista para la accion $action no existe";
	}

	}else {

		echo"El controlador".$Controller." no existe";
	}



?>