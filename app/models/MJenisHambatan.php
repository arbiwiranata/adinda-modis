<?php

class MJenisHambatan extends ActiveRecord
{

	public function tableName()
	{
		return 'm_jenis_hambatan';
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
			'mHambatans' => array(self::HAS_MANY, 'MHambatan', 'jenis_hambatan_id'),
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
