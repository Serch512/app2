<?php 
/**
 * classe grup extendida del app controller
 * 
 * @category   controlador de grupos
 * @package    PackageName
 * @author     Sergio canul balam <serch_501_@hotmail.com>
 * @copyright  2014 Utrm.
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    app2.0
 * 
 * */

class group extends AppController{

public function __contruct(){
		parent::__contruct();
	}

/**
 * 
 * funcion index
 * 
 * funcion utilizada para agrupar en una lista los group
 * no debuelve valores.
 * 
 * */
	public function index(){

		$groups = $this->group->find("groups","all");
		$this->set("groups",$groups);
	}
/**
 * 
 * funcion add agregar
 * 
 * funcion utilizada para agregar grupos.
 * no debuelve valores.
 * 
 * */
	public function add(){
		if($_POST){
			if($this->group->save('groups', $_POST)){
				$this->redirect(array("controller"=>"groups","action"=>"index"));
			}else{
				$this->redirect(array("controller"=>"groups","action"=>"add"));
			}
		}
	}
	/**
	 * 
	 * funcion edit 
	 * funcion utilizada para editar los grupos en la base de datos
	 * recibe parametro entero $id del rupo que se modificara 
	 * 
	 * 
	 * */
	public function edit($id = null){

		if($_POST){
			if($this->group->update("group", $_POST)){
				$this->redirect(array("controller"=>"groups","action"=>"index"));
			}
			else{
				$this->redirect(array("controller"=>"groups","action"=>"edit/".$_POST['$id']));
			}
		}else{
			if(!isset($id)){
				$this->redirect(array("controller"=>"groups","action"=>"index"));
			}
			$group= $this->group->find("groups","first",array(
				"conditions"=>"id=".$id
			));
			if(empty($group)){
				$this->redirect(array("controller"=>"groups","action"=>"index"));
			}
			$this->set("group",$group);
		}
	}
	/**
	* funcion delete
	*
	* Funcion que sirve para eliminar grupos de la base de datos
	* recibe parametro int $id Identifica el grupo a eliminar
	*/
	public function delete($id = null){
		if($_GET){
			$groups = $this->group->delete('groups', 'id = '.$id);
			$this->redirect(array("controller"=>"groups", "action"=>"index"));
		}
	}

}
?>