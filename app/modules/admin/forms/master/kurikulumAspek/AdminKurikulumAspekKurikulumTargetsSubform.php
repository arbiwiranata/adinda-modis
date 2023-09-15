<?php

class AdminKurikulumAspekKurikulumTargetsSubform extends KurikulumTarget {

    public function getForm() {
        return array (
            'title' => 'Kurikulum Aspek Kurikulum Targets Subform',
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
                'name' => 'kurikulum_aspek_id',
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
                    'ng-if' => '!params.target',
                ),
                'fieldOptions' => array (
                    'placeholder' => 'Nama Target',
                ),
                'type' => 'TextField',
            ),
            array (
                'name' => 'deskripsi',
                'fieldWidth' => '12',
                'fieldHeight' => '5',
                'options' => array (
                    'ng-if' => '!params.target',
                ),
                'fieldOptions' => array (
                    'style' => 'resize: vertical;',
                    'placeholder' => 'Deskripsi Target',
                ),
                'type' => 'TextArea',
            ),
            array (
                'js' => 'model.nama',
                'labelWidth' => '0',
                'fieldWidth' => '12',
                'options' => array (
                    'ng-if' => 'params.target',
                ),
                'type' => 'LabelField',
            ),
            array (
                'js' => 'model.deskripsi',
                'labelWidth' => '0',
                'fieldWidth' => '12',
                'options' => array (
                    'ng-if' => 'params.target',
                ),
                'type' => 'LabelField',
            ),
            array (
                'label' => 'Detail',
                'buttonType' => 'info',
                'icon' => 'list',
                'options' => array (
                    'ng-if' => 'model.id && model.id != params.target.id',
                    'href' => 'url:admin/kurikulumTarget/edit?id={model.id}',
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