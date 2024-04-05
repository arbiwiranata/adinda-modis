<?php

class AdminAnakAnakAssessmentsSubform extends AnakAssessment {

    public function getForm() {
        return array (
            'title' => 'Anak Anak Assessments Subform',
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
                'column1' => array (
                    array (
                        'label' => 'Assessment',
                        'name' => 'assessment_id',
                        'relationCriteria' => array (
                            'select' => '',
                            'distinct' => 'false',
                            'alias' => 't',
                            'condition' => '{[search]}',
                            'order' => 't.nama',
                            'group' => '',
                            'having' => '',
                            'join' => '',
                        ),
                        'modelClass' => 'app.models.MAssessment',
                        'idField' => 'id',
                        'labelField' => 'nama',
                        'type' => 'RelationField',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '<column-placeholder></column-placeholder>',
                    ),
                ),
                'column2' => array (
                    array (
                        'label' => 'Judul Assessment',
                        'name' => 'judul_assessment',
                        'fieldOptions' => array (
                            'auto-grow' => 'true',
                        ),
                        'type' => 'TextArea',
                    ),
                    array (
                        'label' => 'File',
                        'name' => 'file',
                        'type' => 'UploadFile',
                        'fileType' => 'pdf',
                        'uploadPath' => 'repo/anak/assessment',
                        'showFileName' => 'Yes',
                        'restrict' => '1000',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '<column-placeholder></column-placeholder>',
                    ),
                ),
                'w1' => '50%',
                'w2' => '50%',
                'type' => 'ColumnField',
            ),
        );
    }

}