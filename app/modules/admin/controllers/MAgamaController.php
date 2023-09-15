<?php

Yii::import("app.modules.admin.forms.master.mAgama.*");

class MAgamaController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }
    
    public function actionIndex() {
        $this->renderForm('AdminMAgamaIndex');
    }

    public function actionEdit($id = null) {
        if(is_null($id)){
            $model = new AdminMAgamaForm;    
        } else {
            $model = $this->loadModel($id, "AdminMAgamaForm");       
        }
        
        if (isset($_POST["AdminMAgamaForm"])) {
            $model->attributes = $_POST["AdminMAgamaForm"];
            if ($model->save()) {
                $this->flash('Data Berhasil Disimpan');
                $this->redirect(['index']);
            }
        }
        $this->renderForm("AdminMAgamaForm", $model);
    }

    public function actionDelete($id) {
        if (strpos($id, ',') > 0) {
            ActiveRecord::batchDelete("AdminMAgamaForm", explode(",", $id));
            $this->flash('Data Berhasil Dihapus');
        } else {
            $model = $this->loadModel($id, "AdminMAgamaForm");
            if (!is_null($model)) {
                $this->flash('Data Berhasil Dihapus');
                $model->delete();
            }
        }


        $this->redirect(['index']);
    }
    
}
