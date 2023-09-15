<?php

Yii::import("app.modules.admin.forms.master.mTahunAjar.*");

class MTahunAjarController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }
    
    public function actionIndex() {
        $this->renderForm('AdminMTahunAjarIndex');
    }

    public function actionEdit($id = null) {
        if(is_null($id)){
            $model = new AdminMTahunAjarForm;    
        } else {
            $model = $this->loadModel($id, "AdminMTahunAjarForm");       
        }
        
        if (isset($_POST["AdminMTahunAjarForm"])) {
            $model->attributes = $_POST["AdminMTahunAjarForm"];
            if ($model->save()) {
                $this->flash('Data Berhasil Disimpan');
                $this->redirect(['index']);
            }
        }
        $this->renderForm("AdminMTahunAjarForm", $model);
    }

    public function actionDelete($id) {
        if (strpos($id, ',') > 0) {
            ActiveRecord::batchDelete("AdminMTahunAjarForm", explode(",", $id));
            $this->flash('Data Berhasil Dihapus');
        } else {
            $model = $this->loadModel($id, "AdminMTahunAjarForm");
            if (!is_null($model)) {
                $this->flash('Data Berhasil Dihapus');
                $model->delete();
            }
        }


        $this->redirect(['index']);
    }
    
}
