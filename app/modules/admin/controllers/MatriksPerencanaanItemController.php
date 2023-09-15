<?php

Yii::import("app.modules.admin.forms.master.matriksPerencanaanItem.*");

class MatriksPerencanaanItemController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }

    public function actionEdit($id) {
        $model = $this->loadModel($id, "AdminMatriksPerencanaanItemForm");
        
        if (isset($_POST["AdminMatriksPerencanaanItemForm"])) {
            $insert = json_decode($_POST["AdminMatriksPerencanaanItemForm"]["matriksPerencanaanItemsInsert"], true);
            $update = json_decode($_POST["AdminMatriksPerencanaanItemForm"]["matriksPerencanaanItemsUpdate"], true);
            foreach($insert as &$item) {
                $item['is_pertanyaan'] = $item['is_pertanyaan'] === 'Pertanyaan' ? 't' : 'f';
            }
            foreach($update as &$item) {
                $item['is_pertanyaan'] = $item['is_pertanyaan'] === 'Pertanyaan' ? 't' : 'f';
            }
            $_POST["AdminMatriksPerencanaanItemForm"]["matriksPerencanaanItemsInsert"] = json_encode($insert);
            $_POST["AdminMatriksPerencanaanItemForm"]["matriksPerencanaanItemsUpdate"] = json_encode($update);
            $model->attributes = $_POST["AdminMatriksPerencanaanItemForm"];
            if ($model->save()) {
                $this->flash('Data Berhasil Disimpan');
                $this->redirect(['edit', 'id' => $model->id]);
            }
        }
        $this->renderForm("AdminMatriksPerencanaanItemForm", $model);
    }

    public function actionDelete($id) {
        if (strpos($id, ',') > 0) {
            ActiveRecord::batchDelete("AdminMatriksPerencanaanItemForm", explode(",", $id));
            $this->flash('Data Berhasil Dihapus');
        } else {
            $model = $this->loadModel($id, "AdminMatriksPerencanaanItemForm");
            if (!is_null($model)) {
                $this->flash('Data Berhasil Dihapus');
                $model->delete();
            }
        }


        $this->redirect(['index']);
    }
    
}
