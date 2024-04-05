<?php

class AdminKurikulumKegiatanForm extends KurikulumKegiatan {

    public function getForm() {
        return array (
            'title' => 'Detail Kegiatan',
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
                            'href' => 'url:/admin/kurikulumTarget/edit?id={params.target.id}',
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
                            'href' => 'url:/admin/kurikulumKegiatan/delete?id={model.id}',
                            'confirm' => 'Apakah Anda Yakin ?',
                        ),
                        'type' => 'LinkButton',
                    ),
                ),
                'title' => '{{ isNewRecord ? \'Tambah Kegiatan\' : \'Update Kegiatan\'}}',
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
                'name' => 'dsKurikulumIndikators',
                'relationTo' => 'kurikulumIndikators',
                'relationCriteria' => array (
                    'select' => '',
                    'distinct' => 'false',
                    'alias' => 't',
                    'condition' => '',
                    'order' => 't.urutan',
                    'paging' => '',
                    'group' => '',
                    'having' => '',
                    'join' => '',
                ),
                'type' => 'DataSource',
            ),
            array (
                'column1' => array (
                    array (
                        'title' => 'KURIKULUM',
                        'type' => 'SectionHeader',
                    ),
                    array (
                        'label' => 'Hambatan',
                        'js' => 'params.kurikulum.hambatan',
                        'type' => 'LabelField',
                    ),
                    array (
                        'label' => 'Nama Kurikulum',
                        'js' => 'params.kurikulum.nama',
                        'type' => 'LabelField',
                    ),
                    array (
                        'label' => 'Status',
                        'js' => 'params.kurikulum.is_aktif',
                        'type' => 'LabelField',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '<br>',
                    ),
                    array (
                        'title' => 'ASPEK',
                        'type' => 'SectionHeader',
                    ),
                    array (
                        'label' => 'Urutan',
                        'js' => 'params.aspek.urutan',
                        'type' => 'LabelField',
                    ),
                    array (
                        'label' => 'Nama Aspek',
                        'js' => 'params.aspek.nama',
                        'type' => 'LabelField',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '<br>',
                    ),
                    array (
                        'title' => 'TARGET',
                        'type' => 'SectionHeader',
                    ),
                    array (
                        'label' => 'Urutan',
                        'js' => 'params.target.urutan',
                        'type' => 'LabelField',
                    ),
                    array (
                        'label' => 'Nama Target',
                        'js' => 'params.target.nama',
                        'type' => 'LabelField',
                    ),
                    array (
                        'label' => 'Deskripsi Target',
                        'js' => 'params.target.deskripsi',
                        'type' => 'LabelField',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '<column-placeholder></column-placeholder>',
                    ),
                ),
                'column2' => array (
                    array (
                        'type' => 'Text',
                        'value' => '<column-placeholder></column-placeholder>',
                    ),
                    array (
                        'title' => 'KEGIATAN',
                        'type' => 'SectionHeader',
                    ),
                    array (
                        'label' => 'Nama Kegiatan',
                        'name' => 'nama',
                        'type' => 'TextField',
                    ),
                    array (
                        'name' => 'lvKurikulumIndikators',
                        'templateForm' => 'app.modules.admin.forms.master.kurikulumKegiatan.AdminKurikulumKegiatanKurikulumIndikatorsSubform',
                        'label' => 'Indikator',
                        'labelWidth' => '4',
                        'fieldWidth' => '8',
                        'datasource' => 'dsKurikulumIndikators',
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