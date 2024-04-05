<?php

class AnakMatriksPerencanaanNilai extends ActiveRecord
{

	public function tableName()
	{
		return 'anak_matriks_perencanaan_nilai';
	}

	public function rules()
	{
		return array(
			array('anak_matriks_perencanaan_id', 'required'),
			array('anak_matriks_perencanaan_id, matriks_perencanaan_item_id', 'numerical', 'integerOnly'=>true),
			array('nilai', 'length', 'max'=>1),
			array('diagnosa, karateristik, dampak, strategi', 'safe'),
		);
	}

	public function relations()
	{
		return array(
			'matriksPerencanaanItem' => array(self::BELONGS_TO, 'MatriksPerencanaanItem', 'matriks_perencanaan_item_id'),
			'anakMatriksPerencanaan' => array(self::BELONGS_TO, 'AnakMatriksPerencanaan', 'anak_matriks_perencanaan_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'anak_matriks_perencanaan_id' => 'Anak Matriks Perencanaan',
			'matriks_perencanaan_item_id' => 'Matriks Perencanaan Item',
			'nilai' => 'Nilai',
			'diagnosa' => 'Diagnosa',
			'karateristik' => 'Karateristik',
			'dampak' => 'Dampak',
			'strategi' => 'Strategi',
		);
	}

}
