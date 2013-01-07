<?php
class BookmarkController extends Controller {
	public $defaultAction = 'list';
	public $jsFiles = array (
			'list' => array (
					'js/tool/option.widget.js' 
			) 
	);
	public function actionList($id = '') {
		$model = new Bookmark ();
		
		$data = $model->search ();
		
		$request = Yii::app ()->request;
		
		$bookMark = $request->getParam ( 'Bookmark' );
		
		if (! empty ( $bookMark )) {
			$model->attributes = $bookMark;
			$data = $model->search ();
		}
		
		if ($id) {
			$model = $model->findByPk ( $id );
			
			if (! empty ( $bookMark )) {
				$model->attributes = $bookMark;
				$model->validate () && $model->update ();
			}
		}
		
		$this->render ( 'list', array (
				'data' => $data,
				'model' => $model 
		) );
	}
	public function actionDelete($id) {
		$model = new Bookmark ();
		$model = $model->findByPk ( $id );
		$model->delete ();
	}
	public function actionAdd() {
		$request = Yii::app ()->request;
		$model = new Bookmark ();
		$bookMark = $request->getParam ( 'Bookmark' );
		if (! empty ( $bookMark )) {
			$model->attributes = $bookMark;
			$model->Time = time ();
			if ($model->validate ())
				$model->save ();
			else {
				// ar_dump ( $model->errors );
			}
		}
		$this->render ( 'add', array (
				'model' => $model 
		) );
	}
	public function actionUpdate($id = '') {
		$request = Yii::app ()->request;
		$model = new Bookmark ();
		
		$bookMark = $request->getParam ( 'Bookmark' );
		if ($id) {
			$model = $model->findByPk ( $id );
			$model->validate () && $model->update () || $this->err404 ();
		}
		$this->render ( 'update', array (
				'model' => $model 
		) );
	}
	public function err404() {
		echo "test";
	}
	public function actionView($id) {
		$this->actionList ( $id );
	}
}