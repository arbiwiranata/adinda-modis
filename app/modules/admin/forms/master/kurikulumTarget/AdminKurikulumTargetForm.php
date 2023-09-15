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
                'name' => 'dsKurikulumAspeks',
                'sql' => 'SELECT *
FROM kurikulum_aspek
WHERE kurikulum_id = :id
ORDER BY urutan',
                'postData' => 'No',
                'params' => array (
                    ':id' => 'js: params.kurikulum.id',
                ),
                'type' => 'DataSource',
            ),
            array (
                'name' => 'dsKurikulumTargets',
                'sql' => 'SELECT *
FROM kurikulum_target
WHERE kurikulum_aspek_id = :id
ORDER BY urutan',
                'postData' => 'No',
                'params' => array (
                    ':id' => 'js: params.aspek.id',
                ),
                'type' => 'DataSource',
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
                        'label' => 'Status',
                        'js' => 'params.kurikulum.is_aktif',
                        'type' => 'LabelField',
                    ),
                ),
                'w1' => '50%',
                'w2' => '50%',
                'type' => 'ColumnField',
            ),
            array (
                'totalColumns' => '4',
                'column1' => array (
                    array (
                        'type' => 'Text',
                        'value' => '<column-placeholder></column-placeholder>',
                    ),
                    array (
                        'name' => 'lvKurikulumAspeks',
                        'templateForm' => 'app.modules.admin.forms.master.kurikulum.AdminKurikulumKurikulumAspeksSubform',
                        'layout' => 'Vertical',
                        'label' => 'Aspek',
                        'labelWidth' => '12',
                        'datasource' => 'dsKurikulumAspeks',
                        'sortable' => 'No',
                        'deletable' => 'No',
                        'insertable' => 'No',
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
                'column2' => array (
                    array (
                        'name' => 'lvKurikulumTargets',
                        'templateForm' => 'app.modules.admin.forms.master.kurikulumAspek.AdminKurikulumAspekKurikulumTargetsSubform',
                        'layout' => 'Vertical',
                        'label' => 'Target',
                        'labelWidth' => '12',
                        'datasource' => 'dsKurikulumTargets',
                        'sortable' => 'No',
                        'deletable' => 'No',
                        'insertable' => 'No',
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
                        'value' => '<column-placeholder></column-placeholder>',
                    ),
                ),
                'column3' => array (
                    array (
                        'type' => 'Text',
                        'value' => '<column-placeholder></column-placeholder>',
                    ),
                    array (
                        'name' => 'lvKurikulumKegiatans',
                        'templateForm' => 'app.modules.admin.forms.master.kurikulumTarget.AdminKurikulumTargetKurikulumKegiatansSubform',
                        'label' => 'Kegiatan',
                        'labelWidth' => '12',
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
                'w1' => '25%',
                'w2' => '25%',
                'w3' => '25%',
                'w4' => '25%',
                'type' => 'ColumnField',
            ),
            array (
                'type' => 'Text',
                'value' => '</div>',
            ),
        );
    }

}