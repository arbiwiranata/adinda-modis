<?php

class AdminKurikulumKurikulumAspeksSubform extends KurikulumAspek {

    public function getForm() {
        return array (
            'title' => 'Kurikulum Kurikulum Aspeks Subform',
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
                'name' => 'kurikulum_id',
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
                'options' => array (
                    'ng-if' => '!params.aspek',
                ),
                'fieldOptions' => array (
                    'placeholder' => 'Nama Aspek',
                ),
                'type' => 'TextField',
            ),
            array (
                'js' => 'model.nama',
                'labelWidth' => '0',
                'fieldWidth' => '12',
                'options' => array (
                    'ng-if' => 'params.aspek',
                ),
                'type' => 'LabelField',
            ),
            array (
                'label' => 'Detail',
                'buttonType' => 'info',
                'icon' => 'list',
                'options' => array (
                    'ng-if' => 'model.id && model.id != params.aspek.id',
                    'href' => 'url:admin/kurikulumAspek/edit?id={model.id}',
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