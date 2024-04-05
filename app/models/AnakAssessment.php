<?php

class AnakAssessment extends ActiveRecord
{

	public function tableName()
	{
		return 'anak_assessment';
	}

	public function rules()
	{
		return array(
			array('anak_id, assessment_id, judul_assessment, file', 'required'),
			array('anak_id, assessment_id', 'numerical', 'integerOnly'=>true),
		);
	}

	public function relations()
	{
		return array(
			'anak' => array(self::BELONGS_TO, 'Anak', 'anak_id'),
			'assessment' => array(self::BELONGS_TO, 'MAssessment', 'assessment_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'anak_id' => 'Anak',
			'assessment_id' => 'Assessment',
			'judul_assessment' => 'Judul Assessment',
			'file' => 'File',
		);
	}

}
