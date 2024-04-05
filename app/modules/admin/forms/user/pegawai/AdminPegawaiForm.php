<?php

class AdminPegawaiForm extends Pegawai {

    public function getForm() {
        return array (
            'title' => 'Detail Pegawai ',
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
                            'href' => 'url:/admin/pegawai/index',
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
                            'href' => 'url:/admin/pegawai/delete?id={model.id}',
                            'confirm' => 'Apakah Anda Yakin ?',
                        ),
                        'type' => 'LinkButton',
                    ),
                ),
                'title' => '{{ isNewRecord ? \'Tambah Pegawai\' : \'Update Pegawai\'}}',
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
                        'label' => 'NIP / NIK',
                        'name' => 'nip_nik',
                        'type' => 'TextField',
                    ),
                    array (
                        'label' => 'Nama',
                        'name' => 'nama',
                        'type' => 'TextField',
                    ),
                    array (
                        'label' => 'Atasan',
                        'name' => 'pegawai_id',
                        'relationCriteria' => array (
                            'select' => '',
                            'distinct' => 'false',
                            'alias' => 't',
                            'condition' => '{t.id != :pegawai_id} {AND [search]}',
                            'order' => '',
                            'group' => '',
                            'having' => '',
                            'join' => '',
                        ),
                        'params' => array (
                            ':pegawai_id' => 'js: model.id || 0',
                        ),
                        'showUnselect' => 'Yes',
                        'modelClass' => 'app.models.Pegawai',
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
                        'name' => 'foto',
                        'label' => 'Foto',
                        'uploadPath' => 'repo/pegawai',
                        'fileType' => 'jpg, jpeg, png',
                        'restrict' => '1000',
                        'type' => 'UploadFile',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '<column-placeholder></column-placeholder>',
                    ),
                ),
                'column2' => array (
                    array (
                        'label' => 'Mulai Bekerja',
                        'name' => 'mulai_bekerja',
                        'fieldType' => 'datepicker',
                        'type' => 'DateTimePicker',
                    ),
                    array (
                        'label' => 'Jabatan',
                        'name' => 'jabatan',
                        'listExpr' => 'MJabatan::getAllData();',
                        'relField' => 'jabatan_id',
                        'type' => 'CheckboxList',
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
                'w1' => '50%',
                'w2' => '50%',
                'type' => 'ColumnField',
            ),
            array (
                'type' => 'Text',
                'value' => '</div>',
            ),
        );
    }

}