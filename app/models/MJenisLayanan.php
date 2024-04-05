<?php

class MJenisLayanan extends ActiveRecord
{

	public function tableName()
	{
		return 'm_jenis_layanan';
	}

	public function rules()
	{
		return array(
			array('nama', 'required'),
			array('nama', 'length', 'max'=>256),
		);
	}

	public function relations()
	{
		return array(
			'anakTahunAjars' => array(self::HAS_MANY, 'AnakTahunAjar', 'jenis_layanan_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
		);
	}

}
