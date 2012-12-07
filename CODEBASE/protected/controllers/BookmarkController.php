<?php
class BookmarkController extends Controller {
	public function actionList($id = '') {
		$model = new Bookmark ();
		
		$data = $model->search ();
		
		if ($id) {
			$model = $model->findByPk ( $id );
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
	public function actionUpdate($id) {
		$this->actionList ( $id );
	}
}