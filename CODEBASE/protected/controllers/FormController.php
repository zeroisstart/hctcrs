<?php

class FormController extends Controller
{
	public function actionIndex()
	{
		$postForm = <<<EOT
<form id="post_form" action="http://www.yiban.cn/activity/act_upload.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="uploadfile">
	<input type="submit"/>
</form>		
		
EOT;
		
		$this->render('index');
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