<?php

class ColumnsController extends Controller
{
	public $defaultAction  ='view';
	
	public function actionView()
	{
		$req = Yii::app() -> request;
		
		$connectionString = $req -> getParam('connectionString');
		
		$arr = array();
		
		var_dump(parse_str($connectionString,$arr));
		
		$origin = "";
		$fullColumns = "";
		$tableSql = "";
		$YiiParams = "";
		
		$this->render('view');
		
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}