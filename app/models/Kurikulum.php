<?php

class Kurikulum extends ActiveRecord
{

	public function tableName()
	{
		return 'kurikulum';
	}

	public function rules()
	{
		return array(
			array('hambatan_id, nama', 'required'),
			array('hambatan_id', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>256),
			array('is_aktif', 'safe'),
		);
	}

	public function relations()
	{
		return array(
			'hambatan' => array(self::BELONGS_TO, 'MHambatan', 'hambatan_id'),
			'kurikulumAspeks' => array(self::HAS_MANY, 'KurikulumAspek', 'kurikulum_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hambatan_id' => 'Hambatan',
			'nama' => 'Nama Kurikulum',
			'is_aktif' => 'Is Aktif',
		);
	}

}
