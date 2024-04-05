<?php

class AnakTahunAjar extends ActiveRecord
{

	public function tableName()
	{
		return 'anak_tahun_ajar';
	}

	public function rules()
	{
		return array(
			array('anak_id, tahun_ajar_id, jenis_layanan_id', 'required'),
			array('anak_id', 'unique', 'criteria' => array(
                'condition' => 'tahun_ajar_id = :tahun_ajar_id',
                'params' => array(
                    ':tahun_ajar_id' => $this->tahun_ajar_id
                )
            ), 'message' => '{attribute} sudah terdaftar.'),
			array('anak_id, tahun_ajar_id, jenis_layanan_id, kurikulum_id', 'numerical', 'integerOnly'=>true),
			array('terapis_nama, key_terapis_nama', 'length', 'max'=>256),
			array('kesimpulan, saran, is_aktif', 'safe'),
		);
	}

	public function relations()
	{
		return array(
			'tahunAjar' => array(self::BELONGS_TO, 'MTahunAjar', 'tahun_ajar_id'),
			'jenisLayanan' => array(self::BELONGS_TO, 'MJenisLayanan', 'jenis_layanan_id'),
			'kurikulum' => array(self::BELONGS_TO, 'Kurikulum', 'kurikulum_id'),
			'anak' => array(self::BELONGS_TO, 'Anak', 'anak_id'),
			'anakMatriksPerencanaans' => array(self::HAS_MANY, 'AnakMatriksPerencanaan', 'anak_tahun_ajar_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'anak_id' => 'Nama Anak',
			'tahun_ajar_id' => 'Tahun Ajar',
			'jenis_layanan_id' => 'Jenis Layanan',
			'kurikulum_id' => 'Kurikulum',
			'terapis_nama' => 'Terapis Nama',
			'key_terapis_nama' => 'Key Terapis Nama',
			'kesimpulan' => 'Kesimpulan',
			'saran' => 'Saran',
			'is_aktif' => 'Status',
		);
	}

}
