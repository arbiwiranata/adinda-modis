<?php

Yii::import("app.modules.admin.forms.master.mJenisLayanan.*");

class MJenisLayananController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }
    
    public function actionIndex() {
        $this->renderForm('AdminMJenisLayananIndex');
    }

    public function actionEdit($id = null) {
        if(is_null($id)){
            $model = new AdminMJenisLayananForm;    
        } else {
            $model = $this->loadModel($id, "AdminMJenisLayananForm");       
        }
        
        if (isset($_POST["AdminMJenisLayananForm"])) {
            $model->attributes = $_POST["AdminMJenisLayananForm"];
            if ($model->save()) {
                $this->flash('Data Berhasil Disimpan');
                $this->redirect(['index']);
            }
        }
        $this->renderForm("AdminMJenisLayananForm", $model);
    }

    public function actionDelete($id) {
        if (strpos($id, ',') > 0) {
            ActiveRecord::batchDelete("AdminMJenisLayananForm", explode(",", $id));
            $this->flash('Data Berhasil Dihapus');
        } else {
            $model = $this->loadModel($id, "AdminMJenisLayananForm");
            if (!is_null($model)) {
                $this->flash('Data Berhasil Dihapus');
                $model->delete();
            }
        }


        $this->redirect(['index']);
    }
    
}
