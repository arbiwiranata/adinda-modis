<?php

class AdminKurikulumTargetKurikulumKegiatansSubform extends KurikulumKegiatan {

    public function getForm() {
        return array (
            'title' => 'Kurikulum Target Kurikulum Kegiatans Subform',
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
                'name' => 'kurukulum_target_id',
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
                'fieldHeight' => '5',
                'options' => array (
                    'ng-if' => '!params.kegiatan',
                ),
                'fieldOptions' => array (
                    'style' => 'resize: vertical;',
                    'placeholder' => 'Nama Kegiatan',
                ),
                'type' => 'TextArea',
            ),
            array (
                'js' => 'model.nama',
                'labelWidth' => '0',
                'fieldWidth' => '12',
                'options' => array (
                    'ng-if' => 'params.kegiatan',
                ),
                'type' => 'LabelField',
            ),
            array (
                'label' => 'Detail',
                'buttonType' => 'info',
                'icon' => 'list',
                'options' => array (
                    'ng-if' => 'model.id && model.id != params.kegiatan.id',
                    'href' => 'url:admin/kurikulumKegiatan/edit?id={model.id}',
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