<?php

class MatriksPerencanaanAspek extends ActiveRecord
{

	public function tableName()
	{
		return 'matriks_perencanaan_aspek';
	}

	public function rules()
	{
		return array(
			array('matriks_perencanaan_id, urutan, nama', 'required'),
			array('matriks_perencanaan_id, urutan', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>256),
		);
	}

	public function relations()
	{
		return array(
			'matriksPerencanaan' => array(self::BELONGS_TO, 'MatriksPerencanaan', 'matriks_perencanaan_id'),
			'matriksPerencanaanItems' => array(self::HAS_MANY, 'MatriksPerencanaanItem', 'matriks_perencanaan_aspek_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'matriks_perencanaan_id' => 'Matriks Perencanaan',
			'urutan' => 'Urutan',
			'nama' => 'Nama Aspek',
		);
	}

}
