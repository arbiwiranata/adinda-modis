<?php

class AnakHambatan extends ActiveRecord
{

	public function tableName()
	{
		return 'anak_hambatan';
	}

	public function rules()
	{
		return array(
			array('anak_id, hambatan_id', 'required'),
			array('anak_id, hambatan_id', 'numerical', 'integerOnly'=>true),
		);
	}

	public function relations()
	{
		return array(
			'anak' => array(self::BELONGS_TO, 'Anak', 'anak_id'),
			'hambatan' => array(self::BELONGS_TO, 'MHambatan', 'hambatan_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'anak_id' => 'Anak',
			'hambatan_id' => 'Hambatan',
		);
	}

}
