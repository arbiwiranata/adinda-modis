<?php

class MJenisKelamin extends ActiveRecord
{

	public function tableName()
	{
		return 'm_jenis_kelamin';
	}

	public function rules()
	{
		return array(
			array('nama', 'required'),
			array('nama', 'length', 'max'=>256),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
		);
	}
	
	public function getAllData() {
	    $result = [];
	    foreach(MJenisKelamin::model()->findAll(['order' => 'nama']) as $v) {
	        $result[$v['id']] = $v['nama'];
	    }
	    return $result;
	}

}
