<?php

Yii::import("app.modules.admin.forms.user.admin.*");

class AdminController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }
    
    public function actionIndex() {
        $this->renderForm('AdminAdminIndex');
    }

    public function actionEdit() {
        $model = new AdminAdminForm;
        
        if (isset($_POST["AdminAdminForm"])) {
            $user = User::model()->findByAttributes(['pegawai_id' => $_POST["AdminAdminForm"]['pegawai_id']]);
            $userRole = new UserRole;
            $userRole->user_id = $user->id;
            $userRole->role_id = 2;
            
            if ($userRole->save()) {
                $this->flash('Data Berhasil Disimpan');
                $this->redirect(['index']);
            }
        }
        $this->renderForm("AdminAdminForm", $model);
    }

    public function actionDelete($id) {
        if (strpos($id, ',') > 0) {
            ActiveRecord::batchDelete("AdminAdminForm", explode(",", $id));
            $this->flash('Data Berhasil Dihapus');
        } else {
            $model = User::model()->findByAttributes(['pegawai_id' => $id]);
            if (!is_null($model)) {
                $this->flash('Data Berhasil Dihapus');
                UserRole::model()->deleteAllByAttributes(['user_id' => $model['id'], 'role_id' => 2]);
            }
        }


        $this->redirect(['index']);
    }
    
}
