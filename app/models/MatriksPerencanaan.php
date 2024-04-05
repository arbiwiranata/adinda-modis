<?php

class MatriksPerencanaan extends ActiveRecord
{

	public function tableName()
	{
		return 'matriks_perencanaan';
	}

	public function rules()
	{
		return array(
			array('nama, hambatan_id', 'required'),
			array('hambatan_id', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>256),
			array('is_aktif', 'safe'),
		);
	}

	public function relations()
	{
		return array(
			'matriksPerencanaanAspeks' => array(self::HAS_MANY, 'MatriksPerencanaanAspek', 'matriks_perencanaan_id'),
			'hambatan' => array(self::BELONGS_TO, 'MHambatan', 'hambatan_id'),
			'anakMatriksPerencanaans' => array(self::HAS_MANY, 'AnakMatriksPerencanaan', 'matriks_perencanaan_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama Matriks Perencanaan',
			'hambatan_id' => 'Hambatan',
			'is_aktif' => 'Is Aktif',
		);
	}

}
