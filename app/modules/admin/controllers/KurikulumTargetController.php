<?php

Yii::import("app.modules.admin.forms.master.kurikulumTarget.*");

class KurikulumTargetController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }

    public function actionEdit($id) {
        $model = $this->loadModel($id, "AdminKurikulumTargetForm");
        $params = [];
        if (isset($_POST["AdminKurikulumTargetForm"])) {
            $model->attributes = $_POST["AdminKurikulumTargetForm"];
            if ($model->save()) {
                $this->flash('Data Berhasil Disimpan');
                $this->redirect(['edit', 'id' => $model->id]);
            }
        }
        $params['target'] = $model->attributes;
        $params['aspek'] = $model->kurikulumAspek;
        $params['kurikulum'] = Kurikulum::model()->findByPk($params['aspek']['kurikulum_id'])->attributes;
        $params['kurikulum']['is_aktif'] = $params['kurikulum']['is_aktif'] ? 'Aktif' : 'Non Aktif';
        $params['kurikulum']['hambatan'] = MHambatan::model()->findByPk($params['kurikulum']['hambatan_id'])['nama'];
        
        $this->renderForm("AdminKurikulumTargetForm", $model, $params);
    }

    public function actionDelete($id) {
        if (strpos($id, ',') > 0) {
            ActiveRecord::batchDelete("AdminKurikulumTargetForm", explode(",", $id));
            $this->flash('Data Berhasil Dihapus');
        } else {
            $model = $this->loadModel($id, "AdminKurikulumTargetForm");
            $aspek_id = $model->kurikulum_aspek_id;
            if (!is_null($model)) {
                $this->flash('Data Berhasil Dihapus');
                $model->delete();
            }
        }


        $this->redirect(['kurikulumAspek/edit', 'id' => $aspek_id]);
    }
    
}
