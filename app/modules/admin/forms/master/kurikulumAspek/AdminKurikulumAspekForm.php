<?php

class AdminKurikulumAspekForm extends KurikulumAspek {

    public function getForm() {
        return array (
            'title' => 'Detail Aspek',
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
                            'href' => 'url:/admin/kurikulum/edit?id={params.kurikulum.id}',
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
                            'href' => 'url:/admin/kurikulumAspek/delete?id={model.id}',
                            'confirm' => 'Apakah Anda Yakin ?',
                        ),
                        'type' => 'LinkButton',
                    ),
                ),
                'title' => '{{ isNewRecord ? \'Tambah Aspek\' : \'Update Aspek\'}}',
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
                'name' => 'dsKurikulumTargets',
                'relationTo' => 'kurikulumTargets',
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
                        'value' => '<column-placeholder></column-placeholder>',
                    ),
                ),
                'column2' => array (
                    array (
                        'type' => 'Text',
                        'value' => '<column-placeholder></column-placeholder>',
                    ),
                    array (
                        'title' => 'ASPEK',
                        'type' => 'SectionHeader',
                    ),
                    array (
                        'label' => 'Nama Aspek',
                        'name' => 'nama',
                        'type' => 'TextField',
                    ),
                    array (
                        'name' => 'lvKurikulumTargets',
                        'templateForm' => 'app.modules.admin.forms.master.kurikulumAspek.AdminKurikulumAspekKurikulumTargetsSubform',
                        'label' => 'Target',
                        'labelWidth' => '4',
                        'fieldWidth' => '8',
                        'datasource' => 'dsKurikulumTargets',
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