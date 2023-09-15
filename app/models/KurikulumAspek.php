<?php

class KurikulumAspek extends ActiveRecord
{

	public function tableName()
	{
		return 'kurikulum_aspek';
	}

	public function rules()
	{
		return array(
			array('kurikulum_id, urutan, nama', 'required'),
			array('kurikulum_id, urutan', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>256),
		);
	}

	public function relations()
	{
		return array(
			'kurikulum' => array(self::BELONGS_TO, 'Kurikulum', 'kurikulum_id'),
			'kurikulumTargets' => array(self::HAS_MANY, 'KurikulumTarget', 'kurikulum_aspek_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'kurikulum_id' => 'Kurikulum',
			'urutan' => 'Urutan',
			'nama' => 'Nama Aspek',
		);
	}

}
