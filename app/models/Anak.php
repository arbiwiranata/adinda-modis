<?php

class Anak extends ActiveRecord
{
    public $hambatan;

	public function tableName()
	{
		return 'anak';
	}

	public function rules()
	{
		return array(
			array('nama, tempat_lahir, tanggal_lahir, agama_id, jenis_kelamin_id, hambatan, nomor_kk, nik, nama_sekolah, kelas, nisn, foto, nama_ayah, nama_ibu, alamat_rumah, nomor_hp, kk_file, ktp_ortu_file', 'required'),
			array('agama_id, jenis_kelamin_id', 'numerical', 'integerOnly'=>true),
			array('nama, tempat_lahir, nomor_kk, nik, nama_sekolah, kelas, nisn, nama_ayah, nama_ibu, nomor_hp', 'length', 'max'=>256),
			array('alamat_domisili, domisili_file, is_aktif', 'safe'),
		);
	}

	public function relations()
	{
		return array(
			'users' => array(self::HAS_MANY, 'User', 'anak_id'),
			'anakAssessments' => array(self::HAS_MANY, 'AnakAssessment', 'anak_id'),
			'anakHambatans' => array(self::HAS_MANY, 'AnakHambatan', 'anak_id'),
			'agama' => array(self::BELONGS_TO, 'MAgama', 'agama_id'),
			'jenisKelamin' => array(self::BELONGS_TO, 'MJenisKelamin', 'jenis_kelamin_id'),
			'anakTahunAjars' => array(self::HAS_MANY, 'AnakTahunAjar', 'anak_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
			'tempat_lahir' => 'Tempat Lahir',
			'tanggal_lahir' => 'Tanggal Lahir',
			'agama_id' => 'Agama',
			'jenis_kelamin_id' => 'Jenis Kelamin',
			'nomor_kk' => 'Nomor KK',
			'nik' => 'NIK',
			'nama_sekolah' => 'Nama Sekolah',
			'kelas' => 'Kelas',
			'nisn' => 'NISN',
			'foto' => 'Foto',
			'nama_ayah' => 'Nama Ayah',
			'nama_ibu' => 'Nama Ibu',
			'alamat_rumah' => 'Alamat Rumah',
			'alamat_domisili' => 'Alamat Domisili',
			'nomor_hp' => 'Nomor HP',
			'kk_file' => 'Kartu Kelurga',
			'ktp_ortu_file' => 'KTP Orang Tua',
			'domisili_file' => 'Surat Domisili',
			'is_aktif' => 'Status',
			'hambatan' => 'Hambatan'
		);
	}

}
