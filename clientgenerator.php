<?php
/**
 * REST client generator for vlacs Moodle
 * Return JSON or XML format
 *
 * @author Jerome Mouneyrac
 */

function call($domainname, $token, $functionname, $restformat, $params, $qworker) {
    /// REST CALL
    //header('Content-Type: text/plain');
    $serverurl = $domainname . '/blocks/geniusapis/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
    require_once('./curl.php');
    $curl = new curl;
//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
    $restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
    $resp = $curl->post($serverurl . $restformat . '&qworker=' . $qworker, $params);
    print_r($resp);
}

// GENERAL SETUP - NEED TO BE CHANGED
$token = 'acabec9d20933913f14301785324f579';
$domainname = 'http://localhost/m/stable_19_vlacs';
$restformat = 'xml';
$qworker = true;

$functionname = 'documentation';
$params = array();
call($domainname, $token, $functionname, $restformat, $params, $qworker);


//// ADD SOME MASTER COURSES
$functionname = 'updatecourse';
$params = array(
    'CourseIndex' => 30, // master_course_idstr
    'Name' => 'AP Microeconomics', // name
    'Notes' => '', // description
    'CurrentVersion' => 'v9_gs', // current_version
    'FundingCreditValue' => 0.5, // funding_credit
    'LMSIDSTRING' => 'MOODLE', // lms_idstr
    'DepartmentIndex' => '11' // department_idstr
);
call($domainname, $token, $functionname, $restformat, $params, $qworker);


$functionname = 'updatecourse';
$params = array(
    'CourseIndex' => 31, // master_course_idstr
    'Name' => 'AP Macroeconomics', // name
    'Notes' => '', // description
    'CurrentVersion' => 'v9_gs', // current_version
    'FundingCreditValue' => 0.5, // funding_credit
    'LMSIDSTRING' => 'MOODLE', // lms_idstr
    'DepartmentIndex' => '11' // department_idstr
);
call($domainname, $token, $functionname, $restformat, $params, $qworker);

$functionname = 'updatecourse';
$params = array(
    'CourseIndex' => 48, // master_course_idstr
    'Name' => 'eStart American Government', // name
    'Notes' => '', // description
    'CurrentVersion' => 'FIXME', // current_version
    'FundingCreditValue' => 1.00, // funding_credit
    'LMSIDSTRING' => 'MOODLE', // lms_idstr
    'DepartmentIndex' => '20' // department_idstr
);
call($domainname, $token, $functionname, $restformat, $params, $qworker);

$functionname = 'updateuser';
$params = array(
    'UserIndex' => '1', // sis_user_idstr
    'UserName' => 'sisuser1', // username
    'Password' => 'sisuser1', // password
    'Privilege' => 'TEACHER', // privilege - One of: STUDENT, TEACHER, ADMIN, GUARDIAN, INACTIVE, DEVELOPER (or a new value added by the institution)
    'LastName' => 'Teacher', // lastname
    'FirstName' => 'Sis', // firstname
    'Email' => 'mouneyrac@gmail.com', // email
    'UserIndexPrimary' => '', // sis_user_idstr_parent - If this is NOT NULL, there can be no other user with UserIndexPrimary = this UserIndex. In other words: there is no multi-generational relation possible.
);
call($domainname, $token, $functionname, $restformat, $params, $qworker);

$functioname = 'updateuser';
$params = array(
    'UserIndex' => '2', // sis_user_idstr
    'UserName' => 'sisuser2', // username
    'Password' => 'sisuser2', // password
    'Privilege' => 'GUARDIAN', // privilege - One of: STUDENT, TEACHER, ADMIN, GUARDIAN, INACTIVE, DEVELOPER (or a new value added by the institution)
    'LastName' => 'Guardian', // lastname
    'FirstName' => 'Sis', // firstname
    'Email' => 'mouneyrac@hotmail.com', // email
    'UserIndexPrimary' => '', // sis_user_idstr_parent - If this is NOT NULL, there can be no other user with UserIndexPrimary = this UserIndex. In other words: there is no multi-generational relation possible.
);
call($domainname, $token, $functionname, $restformat, $params, $qworker);

$functioname = 'updateuser';
$params = array(
    'UserIndex' => '3', // sis_user_idstr
    'UserName' => 'sisuser3', // username
    'Password' => 'sisuser3', // password
    'Privilege' => 'STUDENT', // privilege - One of: STUDENT, TEACHER, ADMIN, GUARDIAN, INACTIVE, DEVELOPER (or a new value added by the institution)
    'LastName' => 'Student', // lastname
    'FirstName' => 'Sis', // firstname
    'Email' => 'mouneyrac2@hotmail.com', // email
    'UserIndexPrimary' => 2, // sis_user_idstr_parent - If this is NOT NULL, there can be no other user with UserIndexPrimary = this UserIndex. In other words: there is no multi-generational relation possible.
);
call($domainname, $token, $functionname, $restformat, $params, $qworker);

//$functioname = 'updatesection';
//$params = array(
//    'SectionIndex' => 0, // classroom_idstr
//    'courseIndex' => 30, // master_course_idstr
//    'Name' => '', // name
//    'Notes' => '', // description
//    'PrimaryTeacherUserIndex' => 1, // sis_user_idstr - UserIndex values for user mapped directly to the primary teacher of this section.
//    'UserIndexList' => 1, // sis_user_idstr_list - Pipe-delimited list of UserIndex values for all users mapped to the Teacher of this section. The primary teacher MUST be first.
//    'Status' => 'ACTIVE',
//    'Version' => '', // current_version
//    'FundingCreditValue' => 1.00, // funding_credit
//    'LMSIDSTRING' => 'MOODLE', // lms_idstr
//);
//call($domainname, $token, $functionname, $restformat, $params, $qworker);