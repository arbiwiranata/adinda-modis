<?php

Yii::import("app.modules.admin.forms.master.mJabatan.*");

class MJabatanController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }
    
    public function actionIndex() {
        $this->renderForm('AdminMJabatanIndex');
    }

    public function actionEdit($id = null) {
        if(is_null($id)){
            $model = new AdminMJabatanForm;    
        } else {
            $model = $this->loadModel($id, "AdminMJabatanForm");       
        }
        
        if (isset($_POST["AdminMJabatanForm"])) {
            $model->attributes = $_POST["AdminMJabatanForm"];
            if ($model->save()) {
                $this->flash('Data Berhasil Disimpan');
                $this->redirect(['index']);
            }
        }
        $this->renderForm("AdminMJabatanForm", $model);
    }

    public function actionDelete($id) {
        if (strpos($id, ',') > 0) {
            ActiveRecord::batchDelete("AdminMJabatanForm", explode(",", $id));
            $this->flash('Data Berhasil Dihapus');
        } else {
            $model = $this->loadModel($id, "AdminMJabatanForm");
            if (!is_null($model)) {
                $this->flash('Data Berhasil Dihapus');
                $model->delete();
            }
        }


        $this->redirect(['index']);
    }
    
}
