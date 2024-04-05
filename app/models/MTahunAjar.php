<?php

class MTahunAjar extends ActiveRecord
{

	public function tableName()
	{
		return 'm_tahun_ajar';
	}

	public function rules()
	{
		return array(
			array('nama, tanggal_mulai, tanggal_selesai', 'required'),
			array('nama', 'length', 'max'=>256),
		);
	}

	public function relations()
	{
		return array(
			'anakTahunAjars' => array(self::HAS_MANY, 'AnakTahunAjar', 'tahun_ajar_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
			'tanggal_mulai' => 'Tanggal Mulai',
			'tanggal_selesai' => 'Tanggal Selesai',
		);
	}

}
