<?php

Yii::import("app.modules.admin.forms.master.mHambatan.*");

class MHambatanController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }
    
    public function actionIndex() {
        $this->renderForm('AdminMHambatanIndex');
    }

    public function actionEdit($id = null) {
        if(is_null($id)){
            $model = new AdminMHambatanForm;    
        } else {
            $model = $this->loadModel($id, "AdminMHambatanForm");       
        }
        
        if (isset($_POST["AdminMHambatanForm"])) {
            $model->attributes = $_POST["AdminMHambatanForm"];
            if ($model->save()) {
                $this->flash('Data Berhasil Disimpan');
                $this->redirect(['index']);
            }
        }
        $this->renderForm("AdminMHambatanForm", $model);
    }

    public function actionDelete($id) {
        if (strpos($id, ',') > 0) {
            ActiveRecord::batchDelete("AdminMHambatanForm", explode(",", $id));
            $this->flash('Data Berhasil Dihapus');
        } else {
            $model = $this->loadModel($id, "AdminMHambatanForm");
            if (!is_null($model)) {
                $this->flash('Data Berhasil Dihapus');
                $model->delete();
            }
        }


        $this->redirect(['index']);
    }
    
}
