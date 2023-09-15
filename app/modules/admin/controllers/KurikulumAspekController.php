<?php

Yii::import("app.modules.admin.forms.master.kurikulumAspek.*");

class KurikulumAspekController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }

    public function actionEdit($id) {
        $model = $this->loadModel($id, "AdminKurikulumAspekForm");       
        $params = [];
        if (isset($_POST["AdminKurikulumAspekForm"])) {
            $model->attributes = $_POST["AdminKurikulumAspekForm"];
            if ($model->save()) {
                $this->flash('Data Berhasil Disimpan');
                $this->redirect(['edit', 'id' => $model->id]);
            }
        }
        $params['aspek'] = $model->attributes;
        $params['kurikulum'] = $model->kurikulum;
        $params['kurikulum']['is_aktif'] = $params['kurikulum']['is_aktif'] ? 'Aktif' : 'Non Aktif';
        $params['kurikulum']['hambatan'] = MHambatan::model()->findByPk($model->kurikulum['hambatan_id'])['nama'];
        
        $this->renderForm("AdminKurikulumAspekForm", $model, $params);
    }

    public function actionDelete($id) {
        if (strpos($id, ',') > 0) {
            ActiveRecord::batchDelete("AdminKurikulumAspekForm", explode(",", $id));
            $this->flash('Data Berhasil Dihapus');
        } else {
            $model = $this->loadModel($id, "AdminKurikulumAspekForm");
            $kurikulum_id = $model->kurikulum_id;
            if (!is_null($model)) {
                $this->flash('Data Berhasil Dihapus');
                $model->delete();
            }
        }


        $this->redirect(['kurikulum/edit', 'id' => $kurikulum_id]);
    }
    
}
