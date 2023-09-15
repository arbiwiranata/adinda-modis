<?php

class MHambatan extends ActiveRecord
{

	public function tableName()
	{
		return 'm_hambatan';
	}

	public function rules()
	{
		return array(
			array('jenis_hambatan_id, nama', 'required'),
			array('jenis_hambatan_id', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>256),
		);
	}

	public function relations()
	{
		return array(
			'kurikulums' => array(self::HAS_MANY, 'Kurikulum', 'hambatan_id'),
			'jenisHambatan' => array(self::BELONGS_TO, 'MJenisHambatan', 'jenis_hambatan_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'jenis_hambatan_id' => 'Jenis Hambatan',
			'nama' => 'Nama',
		);
	}

}
