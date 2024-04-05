<?php

Yii::import("app.modules.admin.forms.intervensi.anakTahunAjar.*");

class AnakTahunAjarController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }
    
    public function actionIndex() {
        $this->renderForm('AdminAnakTahunAjarIndex');
    }

    public function actionEdit($id = null) {
        if(is_null($id)){
            $model = new AdminAnakTahunAjarForm;    
        } else {
            $model = $this->loadModel($id, "AdminAnakTahunAjarForm");       
        }
        
        if (isset($_POST["AdminAnakTahunAjarForm"])) {
            $model->attributes = $_POST["AdminAnakTahunAjarForm"];
            if ($model->save()) {
                $this->flash('Data Berhasil Disimpan');
                $this->redirect(['index']);
            }
        }
        $this->renderForm("AdminAnakTahunAjarForm", $model);
    }

    public function actionDelete($id) {
        if (strpos($id, ',') > 0) {
            ActiveRecord::batchDelete("AdminAnakTahunAjarForm", explode(",", $id));
            $this->flash('Data Berhasil Dihapus');
        } else {
            $model = $this->loadModel($id, "AdminAnakTahunAjarForm");
            if (!is_null($model)) {
                $this->flash('Data Berhasil Dihapus');
                $model->delete();
            }
        }


        $this->redirect(['index']);
    }
    
}
