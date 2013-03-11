<?php
class ColumnsController extends Controller {
	private $connectionString = array (
			'localhost' => array (
					'connectionString' => 'mysql:host=localhost;dbname={dbname}',
					'emulatePrepare' => true,
					'username' => 'root',
					'password' => '',
					'charset' => 'utf8'
			),
			'30' => array (
					'connectionString' => 'mysql:host=root;dbname={dbname}',
					'emulatePrepare' => true,
					'username' => 'root',
					'password' => '',
					'charset' => 'utf8' 
			),
			'102' => array (
					'connectionString' => 'mysql:host=localhost;dbname={dbname};prot:8082',
					'emulatePrepare' => true,
					'username' => 'root',
					'password' => '',
					'charset' => 'utf8' 
			),
	);
	public $defaultAction = 'view';
	
	/**
	 * 显示连接的数据库
	 */
	public function actionView() {
		$req = Yii::app ()->request;

		$connectionString = $req->getParam ( 'connectionString' );
		$database = $req -> getParam('database');
		$table = $req -> getParam('table');
		if(isset($this -> connectionString[$connectionString])){
			$connectionParams = $this -> connectionString[$connectionString];
		}else{
			$connectionParams = $this -> connectionString['localhost'];
		}
		$db = Yii::app() -> db;
		
		if($database){
			$connectionParams['connectionString'] = str_replace('{dbname}', $database, $connectionParams['connectionString']);
		}else{
			$connectionParams['connectionString'] = str_replace('{dbname}', 'test', $connectionParams['connectionString']);
		}
		
		foreach($connectionParams as $k=>$v){
			$db -> $k = $v;
		}
		
		$db -> setActive(false);
		
		$tbls = array ();
		$dbs = array();


		//数据库链接的切换
		
		if($database){
			$queryCommand = $db -> createCommand("SHOW TABLES");
			$data = $queryCommand -> queryAll();
			foreach ($data as $tbl){
				$tbls[reset($tbl)]= reset($tbl);
			}
		}
		//获取所有的数据库
		
		$queryCommand = $db -> createCommand("SHOW DATABASES");
		$data = $queryCommand -> queryAll();
		foreach($data as $key => $val){
			$dbs[$val['Database']] = $val['Database'];
		}
		
		$columns = array();
		
		if($table){
			$queryCommand = $db -> createCommand("SHOW FULL COLUMNS FROM ". $table);
			$data = $queryCommand -> queryAll();
			$keys = array();
			foreach ($data as $field){
				$keys[] = $field['Field'];
			}
			$columns['keys'] = $keys;
		}
		
		
		$arr = array ();
		$arr ['connectionString'] = $this->connectionString;
		$arr ['database'] = $database;
		$arr ['table'] = $table;
		$arr ['tbls'] = $tbls;
		$arr ['dbs'] = $dbs;
		$arr ['column'] = $columns ; 
		
		$this->render ( 'view', $arr );
	}
}