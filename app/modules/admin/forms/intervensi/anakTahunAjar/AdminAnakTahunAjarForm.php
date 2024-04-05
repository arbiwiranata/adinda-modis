<?php

class AdminAnakTahunAjarForm extends AnakTahunAjar {

    public function getForm() {
        return array (
            'title' => 'Detail Proses Belajar',
            'layout' => array (
                'name' => 'full-width',
                'data' => array (
                    'col1' => array (
                        'type' => 'mainform',
                        'size' => '100',
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
                            'href' => 'url:/admin/anakTahunAjar/index',
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
                            'href' => 'url:/admin/anakTahunAjar/delete?id={model.id}',
                            'confirm' => 'Apakah Anda Yakin ?',
                        ),
                        'type' => 'LinkButton',
                    ),
                ),
                'title' => '{{ isNewRecord ? \'Tambah Proses Belajar\' : \'Update Proses Belajar\'}}',
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
                        'label' => 'Nama Anak',
                        'name' => 'anak_id',
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
                        'modelClass' => 'app.models.Anak',
                        'idField' => 'id',
                        'labelField' => 'nama',
                        'type' => 'RelationField',
                    ),
                    array (
                        'label' => 'Tahun Ajar',
                        'name' => 'tahun_ajar_id',
                        'relationCriteria' => array (
                            'select' => '',
                            'distinct' => 'false',
                            'alias' => 't',
                            'condition' => '{[search]}',
                            'order' => 't.tanggal_selesai DESC, t.tanggal_mulai DESC',
                            'group' => '',
                            'having' => '',
                            'join' => '',
                        ),
                        'modelClass' => 'app.models.MTahunAjar',
                        'idField' => 'id',
                        'labelField' => 'nama',
                        'type' => 'RelationField',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '<column-placeholder></column-placeholder>',
                    ),
                ),
                'column2' => array (
                    array (
                        'label' => 'Jenis Layanan',
                        'name' => 'jenis_layanan_id',
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
                        'modelClass' => 'app.models.MJenisLayanan',
                        'idField' => 'id',
                        'labelField' => 'nama',
                        'type' => 'RelationField',
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
                'title' => 'Setting Matriks Perencanaan',
                'type' => 'SectionHeader',
            ),
            array (
                'name' => 'dsAnakMatriksPerencanaans',
                'relationTo' => 'anakMatriksPerencanaans',
                'type' => 'DataSource',
            ),
            array (
                'name' => 'lvAnakMatriksPerencanaans',
                'templateForm' => 'app.modules.admin.forms.intervensi.anakTahunAjar.AdminAnakTahunAjarAnakMatriksPerencanaansSubform',
                'datasource' => 'dsAnakMatriksPerencanaans',
                'sortable' => 'No',
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
                'value' => '</div\\">',
            ),
        );
    }

}