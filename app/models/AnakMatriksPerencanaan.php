<?php

class AnakMatriksPerencanaan extends ActiveRecord
{

	public function tableName()
	{
		return 'anak_matriks_perencanaan';
	}

	public function rules()
	{
		return array(
			array('anak_tahun_ajar_id, pegawai_id, jabatan_id', 'required'),
			array('anak_tahun_ajar_id, matriks_perencanaan_id, pegawai_id, jabatan_id', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>3),
		);
	}

	public function relations()
	{
		return array(
			'anakTahunAjar' => array(self::BELONGS_TO, 'AnakTahunAjar', 'anak_tahun_ajar_id'),
			'matriksPerencanaan' => array(self::BELONGS_TO, 'MatriksPerencanaan', 'matriks_perencanaan_id'),
			'pegawai' => array(self::BELONGS_TO, 'Pegawai', 'pegawai_id'),
			'jabatan' => array(self::BELONGS_TO, 'MJabatan', 'jabatan_id'),
			'anakMatriksPerencanaanNilais' => array(self::HAS_MANY, 'AnakMatriksPerencanaanNilai', 'anak_matriks_perencanaan_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'anak_tahun_ajar_id' => 'Anak Tahun Ajar',
			'matriks_perencanaan_id' => 'Matriks Perencanaan',
			'pegawai_id' => 'Pegawai',
			'jabatan_id' => 'Jabatan',
			'status' => 'Status',
		);
	}

}
