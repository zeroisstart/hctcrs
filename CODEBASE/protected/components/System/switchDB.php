<?php
/**
 * 
 * @author Top
 *
 */
class switchDB extends CComponent {
	
	/**
	 *
	 * @var array
	 */
	public $defaultConfig = array (
			'connectionString' => 'mysql:host=localhost;dbname=CodeBase',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8' 
	);
	
	/**
	 */
	public function init() {
		$db = Yii::app ()->db;
	}
	
	/**
	 *
	 * @return boolean
	 */
	public function swch(array $args) {
		$db = Yii::app ()->db;
		foreach ( $args as $key => $val ) {
			$db->$key = $val;
		}
		return $db->setActive ( false );
	}
	
	/**
	 * 
	 */
	public function resetDB(){
		$db = Yii::app() -> db ;
		foreach($this -> defaultConfig as $key => $val){
			$db -> $key = $val;
		}
		$db -> setActive(false);
		return true;
	} 
}