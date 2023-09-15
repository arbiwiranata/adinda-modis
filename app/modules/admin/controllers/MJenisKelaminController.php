<?php

Yii::import("app.modules.admin.forms.master.mJenisKelamin.*");

class MJenisKelaminController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }
    
    public function actionIndex() {
        $this->renderForm('AdminMJenisKelaminIndex');
    }

    public function actionEdit($id) {
        $model = $this->loadModel($id, "AdminMJenisKelaminForm");
        
        if (isset($_POST["AdminMJenisKelaminForm"])) {
            $model->attributes = $_POST["AdminMJenisKelaminForm"];
            if ($model->save()) {
                $this->flash('Data Berhasil Disimpan');
                $this->redirect(['index']);
            }
        }
        $this->renderForm("AdminMJenisKelaminForm", $model);
    }
    
}
