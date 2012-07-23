<?php

/**
 * 需求控制器
 * @author user
 *
 */
class CaseController extends Controller {

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
               var_dump ( $model->errors );
            }
        }
        $datas = Case_Name::model()->findAll();
        $this->render ( 'CaseName', array (
                'model' => $model,
                'data' => $datas
        ) );
    }
}