<?php

class TestController extends Controller
{
	public function actionIndex()
	{
		echo call_user_func('md5','zero');
		call_user_func(array($this,'zero'),'one','two','three');
		call_user_func_array(array($this,'zero'),array('one','two','three'));
		//$this->render('index');
	}
	
	public function zero($arg1,$arg2,$arg3){
		echo $arg1,$arg2,$arg3;
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