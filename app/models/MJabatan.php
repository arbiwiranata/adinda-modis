<?php

class MJabatan extends ActiveRecord
{

	public function tableName()
	{
		return 'm_jabatan';
	}

	public function rules()
	{
		return array(
			array('nama, kode', 'required'),
			array('nama', 'length', 'max'=>256),
			array('kode', 'length', 'max'=>3),
		);
	}

	public function relations()
	{
		return array(
			'pegawaiJabatans' => array(self::HAS_MANY, 'PegawaiJabatan', 'jabatan_id'),
			'anakMatriksPerencanaans' => array(self::HAS_MANY, 'AnakMatriksPerencanaan', 'jabatan_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
			'kode' => 'Kode',
		);
	}
	
	public function getAllData() {
	    $result = [];
	    foreach(MJabatan::model()->findAll(['order' => 'nama']) as $v) {
	        $result[$v['id']] = $v['nama'];
	    }
	    return $result;
	}

}
