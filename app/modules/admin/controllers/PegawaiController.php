<?php

Yii::import("app.modules.admin.forms.user.pegawai.*");

class PegawaiController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }
    
    public function actionIndex() {
        $this->renderForm('AdminPegawaiIndex');
    }

    public function actionEdit($id = null) {
        if(is_null($id)){
            $model = new AdminPegawaiForm;    
        } else {
            $model = $this->loadModel($id, "AdminPegawaiForm");       
        }
        
        if (isset($_POST["AdminPegawaiForm"])) {
            $txn = Yii::app()->db->beginTransaction();
            $model->attributes = $_POST["AdminPegawaiForm"];
            $model->foto = str_replace('\\', '/', $model->foto);
            $model->is_aktif = $model->is_aktif == 'Aktif';
            
            if ($model->save()) {
                $new = $old = [];
                foreach(explode(',', $model->jabatan) as $v) {
					$new[] = [
						'id' => @PegawaiJabatan::model()->findByAttributes(['pegawai_id' => $model->id, 'jabatan_id' => $v])['id'],
						'pegawai_id' => $model->id,
						'jabatan_id' => $v
					];
                }
                foreach(PegawaiJabatan::model()->findAllByAttributes(['pegawai_id' => $model->id]) as $v) {
                    $old[] = [
                        'id' => $v['id']
                    ];
                }
				$pegawaiJabatan = ActiveRecord::batch("PegawaiJabatan", $new, $old, true);
				
				$user = User::model()->findByAttributes(['pegawai_id' => $model->id]);
				if(!$user) {
				    $user = new User;
				    $user->email = 'sample@sample.com';
				    $user->username = $model->nip_nik;
				    $user->password = Helper::Hash($user->username);
				    $user->pegawai_id = $model->id;
				    $user->save();
				}
				$newUser = $oldUser = [];
				foreach(explode(',', $model->jabatan) as $k => $v) {
			        $role = Role::model()->findByAttributes(['jabatan_id' => $v]);
			        if($role) {
			            $newUser[] = [
    						'id' => @UserRole::model()->findByAttributes(['user_id' => $user->id, 'role_id' => $role->id])['id'],
    						'user_id' => $user->id,
    						'role_id' => $role->id,
    						'is_default_role' => $k == 0 ? 'Yes' : 'No'
    					];
			        }
			    }
			    foreach(UserRole::model()->findAllByAttributes(['user_id' => $user->id]) as $v) {
                    $oldUser[] = [
                        'id' => $v['id']
                    ];
                }
				$userRole = ActiveRecord::batch("UserRole", $newUser, $oldUser, true);
				
                if($pegawaiJabatan && $userRole) {
                    $txn->commit();
                    $this->flash('Data Berhasil Disimpan');
                    $this->redirect(['index']);
                }
            }
        }
        $model->is_aktif = $model->is_aktif ? 'Aktif' : 'Non Aktif';
        $this->renderForm("AdminPegawaiForm", $model);
    }
    
    public function actionReset($id) {
        $model = $this->loadModel($id, "AdminPegawaiForm");
        $user = User::model()->findByAttributes(['pegawai_id' => $model->id]);
        $user->password = Helper::Hash($user->username);
        $user->save();
        $this->flash('Reset Password Berhasil');
        $this->redirect(['index']);
    }

    public function actionDelete($id) {
        if (strpos($id, ',') > 0) {
            ActiveRecord::batchDelete("AdminPegawaiForm", explode(",", $id));
            $this->flash('Data Berhasil Dihapus');
        } else {
            $model = $this->loadModel($id, "AdminPegawaiForm");
            if (!is_null($model)) {
                @unlink(Yii::getPathOfAlias('webroot') . '/' . $model->foto);
                $this->flash('Data Berhasil Dihapus');
                $model->delete();
            }
        }


        $this->redirect(['index']);
    }
    
}
