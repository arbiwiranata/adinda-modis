<?php

class AdminMatriksPerencanaanMatriksPerencanaanAspeksSubform extends MatriksPerencanaanAspek {

    public function getForm() {
        return array (
            'title' => 'Matriks Perencanaan Matriks Perencanaan Aspeks Subform',
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
                'name' => 'matriks_perencanaan_id',
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
                'name' => 'nama',
                'labelWidth' => '0',
                'fieldWidth' => '12',
                'fieldOptions' => array (
                    'placeholder' => 'Nama Aspek',
                ),
                'type' => 'TextField',
            ),
            array (
                'label' => 'Detail',
                'buttonType' => 'info',
                'icon' => 'list',
                'options' => array (
                    'ng-if' => 'model.id',
                    'href' => 'url:admin/matriksPerencanaanAspek/edit?id={model.id}',
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