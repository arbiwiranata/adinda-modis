<?php

Yii::import("app.modules.admin.forms.master.matriksPerencanaan.*");

class MatriksPerencanaanController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }
    
    public function actionIndex() {
        $this->renderForm('AdminMatriksPerencanaanIndex');
    }

    public function actionEdit($id = null) {
        if(is_null($id)){
            $model = new AdminMatriksPerencanaanForm;    
        } else {
            $model = $this->loadModel($id, "AdminMatriksPerencanaanForm");       
        }
        
        if (isset($_POST["AdminMatriksPerencanaanForm"])) {
            $model->attributes = $_POST["AdminMatriksPerencanaanForm"];
            $model->is_aktif = $model->is_aktif == 'Aktif';
            if ($model->save()) {
                $this->flash('Data Berhasil Disimpan');
                $this->redirect(['edit', 'id' => $model->id]);
            }
        }
        $model->is_aktif = $model->is_aktif ? 'Aktif' : 'Non Aktif';
        $this->renderForm("AdminMatriksPerencanaanForm", $model);
    }

    public function actionDelete($id) {
        if (strpos($id, ',') > 0) {
            ActiveRecord::batchDelete("AdminMatriksPerencanaanForm", explode(",", $id));
            $this->flash('Data Berhasil Dihapus');
        } else {
            $model = $this->loadModel($id, "AdminMatriksPerencanaanForm");
            if (!is_null($model)) {
                $this->flash('Data Berhasil Dihapus');
                $model->delete();
            }
        }


        $this->redirect(['index']);
    }
    
}
