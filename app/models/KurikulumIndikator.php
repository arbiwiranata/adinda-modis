<?php

class KurikulumIndikator extends ActiveRecord
{

	public function tableName()
	{
		return 'kurikulum_indikator';
	}

	public function rules()
	{
		return array(
			array('kurikulum_kegiatan_id, urutan, nama', 'required'),
			array('kurikulum_kegiatan_id, urutan', 'numerical', 'integerOnly'=>true),
		);
	}

	public function relations()
	{
		return array(
			'kurikulumKegiatan' => array(self::BELONGS_TO, 'KurikulumKegiatan', 'kurikulum_kegiatan_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'kurikulum_kegiatan_id' => 'Kurikulum Kegiatan',
			'urutan' => 'Urutan',
			'nama' => 'Nama Indikator',
		);
	}

}
