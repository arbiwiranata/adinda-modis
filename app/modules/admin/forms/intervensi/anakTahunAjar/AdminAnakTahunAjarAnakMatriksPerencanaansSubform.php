<?php

class AdminAnakTahunAjarAnakMatriksPerencanaansSubform extends AnakMatriksPerencanaan {

    public function getForm() {
        return array (
            'title' => 'Anak Tahun Ajar Anak Matriks Perencanaans Subform',
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
                'name' => 'id',
                'type' => 'HiddenField',
            ),
            array (
                'column1' => array (
                    '<column-placeholder></column-placeholder>',
                    array (
                        'label' => 'Pegawai',
                        'name' => 'pegawai_id',
                        'relationCriteria' => array (
                            'select' => '',
                            'distinct' => 'false',
                            'alias' => 't',
                            'condition' => 't.is_aktif = TRUE {AND [search]}',
                            'order' => 't.nama',
                            'group' => '',
                            'having' => '',
                            'join' => '',
                        ),
                        'modelClass' => 'app.models.Pegawai',
                        'idField' => 'id',
                        'labelField' => 'nama',
                        'type' => 'RelationField',
                    ),
                    array (
                        'label' => 'Jabatan',
                        'name' => 'jabatan_id',
                        'relationCriteria' => array (
                            'select' => '',
                            'distinct' => 'false',
                            'alias' => 't',
                            'condition' => '{[search]}',
                            'order' => 't.nama',
                            'group' => '',
                            'having' => '',
                            'join' => '',
                        ),
                        'modelClass' => 'app.models.MJabatan',
                        'idField' => 'id',
                        'labelField' => 'nama',
                        'type' => 'RelationField',
                    ),
                ),
                'column2' => array (
                    '<column-placeholder></column-placeholder>',
                    array (
                        'label' => 'Matriks Perencanaan',
                        'name' => 'matriks_perencanaan_id',
                        'relationCriteria' => array (
                            'select' => '',
                            'distinct' => 'false',
                            'alias' => 't',
                            'condition' => 't.is_aktif = TRUE {AND [search]}',
                            'order' => 't.nama',
                            'group' => '',
                            'having' => '',
                            'join' => '',
                        ),
                        'showUnselect' => 'Yes',
                        'modelClass' => 'app.models.MatriksPerencanaan',
                        'idField' => 'id',
                        'labelField' => 'nama',
                        'type' => 'RelationField',
                    ),
                ),
                'w1' => '50%',
                'w2' => '50%',
                'type' => 'ColumnField',
            ),
        );
    }

}