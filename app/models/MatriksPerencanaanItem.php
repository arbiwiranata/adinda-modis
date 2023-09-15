<?php

class MatriksPerencanaanItem extends ActiveRecord
{

	public function tableName()
	{
		return 'matriks_perencanaan_item';
	}

	public function rules()
	{
		return array(
			array('matriks_perencanaan_aspek_id, urutan, nama', 'required'),
			array('matriks_perencanaan_aspek_id, matriks_perencanaan_item_id, urutan', 'numerical', 'integerOnly'=>true),
			array('is_pertanyaan', 'safe'),
		);
	}

	public function relations()
	{
		return array(
			'matriksPerencanaanAspek' => array(self::BELONGS_TO, 'MatriksPerencanaanAspek', 'matriks_perencanaan_aspek_id'),
			'matriksPerencanaanItem' => array(self::BELONGS_TO, 'MatriksPerencanaanItem', 'matriks_perencanaan_item_id'),
			'matriksPerencanaanItems' => array(self::HAS_MANY, 'MatriksPerencanaanItem', 'matriks_perencanaan_item_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'matriks_perencanaan_aspek_id' => 'Matriks Perencanaan Aspek',
			'matriks_perencanaan_item_id' => 'Matriks Perencanaan Item',
			'urutan' => 'Urutan',
			'nama' => 'Nama',
			'is_pertanyaan' => 'Is Pertanyaan',
		);
	}

}
