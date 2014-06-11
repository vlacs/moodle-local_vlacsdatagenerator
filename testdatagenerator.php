<?php
/**
 * Test data generator for vlacs Moodle
 * Return JSON or XML format
 *
 * @author Jerome Mouneyrac
 */

// Load Moodle config file
require_once((dirname(dirname(dirname(__FILE__)))) . '/config.php');

// Load the test data generator library
require_once('./locallib.php');

// Load the test data - you can edit this file with your own test data.
require_once('./testdata.php');

// Load the DB static data generator - you should not have to change this file,
// except if some new data have been manually added to the DB of all Moodle test sites.
require_once('./staticdatagenerator.php');

// GENERAL SETUP
$token = $CFG->genius_api_token_incoming;
$domainname = $CFG->wwwroot;
$qworker = true;
$restformat = 'xml';


if (empty($CFG->genius_api_token_incoming)) {
    print_r('ERROR: set a value to $CFG->genius_api_token_incoming in your Moodle site config.php file.');
}


// Display the web service documentation.
$functionname = 'documentation';
$params = array();
call($domainname, $token, $functionname, $restformat, $params, $qworker);


// Our needs:
// create course
// create three users
// student enrol in the course (updateenrolment function)
// add guardians for the 3 students
// classrooms, one per course than contain 1 teacher
// enrol the student in the classrooms.
// create three activities into the 3 courses - trigger the code to create assessment
// create pods
// create a enrolment request by ws
// create 2 standard
// create standard tag (category / subcategory)
// create an affiliation
// create a department
// add a communication

// Trigger a grade of a user to see if the progress table and grade assessment is done.
// Also try to trigger finish from survey to see if the bonus is applyied.




//// ADD SOME MASTER COURSES
//$functionname = 'updatecourse';
//$params = array(
//    'CourseIndex' => 30, // master_course_idstr
//    'Name' => 'AP Microeconomics', // name
//    'Notes' => '', // description
//    'CurrentVersion' => 'v9_gs', // current_version
//    'FundingCreditValue' => 0.5, // funding_credit
//    'LMSIDSTRING' => 'MOODLE', // lms_idstr
//    'DepartmentIndex' => '11' // department_idstr
//);
//call($domainname, $token, $functionname, $restformat, $params, $qworker);
//
//
//$functionname = 'updatecourse';
//$params = array(
//    'CourseIndex' => 31, // master_course_idstr
//    'Name' => 'AP Macroeconomics', // name
//    'Notes' => '', // description
//    'CurrentVersion' => 'v9_gs', // current_version
//    'FundingCreditValue' => 0.5, // funding_credit
//    'LMSIDSTRING' => 'MOODLE', // lms_idstr
//    'DepartmentIndex' => '11' // department_idstr
//);
//call($domainname, $token, $functionname, $restformat, $params, $qworker);
//
//$functionname = 'updatecourse';
//$params = array(
//    'CourseIndex' => 48, // master_course_idstr
//    'Name' => 'eStart American Government', // name
//    'Notes' => '', // description
//    'CurrentVersion' => 'FIXME', // current_version
//    'FundingCreditValue' => 1.00, // funding_credit
//    'LMSIDSTRING' => 'MOODLE', // lms_idstr
//    'DepartmentIndex' => '20' // department_idstr
//);
//call($domainname, $token, $functionname, $restformat, $params, $qworker);

//$functionname = 'updateuser';
//$params = array(
//    'UserIndex' => '1', // sis_user_idstr
//    'UserName' => 'sisuser1', // username
//    'Password' => 'sisuser1', // password
//    'Privilege' => 'TEACHER', // privilege - One of: STUDENT, TEACHER, ADMIN, GUARDIAN, INACTIVE, DEVELOPER (or a new value added by the institution)
//    'LastName' => 'Teacher', // lastname
//    'FirstName' => 'Sis', // firstname
//    'Email' => 'mouneyrac@gmail.com', // email
//    'UserIndexPrimary' => '', // sis_user_idstr_parent - If this is NOT NULL, there can be no other user with UserIndexPrimary = this UserIndex. In other words: there is no multi-generational relation possible.
//);
//call($domainname, $token, $functionname, $restformat, $params, $qworker);
//
//$functionname = 'updateuser';
//$params = array(
//    'UserIndex' => '2', // sis_user_idstr
//    'UserName' => 'sisuser2', // username
//    'Password' => 'sisuser2', // password
//    'Privilege' => 'GUARDIAN', // privilege - One of: STUDENT, TEACHER, ADMIN, GUARDIAN, INACTIVE, DEVELOPER (or a new value added by the institution)
//    'LastName' => 'Guardian', // lastname
//    'FirstName' => 'Sis', // firstname
//    'Email' => 'mouneyrac@hotmail.com', // email
//    'UserIndexPrimary' => '', // sis_user_idstr_parent - If this is NOT NULL, there can be no other user with UserIndexPrimary = this UserIndex. In other words: there is no multi-generational relation possible.
//);
//call($domainname, $token, $functionname, $restformat, $params, $qworker);
//
//$functionname = 'updateuser';
//$params = array(
//    'UserIndex' => '3', // sis_user_idstr
//    'UserName' => 'sisuser3', // username
//    'Password' => 'sisuser3', // password
//    'Privilege' => 'STUDENT', // privilege - One of: STUDENT, TEACHER, ADMIN, GUARDIAN, INACTIVE, DEVELOPER (or a new value added by the institution)
//    'LastName' => 'Student', // lastname
//    'FirstName' => 'Sis', // firstname
//    'Email' => 'mouneyrac2@hotmail.com', // email
//    'UserIndexPrimary' => 2, // sis_user_idstr_parent - If this is NOT NULL, there can be no other user with UserIndexPrimary = this UserIndex. In other words: there is no multi-generational relation possible.
//);
//call($domainname, $token, $functionname, $restformat, $params, $qworker);

