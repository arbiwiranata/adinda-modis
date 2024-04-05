<?php

class AdminMatriksPerencanaanAspekForm extends MatriksPerencanaanAspek {

    public function getForm() {
        return array (
            'title' => 'Detail Matriks Perencanaan Aspek ',
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
                            'href' => 'url:/admin/matriksPerencanaan/edit&id={model.matriks_perencanaan_id}',
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
                            'href' => 'url:/admin/matriksPerencanaanAspek/delete?id={model.id}',
                            'confirm' => 'Apakah Anda Yakin ?',
                        ),
                        'type' => 'LinkButton',
                    ),
                ),
                'title' => '{{ isNewRecord ? \'Tambah Matriks Perencanaan Aspek\' : \'Update Matriks Perencanaan Aspek\'}}',
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
                'name' => 'dsMatriksPerencanaanItems',
                'relationTo' => 'matriksPerencanaanItems',
                'relationCriteria' => array (
                    'select' => 't.*, CASE WHEN t.is_pertanyaan = TRUE THEN \'Pertanyaan\' ELSE \'Header\' END AS is_pertanyaan, t.is_pertanyaan AS tipe',
                    'distinct' => 'false',
                    'alias' => 't',
                    'condition' => 't.matriks_perencanaan_item_id IS NULL',
                    'order' => '{[order], t.urutan}',
                    'paging' => '',
                    'group' => 't.id',
                    'having' => '',
                    'join' => '',
                ),
                'type' => 'DataSource',
            ),
            array (
                'column1' => array (
                    array (
                        'label' => 'Nama Aspek',
                        'name' => 'nama',
                        'type' => 'TextField',
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
                        'name' => 'lvMatriksPerencanaanItems',
                        'templateForm' => 'app.modules.admin.forms.master.matriksPerencanaanAspek.AdminMatriksPerencanaanAspekMatriksPerencanaanItemsSubform',
                        'label' => 'Item',
                        'labelWidth' => '4',
                        'fieldWidth' => '8',
                        'datasource' => 'dsMatriksPerencanaanItems',
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