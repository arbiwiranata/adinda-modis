<?php

Yii::import("app.modules.admin.forms.master.mAssessment.*");

class MAssessmentController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }
    
    public function actionIndex() {
        $this->renderForm('AdminMAssessmentIndex');
    }

    public function actionEdit($id = null) {
        if(is_null($id)){
            $model = new AdminMAssessmentForm;    
        } else {
            $model = $this->loadModel($id, "AdminMAssessmentForm");       
        }
        
        if (isset($_POST["AdminMAssessmentForm"])) {
            $model->attributes = $_POST["AdminMAssessmentForm"];
            if ($model->save()) {
                $this->flash('Data Berhasil Disimpan');
                $this->redirect(['index']);
            }
        }
        $this->renderForm("AdminMAssessmentForm", $model);
    }

    public function actionDelete($id) {
        if (strpos($id, ',') > 0) {
            ActiveRecord::batchDelete("AdminMAssessmentForm", explode(",", $id));
            $this->flash('Data Berhasil Dihapus');
        } else {
            $model = $this->loadModel($id, "AdminMAssessmentForm");
            if (!is_null($model)) {
                $this->flash('Data Berhasil Dihapus');
                $model->delete();
            }
        }


        $this->redirect(['index']);
    }
    
}
