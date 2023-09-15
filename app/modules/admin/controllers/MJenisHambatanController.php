<?php

Yii::import("app.modules.admin.forms.master.mJenisHambatan.*");

class MJenisHambatanController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }
    
    public function actionIndex() {
        $this->renderForm('AdminMJenisHambatanIndex');
    }

    public function actionEdit($id = null) {
        if(is_null($id)){
            $model = new AdminMJenisHambatanForm;    
        } else {
            $model = $this->loadModel($id, "AdminMJenisHambatanForm");       
        }
        
        if (isset($_POST["AdminMJenisHambatanForm"])) {
            $model->attributes = $_POST["AdminMJenisHambatanForm"];
            if ($model->save()) {
                $this->flash('Data Berhasil Disimpan');
                $this->redirect(['index']);
            }
        }
        $this->renderForm("AdminMJenisHambatanForm", $model);
    }

    public function actionDelete($id) {
        if (strpos($id, ',') > 0) {
            ActiveRecord::batchDelete("AdminMJenisHambatanForm", explode(",", $id));
            $this->flash('Data Berhasil Dihapus');
        } else {
            $model = $this->loadModel($id, "AdminMJenisHambatanForm");
            if (!is_null($model)) {
                $this->flash('Data Berhasil Dihapus');
                $model->delete();
            }
        }


        $this->redirect(['index']);
    }
    
}
