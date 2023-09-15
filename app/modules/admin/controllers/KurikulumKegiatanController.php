<?php

Yii::import("app.modules.admin.forms.master.kurikulumKegiatan.*");

class KurikulumKegiatanController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }

    public function actionEdit($id) {
        $model = $this->loadModel($id, "AdminKurikulumKegiatanForm");
        $params = [];
        if (isset($_POST["AdminKurikulumKegiatanForm"])) {
            $model->attributes = $_POST["AdminKurikulumKegiatanForm"];
            if ($model->save()) {
                $this->flash('Data Berhasil Disimpan');
                $this->redirect(['edit', 'id' => $model->id]);
            }
        }
        $params['kegiatan'] = $model->attributes;
        $params['target'] = $model->kurikulumTarget;
        $params['aspek'] = KurikulumAspek::model()->findByPk($params['target']['kurikulum_aspek_id'])->attributes;
        $params['kurikulum'] = Kurikulum::model()->findByPk($params['aspek']['kurikulum_id'])->attributes;
        $params['kurikulum']['is_aktif'] = $params['kurikulum']['is_aktif'] ? 'Aktif' : 'Non Aktif';
        $params['kurikulum']['hambatan'] = MHambatan::model()->findByPk($params['kurikulum']['hambatan_id'])['nama'];
        
        $this->renderForm("AdminKurikulumKegiatanForm", $model, $params);
    }

    public function actionDelete($id) {
        if (strpos($id, ',') > 0) {
            ActiveRecord::batchDelete("AdminKurikulumKegiatanForm", explode(",", $id));
            $this->flash('Data Berhasil Dihapus');
        } else {
            $model = $this->loadModel($id, "AdminKurikulumKegiatanForm");
            $target_id = $model->kurikulum_target_id;
            if (!is_null($model)) {
                $this->flash('Data Berhasil Dihapus');
                $model->delete();
            }
        }


        $this->redirect(['kurikulumTarget/edit', 'id' => $target_id]);
    }
    
}
