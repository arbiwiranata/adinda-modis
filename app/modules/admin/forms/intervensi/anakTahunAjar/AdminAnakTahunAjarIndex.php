<?php

class AdminAnakTahunAjarIndex extends AnakTahunAjar {

    public function getForm() {
        return array (
            'title' => 'Daftar Proses Belajar',
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
                        'label' => 'Tambah Proses Belajar',
                        'buttonType' => 'success',
                        'icon' => 'plus',
                        'options' => array (
                            'href' => 'url:/admin/anakTahunAjar/edit',
                        ),
                        'type' => 'LinkButton',
                    ),
                ),
                'title' => 'Daftar Proses Belajar',
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
                        'name' => 'a.nama',
                        'label' => 'Anak',
                        '$showDF' => false,
                        'defaultValue' => '',
                        'isCustom' => 'No',
                        'resetable' => 'Yes',
                        'defaultOperator' => '',
                    ),
                    array (
                        'filterType' => 'relation',
                        'name' => 't.tahun_ajar_id',
                        'label' => 'Tahun Ajar',
                        'relModelClass' => 'app.models.MTahunAjar',
                        'relIdField' => 'id',
                        'relParams' => array (),
                        'relCriteria' => array (
                            'select' => '',
                            'distinct' => 'false',
                            'alias' => 't',
                            'condition' => '{[search]}',
                            'order' => 't.tanggal_selesai DESC, t.tanggal_mulai DESC',
                            'group' => '',
                            'having' => '',
                            'join' => '',
                        ),
                        'relLabelField' => 'nama',
                        '$showDF' => true,
                        'defaultValue' => '',
                        'isCustom' => 'No',
                        'resetable' => 'Yes',
                        '$showDFR' => true,
                        'relIncludeEmpty' => 'No',
                        'list' => 0,
                        'count' => 0,
                    ),
                    array (
                        'filterType' => 'relation',
                        'name' => 't.jenis_layanan_id',
                        'label' => 'Jenis Layanan',
                        'relModelClass' => 'app.models.MJenisLayanan',
                        'relIdField' => 'id',
                        'relParams' => array (),
                        'relCriteria' => array (
                            'select' => '',
                            'distinct' => 'false',
                            'alias' => 't',
                            'condition' => '{[search]}',
                            'order' => 't.nama',
                            'group' => '',
                            'having' => '',
                            'join' => '',
                        ),
                        'relLabelField' => 'nama',
                        '$showDF' => false,
                        'defaultValue' => '',
                        'isCustom' => 'No',
                        'resetable' => 'Yes',
                        '$showDFR' => true,
                        'list' => 0,
                        'count' => 0,
                    ),
                    array (
                        'name' => 't.kurikulum_id',
                        'label' => 'Kurikulum',
                        'listExpr' => '',
                        'filterType' => 'relation',
                        'isCustom' => 'No',
                        'options' => array (),
                        'resetable' => 'Yes',
                        'defaultValue' => '',
                        'showOther' => 'No',
                        'otherLabel' => '',
                        'relParams' => array (),
                        'relCriteria' => array (
                            'select' => '',
                            'distinct' => 'false',
                            'alias' => 't',
                            'condition' => 't.is_aktif = TRUE {AND [search]}',
                            'order' => 't.nama',
                            'group' => '',
                            'having' => '',
                            'join' => '',
                        ),
                        'relModelClass' => 'app.models.Kurikulum',
                        'relIdField' => 'id',
                        'relLabelField' => 'nama',
                        'queryOperator' => '',
                        '$showDF' => false,
                        '$showDFR' => true,
                        'list' => 0,
                        'count' => 0,
                    ),
                    array (
                        'filterType' => 'list',
                        'name' => 'is_aktif',
                        'label' => 'Status',
                        '$showDF' => false,
                        'defaultValue' => 't',
                        'isCustom' => 'Yes',
                        'resetable' => 'Yes',
                        'listExpr' => '[\'t\' => \'Aktif\', \'f\' => \'Non Aktif\']',
                        'list' => array (
                            't' => 'Aktif',
                            'f' => 'Non Aktif',
                        ),
                    ),
                ),
                'type' => 'DataFilter',
            ),
            array (
                'name' => 'dataSource1',
                'relationTo' => 'currentModel',
                'relationCriteria' => array (
                    'select' => 't.*, a.nama AS anak, ta.nama AS tahun_ajar, jl.nama AS jenis_layanan, k.nama AS kurikulum',
                    'distinct' => 'false',
                    'alias' => 't',
                    'condition' => '{[where]}',
                    'order' => '{[order]}',
                    'paging' => '{[paging]}',
                    'group' => '',
                    'having' => '',
                    'join' => 'INNER JOIN anak a ON a.id = t.anak_id
INNER JOIN m_tahun_ajar ta ON ta.id = t.tahun_ajar_id
INNER JOIN m_jenis_layanan jl ON jl.id = t.jenis_layanan_id
LEFT JOIN kurikulum k ON k.id = t.kurikulum_id',
                ),
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
                        'name' => 'anak',
                        'label' => 'Nama Anak',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'default',
                        'html' => '<td class=\"col-0 \" ng-class=\"rowClass(row, \'anak_id\', \'string\')\" >
    <div  ng-include=\'\"row-state-template\"\'></div>
    <span class=\'row-group-padding\' ng-if=\'!!row.$level\'
        style=\'width:{{row.$level*10}}px;\'></span>
    {{row[\'anak_id\']}}
</td>',
                    ),
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'tahun_ajar',
                        'label' => 'Tahun Ajar',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'default',
                        'html' => '<td class=\"col-1 \" ng-class=\"rowClass(row, \'tahun_ajar_id\', \'string\')\" >
    {{row[\'tahun_ajar_id\']}}
</td>',
                    ),
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'jenis_layanan',
                        'label' => 'Jenis Layanan',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'default',
                        'html' => '<td class=\"col-2 \" ng-class=\"rowClass(row, \'jenis_layanan_id\', \'string\')\" >
    {{row[\'jenis_layanan_id\']}}
</td>',
                    ),
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'kurikulum',
                        'label' => 'Kurikulum',
                        '$listViewName' => 'columns',
                        '$showDF' => true,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'default',
                        'html' => '<td class=\"col-3 \" ng-class=\"rowClass(row, \'kurikulum_id\', \'string\')\" >
    {{row[\'kurikulum_id\']}}
</td>',
                    ),
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'terapis_nama',
                        'label' => 'Terapis',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'default',
                        'html' => '<td class=\"col-5 \" ng-class=\"rowClass(row, \'terapis_nama\', \'string\')\" >
    {{row[\'terapis_nama\']}}
</td>',
                    ),
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'key_terapis_nama',
                        'label' => 'Key Terapis',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'default',
                        'html' => '<td class=\"col-4 \" ng-class=\"rowClass(row, \'key_terapis_nama\', \'string\')\" >
    {{row[\'key_terapis_nama\']}}
</td>',
                    ),
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'is_aktif',
                        'label' => 'Status',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'custom',
                        'html' => '<td class=\"col-6 \" ng-class=\"rowClass(row, \'is_aktif\', \'string\')\" >
    {{row[\'is_aktif\'] ? \'Aktif\' : \'Non Aktif\'}}
</td>',
                    ),
                    array (
                        'name' => '',
                        'label' => '',
                        'columnType' => 'string',
                        'options' => array (
                            'mode' => 'edit-button',
                            'editUrl' => 'admin/anakTahunAjar/edit&id={{row.id}}',
                        ),
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                    ),
                    array (
                        'name' => '',
                        'label' => '',
                        'columnType' => 'string',
                        'options' => array (
                            'mode' => 'del-button',
                            'delUrl' => 'admin/anakTahunAjar/delete&id={{row.id}}',
                        ),
                        '$listViewName' => 'columns',
                        '$showDF' => false,
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