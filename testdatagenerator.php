<?php
/**
 * Test data generator for vlacs Moodle
 */

// Load Moodle config file.
require_once((dirname(dirname(dirname(__FILE__)))) . '/config.php');

// Load the test data generator library.
require_once('./locallib.php');

// Load the test data - you can edit this file with your own test data.
require_once('./testdata.php');

// Load the DB static data generator - you should not have to change this file,
// except if some new data have been manually added to the DB of all Moodle test sites.
require_once('./staticdatagenerator.php');

// Load the assessment manager library - it is need for creating assessmenet pods and other things.
require_once($CFG->dirroot . "/blocks/assessment_manager/lib.php");

// Check the API incoming token is set.
if (empty($CFG->genius_api_token_incoming)) {
    print_r('ERROR: set a value to $CFG->genius_api_token_incoming in your Moodle site config.php file.<br/><br/>');
}

// Check your IP is whitelisted.
if (empty($CFG->genius_api_client_ips) ||
    !in_array($_SERVER['SERVER_ADDR'] , $CFG->genius_api_client_ips)) {
    print_r('ERROR: add your IP: $CFG->genius_api_client_ips[]=\''.$_SERVER['SERVER_ADDR'].'\'; in your Moodle site config.php file.<br/><br/>');
}

// Display the web service documentation.
//call();


// Tasks:
// student enrol in the course (updateenrolment function) by ws
// create three activities into the 3 courses - trigger the code to create assessment
// create a enrolment request by ws
// create 2 standard
// create standard tag (category / subcategory)
// Add a sis teacher
// Add a sis student
// Trigger a grade of a user to see if the progress table and grade assessment is done.
// Also try to trigger finish from survey to see if the bonus is applyied.

// Fill up the database with some test data calling assessment manager web services.
foreach($courses as $course) {
    call('updatecourse', $course);
}
foreach($teachers as $user) {
    call('updateuser', $user);
}
foreach($guardians as $user) {
    call('updateuser', $user);
}
foreach($students as $user) {
    call('updateuser', $user);
}
foreach($student2guardians as $student2guardian) {
    call('updatestudenttoguardian', $student2guardian);
}
foreach($classrooms as $classroom) {
    call('updatesection', $classroom);
}
foreach($departments as $department) {
    call('updatedepartment', $department);
}
foreach($affiliations as $affiliation) {
    call('updateaffiliation', $affiliation);
}
foreach($communications as $communication) {
    call('updatecomm', $communication);
}
foreach($enrolments as $enrolment) {
    call('updateenrollment', $enrolment);
}

// Fill up the database with some test data calling some assessment manager functions.

// Create some assessment pods.
foreach($asmtpods as $asmtpod) {
    $asmtpod = (object) $asmtpod;
    // this is basically the code logic of asmt_pod/edit.php without the call to the Genius API (i.e. not push of data in the SIS).
    $pod = get_record('asmt_pod', 'name', $asmtpod->name, 'master_course_version_id',
        $asmtpod->master_course_version_id);
    amgr_ensure_mcv2apt_exists($asmtpod->master_course_version_id, $asmtpod->asmt_pod_type_id);
    $asmtpod->timemodified = time();
    if (empty($pod)) {
        $asmtpod->timecreated = $asmtpod->timemodified;
        $asmtpod->id = insert_record('asmt_pod', $asmtpod);
        $successtext = 'pod created.';
    } else {
        $asmtpod->id = $pod->id;
        update_record('asmt_pod', $asmtpod);
        $successtext = 'pod updated.';
    }
    amgr_reset_asmt_grades_dirtypods(array($asmtpod->id));

    print_r('"'.$asmtpod->name . '" ');
    print_r($successtext);
    print_r('<br/><br/>');
}