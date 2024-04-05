<?php

class MAssessment extends ActiveRecord
{

	public function tableName()
	{
		return 'm_assessment';
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
			'anakAssessments' => array(self::HAS_MANY, 'AnakAssessment', 'assessment_id'),
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
