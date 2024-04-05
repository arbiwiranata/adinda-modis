<?php

class MAgama extends ActiveRecord
{

	public function tableName()
	{
		return 'm_agama';
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
			'anaks' => array(self::HAS_MANY, 'Anak', 'agama_id'),
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
