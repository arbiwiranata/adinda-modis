<?php

class AdminMTahunAjarIndex extends MTahunAjar {

    public function getForm() {
        return array (
            'title' => 'Daftar Tahun Ajar',
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
                        'label' => 'Tambah Tahun Ajar',
                        'buttonType' => 'success',
                        'icon' => 'plus',
                        'options' => array (
                            'href' => 'url:/admin/mTahunAjar/edit',
                        ),
                        'type' => 'LinkButton',
                    ),
                ),
                'title' => 'Daftar Tahun Ajar',
                'showSectionTab' => 'No',
                'type' => 'ActionBar',
            ),
            array (
                'type' => 'Text',
                'value' => '<div class=\\"panel-child\\">',
            ),
            array (
                'name' => 'dataFilter1',
                'datasource' => 'dataSource1',
                'filters' => array (
                    array (
                        'filterType' => 'string',
                        'name' => 'nama',
                        'label' => 'Nama',
                    ),
                    array (
                        'filterType' => 'date',
                        'name' => 'tanggal_mulai',
                        'label' => 'Tanggal Mulai',
                    ),
                    array (
                        'filterType' => 'date',
                        'name' => 'tanggal_selesai',
                        'label' => 'Tanggal Selesai',
                    ),
                ),
                'type' => 'DataFilter',
            ),
            array (
                'name' => 'dataSource1',
                'relationTo' => 'currentModel',
                'type' => 'DataSource',
            ),
            array (
                'type' => 'GridView',
                'name' => 'gridView1',
                'datasource' => 'dataSource1',
                'columns' => array (
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'nama',
                        'label' => 'Nama',
                    ),
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'tanggal_mulai',
                        'label' => 'Tanggal Mulai',
                    ),
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'tanggal_selesai',
                        'label' => 'Tanggal Selesai',
                    ),
                    array (
                        'name' => '',
                        'label' => '',
                        'columnType' => 'string',
                        'options' => array (
                            'mode' => 'edit-button',
                            'editUrl' => 'admin/mTahunAjar/edit&id={{row.id}}',
                        ),
                    ),
                    array (
                        'name' => '',
                        'label' => '',
                        'columnType' => 'string',
                        'options' => array (
                            'mode' => 'del-button',
                            'delUrl' => 'admin/mTahunAjar/delete&id={{row.id}}',
                        ),
                    ),
                ),
            ),
            array (
                'type' => 'Text',
                'value' => '</div>',
            ),
        );
    }

}