<?php

Yii::import("app.modules.admin.forms.master.kurikulum.*");

class KurikulumController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }
    
    public function actionIndex() {
        $this->renderForm('AdminKurikulumIndex');
    }

    public function actionEdit($id = null) {
        if(is_null($id)){
            $model = new AdminKurikulumForm;    
        } else {
            $model = $this->loadModel($id, "AdminKurikulumForm");       
        }
        
        if (isset($_POST["AdminKurikulumForm"])) {
            $model->attributes = $_POST["AdminKurikulumForm"];
            $model->is_aktif = $model->is_aktif == 'Aktif';
            if ($model->save()) {
                $this->flash('Data Berhasil Disimpan');
                $this->redirect(['edit', 'id' => $model->id]);
            }
        }
        $model->is_aktif = $model->is_aktif ? 'Aktif' : 'Non Aktif';
        $this->renderForm("AdminKurikulumForm", $model);
    }

    public function actionDelete($id) {
        if (strpos($id, ',') > 0) {
            ActiveRecord::batchDelete("AdminKurikulumForm", explode(",", $id));
            $this->flash('Data Berhasil Dihapus');
        } else {
            $model = $this->loadModel($id, "AdminKurikulumForm");
            if (!is_null($model)) {
                $this->flash('Data Berhasil Dihapus');
                $model->delete();
            }
        }


        $this->redirect(['index']);
    }
    
}
