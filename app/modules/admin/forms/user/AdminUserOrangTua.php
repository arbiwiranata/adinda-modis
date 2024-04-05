<?php

class AdminUserOrangTua extends Anak {

    public function getForm() {
        return array (
            'title' => 'Daftar Orang Tua',
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
                'linkBar' => array (),
                'title' => 'Daftar Orang Tua',
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
                        'name' => 't.nik',
                        'label' => 'NIK',
                        '$showDF' => false,
                        'defaultOperator' => '',
                        'defaultValue' => '',
                        'isCustom' => 'No',
                        'resetable' => 'Yes',
                    ),
                    array (
                        'filterType' => 'string',
                        'name' => 'nama',
                        'label' => 'Nama',
                        '$showDF' => false,
                        'defaultOperator' => '',
                        'defaultValue' => '',
                    ),
                    array (
                        'filterType' => 'relation',
                        'name' => 'jenis_kelamin_id',
                        'label' => 'Jenis Kelamin',
                        'relModelClass' => 'app.models.MJenisKelamin',
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
                        'name' => 'hambatan',
                        'label' => 'Hambatan',
                        'listExpr' => '',
                        'filterType' => 'relation',
                        'isCustom' => 'Yes',
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
                            'condition' => '{[search]}',
                            'order' => 't.nama',
                            'group' => '',
                            'having' => '',
                            'join' => '',
                        ),
                        'relModelClass' => 'app.models.MHambatan',
                        'relIdField' => 'id',
                        'relLabelField' => 'nama',
                        'queryOperator' => '',
                        '$showDF' => true,
                        '$showDFR' => true,
                        'relIncludeEmpty' => 'No',
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
                'params' => array (
                    ':hambatan_id' => 'js: dataFilter1.filters[3].value',
                    ':is_aktif' => 'js: dataFilter1.filters[4].value',
                ),
                'relationTo' => 'currentModel',
                'relationCriteria' => array (
                    'select' => 't.*, jk.nama AS jenis_kelamin, hb.hambatan',
                    'distinct' => 'false',
                    'alias' => 't',
                    'condition' => 'TRUE {AND hb.hambatan_id @> TO_JSONB(:hambatan_id)} {AND t.is_aktif = :is_aktif} {AND [where]}',
                    'order' => '{[order]}',
                    'paging' => '{[paging]}',
                    'group' => '',
                    'having' => '',
                    'join' => 'INNER JOIN m_jenis_kelamin jk ON jk.id = t.jenis_kelamin_id
LEFT JOIN LATERAL (
SELECT JSONB_AGG(ah.hambatan_id) AS hambatan_id, STRING_AGG(h.nama, \', \' ORDER BY h.nama) AS hambatan
FROM anak_hambatan ah
INNER JOIN m_hambatan h on h.id = ah.hambatan_id
WHERE ah.anak_id = t.id
) hb ON TRUE',
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
                        'name' => 'nik',
                        'label' => 'NIK / Username',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'default',
                        'html' => '<td class=\"col-0 \" ng-class=\"rowClass(row, \'nik\', \'string\')\" >
    <div  ng-include=\'\"row-state-template\"\'></div>
    <span class=\'row-group-padding\' ng-if=\'!!row.$level\'
        style=\'width:{{row.$level*10}}px;\'></span>
    {{row[\'nik\']}}
</td>',
                    ),
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'nama',
                        'label' => 'Nama',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                    ),
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'tanggal_lahir',
                        'label' => 'Tanggal Lahir',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                    ),
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'jenis_kelamin',
                        'label' => 'Jenis Kelamin',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'default',
                        'html' => '<td class=\"col-3 \" ng-class=\"rowClass(row, \'jenis_kelamin_id\', \'string\')\" >
    {{row[\'jenis_kelamin_id\']}}
</td>',
                    ),
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'nama_sekolah',
                        'label' => 'Nama Sekolah',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                    ),
                    array (
                        'name' => 'hambatan',
                        'label' => 'Hambatan',
                        'options' => array (),
                        'mergeSameRow' => 'No',
                        'mergeSameRowWith' => '',
                        'mergeSameRowMethod' => 'Default',
                        'html' => '',
                        'columnType' => 'string',
                        'typeOptions' => array (
                            'string' => array (
                                'html',
                            ),
                        ),
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'cellMode' => 'default',
                    ),
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'nama_ayah',
                        'label' => 'Nama Ayah',
                        '$listViewName' => 'columns',
                        '$showDF' => true,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'default',
                    ),
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'nama_ibu',
                        'label' => 'Nama Ibu',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                    ),
                    array (
                        'columnType' => 'string',
                        'options' => array (),
                        'name' => 'nomor_hp',
                        'label' => 'Nomor HP',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
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
                        'html' => '<td class=\"col-8 \" ng-class=\"rowClass(row, \'is_aktif\', \'string\')\" >
    {{row[\'is_aktif\'] ? \'Aktif\' : \'Non Aktif\'}}
</td>',
                    ),
                    array (
                        'name' => '',
                        'label' => '',
                        'columnType' => 'string',
                        'options' => array (
                            'mode' => 'reset-button',
                            'editUrl' => 'admin/orangTua/reset&id={{row.id}}',
                        ),
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'custom',
                        'html' => '<td style=\"width:35px;\" class=\"col-10 \" ng-class=\"rowClass(row, \'\', \'string\')\" >
    <a ng-if=\"(!row.$type || row.$type === \'r\')\" ng-url=\"admin/orangTua/reset&id={{row.id}}\" title=\"Reset Password\" onClick=\"return confirm(\'Are you sure?\')\"
    class=\"btn-block btn btn-warning btn-xs\"><i class=\"fa fa-key\"></i></a>
</td>',
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