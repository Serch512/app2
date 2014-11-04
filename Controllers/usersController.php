<?php 
/**
 * classe grup extendida del app controller
 * 
 * @category   controlador de usuarios.
 * @package    PackageName
 * @author     Sergio canul balam <serch_501_@hotmail.com>
 * @copyright  2014 Utrm.
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    app2.0
 * 
 * */

/**
 * 
 * clase user con extencion del appcontroller
 * 
 * */

class User extends AppController{

	public function __construct(){
		parent::__construct();

	}

/**
 * 
 * funcion index
 * 
 * funcion utilizada para agrupar en una lista los usuarios
 * no debuelve valores.
 * 
 * */
	public function index(){
		$users = $this->User->find("users","all");
		$this->set("users", $users);
	}
/**
	 * 
	 * funcion edit 
	 * funcion utilizada para editar los usuarios en la base de datos
	 * recibe parametro entero $id de el usuario que se modificara 
	 * 
	 * 
	 * */
	public function edit($id=null){
		if($_POST){

			$filter = new validations();
			$pass   = new Password();

			$_POST["password"] = $filter->sanitizeText($_POST["password"]);
			$_POST["password"] = $pass->getPassword($_POST["password"]);

		if($this->User->update("users", $_POST)){
				$this->redirect(array("controller"=>"users", "action"=>"index"));
			}else{
				$this->redirect(array("controller"=>"users", "action"=>"edit"));
			}
				
		}

		$user = $this->User->find("users","first",
			array(
				"conditions"=>"users.id=$id"
			)
			);
			$this->set("user", $user);
			
			//$groups = $this->User->find("groups", "all");	
			//$this->set("groups", $groups);
	}
	/**
 * 
 * funcion add agregar
 * 
 * funcion utilizada para agregar usuarios.
 * no debuelve valores.
 * 
 * */
	public function add(){

		
		if($_POST){
			$filter = new validations();
			$pass   = new Password();
			//$phpmailer = new PHPMailer();

			$_POST["password"] = $filter->sanitizeText($_POST["password"]);
			$_POST["edad"] = $filter->sanitizeText($_POST["edad"]);
			$_POST["password"] = $pass->getPassword($_POST["password"]);
			/*if($filter->isInt($_POST['edad'], 18, 40)){
				die("Edad fuera del rango");
			}else {
				echo "edad correcta";
			}*/
			if($this->User->save("users", $_POST)){
				$this->redirect(array("controller"=>"users", "action"=>"index"));
			}else{
				$this->redirect(array("controller"=>"users", "action"=>"add"));
			}
		}
	}
	/**
	* funcion delete
	*
	* Funcion que sirve para eliminar usuarios de la base de datos
	* recibe parametro int $id Identifica el usuario a eliminar
	*/
     public function delete($id = null){
			if($_POST){
			$users = $this->User->delete('users', 'id = '.$id);
			$this->redirect(array("controller"=>"users", "action"=>"index"));
		    }
	}

	public function login(){
		if($_POST){
			$pass = new Password();
			$filter = new Validations();
			$auth = new Authorization();

			$username = $filter->sanitizeText($_POST["username"]);
			$password = $filter->sanitizeText($_POST["Password"]);

			$options['conditions'] = " username = '$username'";
			$user = $this->User->find("users", "first", $options);

			if($pass->isValid($password, $user['password'])){
				$auth->login($user);
				$this->redirect(array("controller"=>"users", "action"=>"index"));
			}else{
				echo "Usuario Invalido";
			}
		}
	}
	public function logout(){
		$auth = new Authorization();
		$auth->logout();
	}


}

