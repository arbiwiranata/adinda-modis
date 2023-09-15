<?php

class AdminMatriksPerencanaanAspekMatriksPerencanaanItemsSubform extends MatriksPerencanaanItem {

    public function getForm() {
        return array (
            'title' => 'Matriks Perencanaan Aspek Matriks Perencanaan Items Subform',
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
                'name' => 'matriks_perencanaan_aspek_id',
                'type' => 'HiddenField',
            ),
            array (
                'name' => 'urutan',
                'options' => array (
                    'ng-assign' => '$index + 1',
                ),
                'type' => 'HiddenField',
            ),
            array (
                'name' => 'is_pertanyaan',
                'labelWidth' => '0',
                'fieldWidth' => '12',
                'onLabel' => 'Pertanyaan',
                'offLabel' => 'Header',
                'type' => 'ToggleSwitch',
            ),
            array (
                'name' => 'nama',
                'labelWidth' => '0',
                'fieldWidth' => '12',
                'options' => array (
                    'ng-if' => 'model.is_pertanyaan != \'Pertanyaan\'',
                ),
                'fieldOptions' => array (
                    'placeholder' => 'Nama Item',
                ),
                'type' => 'TextField',
            ),
            array (
                'name' => 'nama',
                'labelWidth' => '0',
                'fieldWidth' => '12',
                'fieldHeight' => '5',
                'options' => array (
                    'ng-if' => 'model.is_pertanyaan == \'Pertanyaan\'',
                ),
                'fieldOptions' => array (
                    'style' => 'resize: vertical;',
                    'placeholder' => 'Nama Item',
                ),
                'type' => 'TextArea',
            ),
            array (
                'label' => 'Detail',
                'buttonType' => 'info',
                'icon' => 'list',
                'options' => array (
                    'ng-if' => 'model.id && !model.tipe',
                    'href' => 'url:admin/matriksPerencanaanItem/edit?id={model.id}',
                    'class' => 'pull-right',
                ),
                'type' => 'LinkButton',
            ),
            array (
                'type' => 'Text',
                'value' => '<div class=\\"clearfix\\" style=\\"margin-bottom: 5px;\\"></div>',
            ),
        );
    }

}