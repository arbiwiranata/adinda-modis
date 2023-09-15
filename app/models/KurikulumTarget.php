<?php

class KurikulumTarget extends ActiveRecord
{

	public function tableName()
	{
		return 'kurikulum_target';
	}

	public function rules()
	{
		return array(
			array('kurikulum_aspek_id, urutan, nama', 'required'),
			array('kurikulum_aspek_id, urutan', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>256),
			array('deskripsi', 'safe'),
		);
	}

	public function relations()
	{
		return array(
			'kurikulumAspek' => array(self::BELONGS_TO, 'KurikulumAspek', 'kurikulum_aspek_id'),
			'kurikulumKegiatans' => array(self::HAS_MANY, 'KurikulumKegiatan', 'kurikulum_target_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'kurikulum_aspek_id' => 'Kurikulum Aspek',
			'urutan' => 'Urutan',
			'nama' => 'Nama Target',
			'deskripsi' => 'Deskripsi Target',
		);
	}

}
