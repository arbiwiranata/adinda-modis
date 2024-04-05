<?php

class MHambatan extends ActiveRecord
{

	public function tableName()
	{
		return 'm_hambatan';
	}

	public function rules()
	{
		return array(
			array('jenis_hambatan_id, nama', 'required'),
			array('jenis_hambatan_id', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>256),
		);
	}

	public function relations()
	{
		return array(
			'kurikulums' => array(self::HAS_MANY, 'Kurikulum', 'hambatan_id'),
			'matriksPerencanaans' => array(self::HAS_MANY, 'MatriksPerencanaan', 'hambatan_id'),
			'jenisHambatan' => array(self::BELONGS_TO, 'MJenisHambatan', 'jenis_hambatan_id'),
			'anakHambatans' => array(self::HAS_MANY, 'AnakHambatan', 'hambatan_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'jenis_hambatan_id' => 'Jenis Hambatan',
			'nama' => 'Nama',
		);
	}
	
	public function getAllData() {
	    $result = [];
	    foreach(MHambatan::model()->findAll(['order' => 'nama']) as $v) {
	        $result[$v['id']] = $v['nama'];
	    }
	    return $result;
	}

}
