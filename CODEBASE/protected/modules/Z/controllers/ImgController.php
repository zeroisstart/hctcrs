<?php
class ImgController extends Controller {
	public $defaultAction = 'list';
	public function actionCreate() {

		$this->render ( 'create' );
		
	}
	public function actionDelete() {
		$this->render ( 'delete' );
	}
	public function actionFactory() {
		$this->render ( 'factory' );
	}
	public function actionList() {
		$model = ZImg::model ();
		$dataProvider = $model->search ();
		
		$args = array ();
		$args ['model'] = $model;
		$args ['dataProvider'] = $dataProvider;
		
		$this->render ( 'list', $args );
	}
	public function actionUpdate() {
		$this->render ( 'update' );
	}
}