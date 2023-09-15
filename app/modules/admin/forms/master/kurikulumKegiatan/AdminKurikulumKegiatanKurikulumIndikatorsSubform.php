<?php

class AdminKurikulumKegiatanKurikulumIndikatorsSubform extends KurikulumIndikator {

    public function getForm() {
        return array (
            'title' => 'Kurikulum Kegiatan Kurikulum Indikators Subform',
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
                'name' => 'kurikulum_kegiatan_id',
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
                'fieldOptions' => array (
                    'style' => 'resize: vertical;',
                    'placeholder' => 'Nama Indikator',
                ),
                'type' => 'TextArea',
            ),
            array (
                'type' => 'Text',
                'value' => '<div class=\\"clearfix\\" style=\\"margin-bottom: 5px;\\"></div>',
            ),
        );
    }

}