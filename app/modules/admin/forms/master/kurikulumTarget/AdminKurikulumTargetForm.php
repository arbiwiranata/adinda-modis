<?php

class AdminKurikulumTargetForm extends KurikulumTarget {

    public function getForm() {
        return array (
            'title' => 'Detail Target',
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
                            'href' => 'url:/admin/kurikulumAspek/edit?id={params.aspek.id}',
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
                            'href' => 'url:/admin/kurikulumTarget/delete?id={model.id}',
                            'confirm' => 'Apakah Anda Yakin ?',
                        ),
                        'type' => 'LinkButton',
                    ),
                ),
                'title' => '{{ isNewRecord ? \'Tambah Target\' : \'Update Target\'}}',
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
                'name' => 'dsKurikulumKegiatans',
                'relationTo' => 'kurikulumKegiatans',
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
                        'value' => '<column-placeholder></column-placeholder>',
                    ),
                ),
                'column2' => array (
                    array (
                        'type' => 'Text',
                        'value' => '<column-placeholder></column-placeholder>',
                    ),
                    array (
                        'title' => 'TARGET',
                        'type' => 'SectionHeader',
                    ),
                    array (
                        'label' => 'Nama Target',
                        'name' => 'nama',
                        'type' => 'TextField',
                    ),
                    array (
                        'label' => 'Deskripsi Target',
                        'name' => 'deskripsi',
                        'fieldOptions' => array (
                            'style' => 'resize: vertical;',
                        ),
                        'type' => 'TextArea',
                    ),
                    array (
                        'name' => 'lvKurikulumKegiatans',
                        'templateForm' => 'app.modules.admin.forms.master.kurikulumTarget.AdminKurikulumTargetKurikulumKegiatansSubform',
                        'label' => 'Kegiatan',
                        'labelWidth' => '4',
                        'fieldWidth' => '8',
                        'datasource' => 'dsKurikulumKegiatans',
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