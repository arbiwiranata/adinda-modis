<?php

Yii::import("app.modules.admin.forms.intervensi.anak.*");

class AnakController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }
    
    public function actionIndex() {
        $this->renderForm('AdminAnakIndex');
    }

    public function actionEdit($id = null) {
        if(is_null($id)){
            $model = new AdminAnakForm;    
        } else {
            $model = $this->loadModel($id, "AdminAnakForm");       
        }
        
        if (isset($_POST["AdminAnakForm"])) {
            $txn = Yii::app()->db->beginTransaction();
            $insert = json_decode($_POST["AdminAnakForm"]["anakAssessmentsInsert"], true);
            $update = json_decode($_POST["AdminAnakForm"]["anakAssessmentsUpdate"], true);
            foreach($insert as &$item) {
                $item['file'] = str_replace('\\', '/', @$item['file']);
            }
            foreach($update as &$item) {
                $item['file'] = str_replace('\\', '/', @$item['file']);
            }
            $_POST["AdminAnakForm"]["anakAssessmentsInsert"] = json_encode($insert);
            $_POST["AdminAnakForm"]["anakAssessmentsUpdate"] = json_encode($update);
            $model->attributes = $_POST["AdminAnakForm"];
            $model->foto = str_replace('\\', '/', $model->foto);
            $model->kk_file = str_replace('\\', '/', $model->kk_file);
            $model->ktp_ortu_file = str_replace('\\', '/', $model->ktp_ortu_file);
            $model->domisili_file = str_replace('\\', '/', $model->domisili_file);
            $model->is_aktif = $model->is_aktif == 'Aktif';
            
            if ($model->save()) {
                $new = $old = [];
                foreach(explode(',', $model->hambatan) as $v) {
					$new[] = [
						'id' => @AnakHambatan::model()->findByAttributes(['anak_id' => $model->id, 'hambatan_id' => $v])['id'],
						'anak_id' => $model->id,
						'hambatan_id' => $v
					];
                }
                foreach(AnakHambatan::model()->findAllByAttributes(['anak_id' => $model->id]) as $v) {
                    $old[] = [
                        'id' => $v['id']
                    ];
                }
				$anakHambatan = ActiveRecord::batch("AnakHambatan", $new, $old, true);
				
				$user = User::model()->findByAttributes(['anak_id' => $model->id]);
				if(!$user) {
				    $user = new User;
				    $user->email = 'sample@sample.com';
				    $user->username = $model->nik;
				    $user->password = Helper::Hash($user->username);
				    $user->anak_id = $model->id;
				    $user->save();
				}
				$userRole = UserRole::model()->findByAttributes(['user_id' => $user->id, 'role_id' => '9']);
				if(!$userRole) {
				    $userRole = new UserRole;
				    $userRole->user_id = $user->id;
				    $userRole->role_id = 9;
				    $userRole->is_default_role = 'Yes';
				    $userRole->save();
				}
				
				if($anakHambatan) {
                    $txn->commit();
                    $this->flash('Data Berhasil Disimpan');
                    $this->redirect(['index']);
				}
            }
        }
        $model->is_aktif = $model->is_aktif ? 'Aktif' : 'Non Aktif';
        $this->renderForm("AdminAnakForm", $model);
    }

    public function actionDelete($id) {
        if (strpos($id, ',') > 0) {
            ActiveRecord::batchDelete("AdminAnakForm", explode(",", $id));
            $this->flash('Data Berhasil Dihapus');
        } else {
            $model = $this->loadModel($id, "AdminAnakForm");
            if (!is_null($model)) {
                $this->flash('Data Berhasil Dihapus');
                $model->delete();
            }
        }


        $this->redirect(['index']);
    }
    
}
