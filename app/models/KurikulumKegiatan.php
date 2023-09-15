<?php

class KurikulumKegiatan extends ActiveRecord
{

	public function tableName()
	{
		return 'kurikulum_kegiatan';
	}

	public function rules()
	{
		return array(
			array('kurikulum_target_id, urutan, nama', 'required'),
			array('kurikulum_target_id, urutan', 'numerical', 'integerOnly'=>true),
		);
	}

	public function relations()
	{
		return array(
			'kurikulumTarget' => array(self::BELONGS_TO, 'KurikulumTarget', 'kurikulum_target_id'),
			'kurikulumIndikators' => array(self::HAS_MANY, 'KurikulumIndikator', 'kurikulum_kegiatan_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'kurikulum_target_id' => 'Kurikulum Target',
			'urutan' => 'Urutan',
			'nama' => 'Nama Kegiatan',
		);
	}

}
