<?php

class ResourceController extends Controller {
    
    /**
     * 文件上传管理
     */
    public function actionUpload() {
        $model = new Soft_Resource ();
        if (! empty ( $_POST )) {
            $model ->attributes = $_POST['Soft_Resource'];
            $file=CUploadedFile::getInstance($model,'PATH_CG');
        }
        $this->render ( 'upload', array (
                'model' => $model
        ) );
    }
    
    public function actionType() {
        
        $model = new Soft_Type ();
        
        if (isset ( $_POST ['Soft_Type'] )) {
            $model->attributes = $_POST ['Soft_Type'];
            if ($model->validate ()) {
                $model->save ();
            } else {
                var_dump ( $model->Errors );
            }
        }
        $types = Soft_Type::model ()->search ()->data;
        $this->render ( 'Type', array (
                'model' => $model,
                'types' => $types
        ) );
    }

}