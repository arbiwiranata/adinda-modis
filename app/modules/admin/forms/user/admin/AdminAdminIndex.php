<?php

class AdminAdminIndex extends Pegawai {

    public function getForm() {
        return array (
            'title' => 'Daftar Admin ',
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
                'linkBar' => array (
                    array (
                        'label' => 'Tambah Admin',
                        'buttonType' => 'success',
                        'icon' => 'plus',
                        'options' => array (
                            'href' => 'url:/admin/admin/edit',
                        ),
                        'type' => 'LinkButton',
                    ),
                ),
                'title' => 'Daftar Admin',
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
                        'name' => 't.nip_nik',
                        'label' => 'NIP / NIK',
                        '$showDF' => false,
                        'defaultOperator' => '',
                        'defaultValue' => '',
                        'isCustom' => 'No',
                        'resetable' => 'Yes',
                    ),
                    array (
                        'filterType' => 'string',
                        'name' => 't.nama',
                        'label' => 'Nama',
                        '$showDF' => false,
                        'defaultOperator' => '',
                        'defaultValue' => '',
                        'isCustom' => 'No',
                        'resetable' => 'Yes',
                    ),
                    array (
                        'filterType' => 'relation',
                        'name' => 't.pegawai_id',
                        'label' => 'Atasan',
                        'relModelClass' => 'app.models.Pegawai',
                        'relIdField' => 'id',
                        'relParams' => array (),
                        'relCriteria' => array (
                            'select' => '',
                            'distinct' => 'false',
                            'alias' => 't',
                            'condition' => '{[search]}',
                            'order' => '',
                            'group' => '',
                            'having' => '',
                            'join' => '',
                        ),
                        'relLabelField' => 'nama',
                        '$showDF' => false,
                        'defaultValue' => '',
                        'isCustom' => 'No',
                        'resetable' => 'Yes',
                        'list' => 0,
                        'count' => 0,
                    ),
                    array (
                        'filterType' => 'relation',
                        'name' => 't.jenis_kelamin_id',
                        'label' => 'Jenis Kelamin',
                        '$showDF' => false,
                        'defaultValue' => '',
                        'isCustom' => 'No',
                        'resetable' => 'Yes',
                        'relParams' => array (),
                        'relCriteria' => array (
                            'select' => '',
                            'distinct' => 'false',
                            'alias' => 't',
                            'condition' => '{[search]}',
                            'order' => '',
                            'group' => '',
                            'having' => '',
                            'join' => '',
                        ),
                        'relModelClass' => 'app.models.MJenisKelamin',
                        'relIdField' => 'id',
                        'relLabelField' => 'nama',
                        'list' => 0,
                        'count' => 0,
                    ),
                    array (
                        'filterType' => 'date',
                        'name' => 't.mulai_bekerja',
                        'label' => 'Mulai Bekerja',
                        '$showDF' => false,
                        'defaultOperator' => '',
                        'defaultValue' => '',
                        'defaultValueFrom' => '',
                        'defaultValueTo' => '',
                        'isCustom' => 'No',
                        'resetable' => 'Yes',
                    ),
                    array (
                        'name' => 'jabatan_id',
                        'label' => 'Jabatan',
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
                        'relModelClass' => 'app.models.MJabatan',
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
                        'name' => 't.is_aktif',
                        'label' => 'Status',
                        '$showDF' => false,
                        'defaultValue' => '',
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
                    ':jabatan_id' => 'js: dataFilter1.filters[5].value',
                    ':is_aktif' => 'js: dataFilter1.filters[6].value',
                ),
                'relationTo' => 'currentModel',
                'relationCriteria' => array (
                    'select' => 't.*, p.nama AS atasan, jk.nama AS jenis_kelamin, jb.jabatan',
                    'distinct' => 'false',
                    'alias' => 't',
                    'condition' => 'EXISTS (
SELECT 1
FROM p_user pu
LEFT JOIN p_user_role pur ON pu.id = pur.user_id
WHERE pu.pegawai_id = t.id AND pur.role_id = 2
) {AND jb.jabatan_id @> TO_JSONB(:jabatan_id)} {AND t.is_aktif = :is_aktif} {AND [where]}',
                    'order' => '{[order]}',
                    'paging' => '{[paging]}',
                    'group' => '',
                    'having' => '',
                    'join' => 'INNER JOIN m_jenis_kelamin jk ON jk.id = t.jenis_kelamin_id
LEFT JOIN pegawai p ON p.id = t.pegawai_id
LEFT JOIN LATERAL (
SELECT JSONB_AGG(pj.jabatan_id) AS jabatan_id, STRING_AGG(j.nama, \', \' ORDER BY j.nama) AS jabatan
FROM pegawai_jabatan pj
INNER JOIN m_jabatan j on j.id = pj.jabatan_id
WHERE pj.pegawai_id = t.id
) jb ON TRUE',
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
                        'name' => 'nip_nik',
                        'label' => 'NIP NIK',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'default',
                        'html' => '<td class=\"col-1 \" ng-class=\"rowClass(row, \'nip_nik\', \'string\')\" >
    {{row[\'nip_nik\']}}
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
                        'name' => 'atasan',
                        'label' => 'Atasan',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'default',
                        'html' => '<td class=\"col-2 \" ng-class=\"rowClass(row, \'pegawai_id\', \'string\')\" >
    {{row[\'pegawai_id\']}}
</td>',
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
                        'name' => 'mulai_bekerja',
                        'label' => 'Mulai Bekerja',
                        '$listViewName' => 'columns',
                        '$showDF' => false,
                    ),
                    array (
                        'name' => 'jabatan',
                        'label' => 'Jabatan',
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
                            'mode' => 'del-button',
                            'delUrl' => 'admin/admin/delete&id={{row.id}}',
                        ),
                        '$listViewName' => 'columns',
                        '$showDF' => true,
                        'mergeSameRow' => 'No',
                        'cellMode' => 'default',
                        'html' => '<td style=\"width:35px;\" class=\"col-9 \" ng-class=\"rowClass(row, \'\', \'string\')\" >
    <a ng-if=\"(!row.$type || row.$type === \'r\')\" ng-url=\"admin/pegawai/delete&id={{row.id}}\"
    onClick=\"return confirm(\'Are you sure?\')\"
    class=\"btn-block btn btn-danger btn-xs\"><i class=\"fa fa-trash\"></i></a>
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