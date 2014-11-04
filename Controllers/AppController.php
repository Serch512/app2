<?php 
/**
 * class controlador de la @AppController 
 *  @category   Mvce con POO
 * @package    PackageName
 * @author     Sergio canul balam <serch_501_@hotmail.com>
 * @copyright  2014 Utrm.
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    app2.0
 * */
abstract class AppController{

	abstract public function index();

	public function __construct(){
		$nameController = get_class($this);
		$this->$nameController = new ClassPDO();

	}

	public function set($name = null, $value= array()){
/**
 * $GLOBALS[NAM] parametro global
 * */
		$GLOBALS[$name] = $value;
	}
	
	protected function redirect($url = array()){
		$path = "";
		if($url["controller"]){
			$path .= $url["controller"];
		}
		if($url["action"]){
			$path .= "/".$url["action"];
		}
		header("LOCATION: http://localhost/app2/".$path);
	}


	}

