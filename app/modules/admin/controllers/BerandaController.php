<?php

class BerandaController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }
    
    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']], ['deny']];
    }
    
    public function actionIndex() {
        $this->renderForm('AdminBeranda', null, [], [
            'pageTitle' =>  "Beranda | " . Setting::get("app.name"), 'layout' => '//layouts/new/blank'
        ]);
    }

}