//$functionname = 'updatesection';
//$params = array(
//    'SectionIndex' => 1, // classroom_idstr
//    'courseIndex' => 30, // master_course_idstr
//    'Name' => 'AP Microeconomics-v9_gs-Teacher1-1404', // name
//    'Notes' => '', // description
//    'PrimaryTeacherUserIndex' => 1, // sis_user_idstr - UserIndex values for user mapped directly to the primary teacher of this section.
//    'UserIndexList' => '1|2', // sis_user_idstr_list - Pipe-delimited list of UserIndex values for all users mapped to the Teacher of this section. The primary teacher MUST be first.
//    'Status' => 'ACTIVE',
//    'Version' => 'v9_gs', // current_version
//    'FundingCreditValue' => 0.50, // funding_credit
//    'LMSIDSTRING' => 'MOODLE', // lms_idstr
//);
//call($domainname, $token, $functionname, $restformat, $params, $qworker);
//
//$functionname = 'updateenrollment';
//$params = array(
//    'EnrollmentIndex' => '', // enrolment_idstr
//    'SectionIndex' => '', // classroom_idstr
//    'UserIndex' => '', // sis_user_idstr
//    'PodIdList' => '', // asmt_pod_id_list
//    'Status' => 'ACTIVE', // sis_user_idstr - UserIndex values for user mapped directly to the primary teacher of this section.
//    'CurrentGrade' => '', // sis_user_idstr_list - Pipe-delimited list of UserIndex values for all users mapped to the Teacher of this section. The primary teacher MUST be first.
//    'CurrentAssignment' => '',
//    'TotalAssignments' => '', // current_version
//    'ActivationStatus' => '', // funding_credit
//    'CreditLevel' => '', // lms_idstr
//    'force' => '', // sis_user_idstr - UserIndex values for user mapped directly to the primary teacher of this section.
//    'RequestedCourseIndex' => '', // sis_user_idstr_list - Pipe-delimited list of UserIndex values for all users mapped to the Teacher of this section. The primary teacher MUST be first.
//    'EndDate' => '',
//    'ExitDate' => '', // current_version
//    'ActualStartDate' => '', // funding_credit
//    'EntryDate' => '', // lms_idstr
//);
//call($domainname, $token, $functionname, $restformat, $params, $qworker);
//
//
//
//// Should be created by the code.
//$asmtpods = array();
//$asmtpod = new stdClass();
//$asmtpod->name = 'Segment 1';
////$asmtpod->description = '';
//$asmtpod->master_course_version_id = 1;
//$asmtpod->asmt_pod_type_id = 2;
////$asmtpod->keywords = '';
//$asmtpod->num = 1;
//$asmtpod->percent_transcript_credit = 50.00;
////$asmtpod->pct_transcript_cred_overridden = 0;
//$asmtpod->timecreated = 1318055592;
//$asmtpod->timemodified = 1318055592;
//$asmtpod->status_idstr = 'ACTIVE';
//$asmtpods[] = $asmtpod;
//foreach($asmtpods as $asmtpod) {
//    if (!record_exists('asmt_pod', 'name', $asmtpod->name)) {
//        insert_record('asmt_pod', $asmtpod);
//    }
//}

// Not need it should be created by the code.
//$asmts = array();
//$asmt = new stdClass();
//$asmt->name = '01.00 Course Diagnostic Assessment';
//$asmt->master_course_version_id = 1;
//$asmt->assessment_idstr = '01.00coursediagnosticassessment';
//$asmt->points = 1.00;
//$asmt->intro_req = 0;
//$asmt->honors_req = 1;
//$asmt->nonhonors_req = 1;
//$asmt->isextra_credit = 0;
//$asmt->isexam = 0;
//$asmt->attempts = 2;
//$asmt->password_req = 0;
//$asmt->content_group_num = 1;
//$asmt->pw_current = 'a54c27';
//$asmt->pw_next = 'ab6548';
//$asmt->isenabled = 1;
//$asmt->timecreated = 1318055592;
//$asmt->timemodified = 1318055592;
//$asmts[] = $asmt;
//foreach($asmts as $asmt) {
//    var_dump($asmt->name);
//    var_dump(record_exists('assessment', 'name', $asmt->name));
//    if (!record_exists('assessment', 'name', $asmt->name)) {
//        insert_record('assessment', $asmt);
//    }
//}