<?php

Yii::import("app.modules.admin.forms.master.matriksPerencanaanAspek.*");

class MatriksPerencanaanAspekController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }

    public function actionEdit($id) {
        $model = $this->loadModel($id, "AdminMatriksPerencanaanAspekForm");
        
        if (isset($_POST["AdminMatriksPerencanaanAspekForm"])) {
            $insert = json_decode($_POST["AdminMatriksPerencanaanAspekForm"]["matriksPerencanaanItemsInsert"], true);
            $update = json_decode($_POST["AdminMatriksPerencanaanAspekForm"]["matriksPerencanaanItemsUpdate"], true);
            foreach($insert as &$item) {
                $item['is_pertanyaan'] = @$item['is_pertanyaan'] == 'Pertanyaan';
            }
            foreach($update as &$item) {
                $item['is_pertanyaan'] = @$item['is_pertanyaan'] == 'Pertanyaan' ? 't' : 'f';
            }
            $_POST["AdminMatriksPerencanaanAspekForm"]["matriksPerencanaanItemsInsert"] = json_encode($insert);
            $_POST["AdminMatriksPerencanaanAspekForm"]["matriksPerencanaanItemsUpdate"] = json_encode($update);
            $model->attributes = $_POST["AdminMatriksPerencanaanAspekForm"];
            if ($model->save()) {
                $this->flash('Data Berhasil Disimpan');
                $this->redirect(['edit', 'id' => $model->id]);
            }
        }
        $this->renderForm("AdminMatriksPerencanaanAspekForm", $model);
    }

    public function actionDelete($id) {
        if (strpos($id, ',') > 0) {
            ActiveRecord::batchDelete("AdminMatriksPerencanaanAspekForm", explode(",", $id));
            $this->flash('Data Berhasil Dihapus');
        } else {
            $model = $this->loadModel($id, "AdminMatriksPerencanaanAspekForm");
            $matriks_id = $model->matriks_perencanaan_id;
            if (!is_null($model)) {
                $this->flash('Data Berhasil Dihapus');
                $model->delete();
            }
        }


        $this->redirect(['matriksPerencanaan/edit', 'id' => $matriks_id]);
    }
    
}
