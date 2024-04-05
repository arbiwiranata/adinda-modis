<?php

Yii::import("app.modules.admin.forms.user.*");

class OrangTuaController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }
    
    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']], ['deny']];
    }
    
    public function actionIndex() {
        $this->renderForm('AdminUserOrangTua');
    }
    
    public function actionReset($id) {
        $model = $this->loadModel($id, "AdminUserOrangTua");
        $user = User::model()->findByAttributes(['anak_id' => $model->id]);
        $user->password = Helper::Hash($user->username);
        $user->save();
        $this->flash('Reset Password Berhasil');
        $this->redirect(['index']);
    }

}