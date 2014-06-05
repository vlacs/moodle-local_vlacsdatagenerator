<?php
require_once((dirname(dirname(dirname(__FILE__)))) . '/config.php');

// Install the three pod types.
$asmtpodtypes = array();
$asmtpodtype = new stdClass();
$asmtpodtype->name = 'Competency';
$asmtpodtype->description_req = 1;
$asmtpodtype->isordered = 0;
$asmtpodtype->content_group_halo_req = 1;
$asmtpodtype->transcript_credit_type_id = 2;
$asmtpodtype->isdefault_selection = 0;
$asmtpodtypes[] = $asmtpodtype;
$asmtpodtype = new stdClass();
$asmtpodtype->name = 'Segment';
$asmtpodtype->description_req = 0;
$asmtpodtype->isordered = 1;
$asmtpodtype->content_group_halo_req = 0;
$asmtpodtype->transcript_credit_type_id = 1;
$asmtpodtype->isdefault_selection = 1;
$asmtpodtypes[] = $asmtpodtype;
$asmtpodtype = new stdClass();
$asmtpodtype->name = 'Module';
$asmtpodtype->description_req = 1;
$asmtpodtype->isordered = 0;
$asmtpodtype->content_group_halo_req = 0;
$asmtpodtype->transcript_credit_type_id = 3;
$asmtpodtype->isdefault_selection = 0;
$asmtpodtypes[] = $asmtpodtype;
foreach($asmtpodtypes as $asmtpodtype) {
    if (!record_exists('asmt_pod_type', 'name', $asmtpodtype->name)) {
        insert_record('asmt_pod_type', $asmtpodtype);
    }
}

$asmtpods = array();
$asmtpod = new stdClass();
$asmtpod->name = 'Segment 1';
//$asmtpod->description = '';
$asmtpod->master_course_version_id = 1;
$asmtpod->asmt_pod_type_id = 2;
//$asmtpod->keywords = '';
$asmtpod->num = 1;
$asmtpod->percent_transcript_credit = 50.00;
//$asmtpod->pct_transcript_cred_overridden = 0;
$asmtpod->timecreated = 1318055592;
$asmtpod->timemodified = 1318055592;
$asmtpod->status_idstr = 'ACTIVE';
$asmtpods[] = $asmtpod;
foreach($asmtpods as $asmtpod) {
    if (!record_exists('asmt_pod', 'name', $asmtpod->name)) {
        insert_record('asmt_pod', $asmtpod);
    }
}

$asmts = array();
$asmt = new stdClass();
$asmt->name = '01.00 Course Diagnostic Assessment';
$asmt->master_course_version_id = 1;
$asmt->assessment_idstr = '01.00coursediagnosticassessment';
$asmt->points = 1.00;
$asmt->intro_req = 0;
$asmt->honors_req = 1;
$asmt->nonhonors_req = 1;
$asmt->isextra_credit = 0;
$asmt->isexam = 0;
$asmt->attempts = 2;
$asmt->password_req = 0;
$asmt->content_group_num = 1;
$asmt->pw_current = 'a54c27';
$asmt->pw_next = 'ab6548';
$asmt->isenabled = 1;
$asmt->timecreated = 1318055592;
$asmt->timemodified = 1318055592;
$asmts[] = $asmt;
foreach($asmts as $asmt) {
    var_dump($asmt->name);
    var_dump(record_exists('assessment', 'name', $asmt->name));
    if (!record_exists('assessment', 'name', $asmt->name)) {
        insert_record('assessment', $asmt);
    }
}