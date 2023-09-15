<?php

class PegawaiJabatan extends ActiveRecord
{

	public function tableName()
	{
		return 'pegawai_jabatan';
	}

	public function rules()
	{
		return array(
			array('pegawai_id, jabatan_id', 'required'),
			array('pegawai_id, jabatan_id', 'numerical', 'integerOnly'=>true),
		);
	}

	public function relations()
	{
		return array(
			'pegawai' => array(self::BELONGS_TO, 'Pegawai', 'pegawai_id'),
			'jabatan' => array(self::BELONGS_TO, 'MJabatan', 'jabatan_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pegawai_id' => 'Pegawai',
			'jabatan_id' => 'Jabatan',
		);
	}

}
