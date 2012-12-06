<?php

/**
 * 需求控制器
 * @author user
 *
 */
class CaseController extends Controller {
	
	/**
	 *
	 * @var string 默认action 的名字
	 */
	public $defaultAction = 'caseName';
	
	/**
	 * 需求名字的收集
	 */
	public function actionCaseName() {
		$model = new Case_Name ( 'create' );
		if (isset ( $_POST ['Case_Name'] )) {
			$model->attributes = $_POST ['Case_Name'];
			$model->Dateline = time ();
			if ($model->validate ()) {
				$model->save ();
				$model->attributes = array ();
			} else {
				// var_dump ( $model->errors );
			}
		}
		$datas = Case_Name::model ()->search ();
		// var_dump($datas);
		// die;
		$this->render ( 'CaseName', array (
				'model' => $model,
				'data' => $datas 
		) );
	}
	/**
	 *
	 * @param int $id        	
	 */
	public function actionDelete($id) {
		$model = new Case_Name ();
		$model = $model->findByPk ( $id );
		if ($model) {
			$model->delete ();
		}
	}
	/**
	 *
	 * @param int $id        	
	 */
	public function actionUpdate($id) {
		$model = new Case_Name ();
		$model = $model->findByPk ( $id );
		
		if (isset ( $_POST ['Case_Name'] )) {
			$model->attributes = $_POST ['Case_Name'];
			$model->Dateline = time ();
			if ($model) {
				$model->update ();
			} else {
				// var_dump ( $model->errors );
			}
		} else {
			$model = $model->findByPk ( $id );
		}
		if ($model)
			$this->render ( 'CaseName', array (
					'model' => $model 
			) );
	}
	/**
	 *
	 * @param int $id        	
	 */
	public function actioView($id) {
	}
}