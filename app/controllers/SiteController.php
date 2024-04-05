<?php

Yii::import("application.controllers.PsDefaultController");

class SiteController extends PsDefaultController {
    
    public function beforeLogin($model) {}

    public function afterLogin($model) {}

    public function beforeLogout($model) {}

    public function afterLogout($model) {}

    public function actionIndex() {
        if (Yii::app()->user->isGuest) {
            $redir = '';
            if (isset($_GET['redir'])) {
                $redir = '&redir=' . $_GET['redir'];
            }
            
            $this->redirect(array("login" . $redir));
        } else {
            if (is_array(Yii::app()->user->info)) {
                foreach(Yii::app()->user->info['roles'] as $role) {
                    if ($role['role_name'] == Yii::app()->user->info['full_role']) {
                        if (!@$role['home_url']) {
                            $this->redirect(['/docs/welcome']);
                        } else {
                            $this->redirect([$role['home_url']]);
                        }
                    }
                }
            } else {
                $this->redirect(['/site/logout']);
            }
        }
    }
    
    public function actionLogin() {
        if (isset($_GET['redir'])) {
            Yii::app()->user->returnUrl = $_GET['redir'];
        }

        if (!Yii::app()->user->isGuest) {
            $this->redirect(Yii::app()->user->returnUrl);
        }
        $model = new AppLogin;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['AppLogin'])) {
            $model->attributes = $_POST['AppLogin'];
            $this->beforeLogin($model);

            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
            // if ($model->login()) {
                $this->afterLogin($model);

                $lastLogin = DataFilter::toSQLDateTime("'" . date("Y-m-d H:i:s") . "'");
                Yii::app()->session->add('user_cache_time', $lastLogin);
                
                ## update last_login user
                Yii::app()->db->commandBuilder->createUpdateCommand("p_user", [
                    'last_login' => new CDbExpression($lastLogin)
                ], new CDbCriteria([
                    'condition' => '"id" = :p',
                    'params' => [
                        ':p' => Yii::app()->user->id
                    ]
                ]))->execute();
                
                $pegawai = Pegawai::model()->findByPk(Yii::app()->user->info['pegawai_id']);
                $nama = strtoupper($pegawai ? $pegawai['nama'] : Yii::app()->user->info['username']);
                
                // $this->flash('Selamat Datang, ' . $nama);
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }

        // display the login form
        $this->renderForm('AppLogin', $model, [], [
            'pageTitle' =>  "Login | " . Setting::get("app.name"), 'layout' => '/layouts/new/blank'
        ]);
    }
	
}
