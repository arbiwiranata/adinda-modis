<?php

class AdminBeranda extends Form {

    public function getForm() {
        return array (
            'title' => 'Beranda',
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
                'type' => 'Text',
                'value' => '<h2>Ini Beranda Admin</h2>',
            ),
        );
    }

}