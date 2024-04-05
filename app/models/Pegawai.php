<?php

class Pegawai extends ActiveRecord
{
    public $jabatan;

	public function tableName()
	{
		return 'pegawai';
	}

	public function rules()
	{
		return array(
			array('nip_nik, nama, jenis_kelamin_id, tempat_lahir, tanggal_lahir, mulai_bekerja, jabatan', 'required'),
			array('nip_nik', 'unique'),
			array('pegawai_id, jenis_kelamin_id', 'numerical', 'integerOnly'=>true),
			array('nip_nik, nama, tempat_lahir', 'length', 'max'=>256),
			array('foto, is_aktif', 'safe'),
		);
	}

	public function relations()
	{
		return array(
			'users' => array(self::HAS_MANY, 'User', 'pegawai_id'),
			'jenisKelamin' => array(self::BELONGS_TO, 'MJenisKelamin', 'jenis_kelamin_id'),
			'pegawaiJabatans' => array(self::HAS_MANY, 'PegawaiJabatan', 'pegawai_id'),
			'anakMatriksPerencanaans' => array(self::HAS_MANY, 'AnakMatriksPerencanaan', 'pegawai_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pegawai_id' => 'Atasan',
			'nip_nik' => 'NIP / NIK',
			'nama' => 'Nama',
			'jenis_kelamin_id' => 'Jenis Kelamin',
			'tempat_lahir' => 'Tempat Lahir',
			'tanggal_lahir' => 'Tanggal Lahir',
			'mulai_bekerja' => 'Mulai Bekerja',
			'foto' => 'Foto',
			'is_aktif' => 'Status',
			'jabatan' => 'Jabatan'
		);
	}
	
	public function afterFind() {
		if(!$this->isNewRecord) {
		    $jabatan = [];
		    foreach(PegawaiJabatan::model()->findAllByAttributes(['pegawai_id' => $this->id]) as $v) {
		        $jabatan[] = $v['jabatan_id'];
		    }
			$this->jabatan = implode(',', $jabatan);
		}

        return true;
    }

}
