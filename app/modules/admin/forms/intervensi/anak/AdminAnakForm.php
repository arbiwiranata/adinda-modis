<?php

class AdminAnakForm extends Anak {

    public function getForm() {
        return array (
            'title' => 'Detail Anak ',
            'layout' => array (
                'name' => 'full-width',
                'data' => array (
                    'col1' => array (
                        'type' => 'mainform',
                    ),
                ),
            ),
        );
    }

    public function getFields() {
        return array (
            array (
                'linkBar' => array (
                    array (
                        'label' => 'Kembali',
                        'icon' => 'chevron-left',
                        'options' => array (
                            'href' => 'url:/admin/anak/index',
                        ),
                        'type' => 'LinkButton',
                    ),
                    array (
                        'label' => 'Simpan',
                        'buttonType' => 'success',
                        'icon' => 'check',
                        'options' => array (
                            'ng-click' => 'form.submit(this)',
                        ),
                        'type' => 'LinkButton',
                    ),
                    array (
                        'renderInEditor' => 'Yes',
                        'type' => 'Text',
                        'value' => '<div ng-if=\\"!isNewRecord\\" class=\\"separator\\"></div>',
                    ),
                    array (
                        'label' => 'Hapus',
                        'buttonType' => 'danger',
                        'icon' => 'trash',
                        'options' => array (
                            'ng-if' => '!isNewRecord',
                            'href' => 'url:/admin/anak/delete?id={model.id}',
                            'confirm' => 'Apakah Anda Yakin ?',
                        ),
                        'type' => 'LinkButton',
                    ),
                ),
                'title' => '{{ isNewRecord ? \'Tambah Anak\' : \'Update Anak\'}}',
                'type' => 'ActionBar',
            ),
            array (
                'type' => 'Text',
                'value' => '<div class=\\"panel-child\\">',
            ),
            array (
                'name' => 'id',
                'type' => 'HiddenField',
            ),
            array (
                'column1' => array (
                    array (
                        'label' => 'NIK',
                        'name' => 'nik',
                        'type' => 'TextField',
                    ),
                    array (
                        'label' => 'Nama',
                        'name' => 'nama',
                        'type' => 'TextField',
                    ),
                    array (
                        'label' => 'Tempat Lahir',
                        'name' => 'tempat_lahir',
                        'type' => 'TextField',
                    ),
                    array (
                        'label' => 'Tanggal Lahir',
                        'name' => 'tanggal_lahir',
                        'fieldType' => 'datepicker',
                        'type' => 'DateTimePicker',
                    ),
                    array (
                        'label' => 'Agama',
                        'name' => 'agama_id',
                        'modelClass' => 'app.models.MAgama',
                        'idField' => 'id',
                        'labelField' => 'nama',
                        'type' => 'RelationField',
                    ),
                    array (
                        'label' => 'Jenis Kelamin',
                        'name' => 'jenis_kelamin_id',
                        'listExpr' => 'MJenisKelamin::getAllData();',
                        'itemLayout' => 'Horizontal',
                        'type' => 'RadioButtonList',
                    ),
                    array (
                        'label' => 'Hambatan',
                        'name' => 'hambatan',
                        'listExpr' => 'MHambatan::getAllData();',
                        'itemLayout' => 'Horizontal',
                        'type' => 'CheckboxList',
                    ),
                    array (
                        'label' => 'Nomor KK',
                        'name' => 'nomor_kk',
                        'type' => 'TextField',
                    ),
                    array (
                        'label' => 'Nama Sekolah',
                        'name' => 'nama_sekolah',
                        'type' => 'TextField',
                    ),
                    array (
                        'label' => 'Kelas',
                        'name' => 'kelas',
                        'type' => 'TextField',
                    ),
                    array (
                        'label' => 'NISN',
                        'name' => 'nisn',
                        'type' => 'TextField',
                    ),
                    array (
                        'name' => 'foto',
                        'label' => 'Foto',
                        'uploadPath' => 'repo/anak/foto',
                        'fileType' => 'jpg, jpeg, png',
                        'restrict' => '1000',
                        'type' => 'UploadFile',
                    ),
                    array (
                        'label' => 'Status',
                        'name' => 'is_aktif',
                        'onLabel' => 'Aktif',
                        'offLabel' => 'Non Aktif',
                        'type' => 'ToggleSwitch',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '<column-placeholder></column-placeholder>',
                    ),
                ),
                'column2' => array (
                    array (
                        'label' => 'Nama Ayah',
                        'name' => 'nama_ayah',
                        'type' => 'TextField',
                    ),
                    array (
                        'label' => 'Nama Ibu',
                        'name' => 'nama_ibu',
                        'type' => 'TextField',
                    ),
                    array (
                        'label' => 'Alamat Rumah',
                        'name' => 'alamat_rumah',
                        'type' => 'TextArea',
                    ),
                    array (
                        'label' => 'Alamat Domisili',
                        'name' => 'alamat_domisili',
                        'type' => 'TextArea',
                    ),
                    array (
                        'label' => 'Nomor HP',
                        'name' => 'nomor_hp',
                        'type' => 'TextField',
                    ),
                    array (
                        'name' => 'kk_file',
                        'label' => 'Kartu Keluarga',
                        'uploadPath' => 'repo/anak/file',
                        'fileType' => 'pdf',
                        'restrict' => '1000',
                        'type' => 'UploadFile',
                    ),
                    array (
                        'name' => 'ktp_ortu_file',
                        'label' => 'KTP Orang Tua',
                        'uploadPath' => 'repo/anak/file',
                        'fileType' => 'pdf',
                        'restrict' => '1000',
                        'type' => 'UploadFile',
                    ),
                    array (
                        'name' => 'domisili_file',
                        'label' => 'Surat Domisili',
                        'uploadPath' => 'repo/anak/file',
                        'fileType' => 'pdf',
                        'restrict' => '1000',
                        'type' => 'UploadFile',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '<column-placeholder></column-placeholder>',
                    ),
                ),
                'w1' => '50%',
                'w2' => '50%',
                'type' => 'ColumnField',
            ),
            array (
                'title' => 'File Assessment',
                'type' => 'SectionHeader',
            ),
            array (
                'name' => 'dsAnakAssessments',
                'relationTo' => 'anakAssessments',
                'type' => 'DataSource',
            ),
            array (
                'name' => 'lvAnakAssessments',
                'templateForm' => 'app.modules.admin.forms.intervensi.anak.AdminAnakAnakAssessmentsSubform',
                'datasource' => 'dsAnakAssessments',
                'singleViewOption' => array (
                    'name' => 'val',
                    'fieldType' => 'text',
                    'labelWidth' => 0,
                    'fieldWidth' => 12,
                    'fieldOptions' => array (
                        'ng-delay' => 500,
                    ),
                ),
                'type' => 'ListView',
            ),
            array (
                'type' => 'Text',
                'value' => '</div>',
            ),
        );
    }

}