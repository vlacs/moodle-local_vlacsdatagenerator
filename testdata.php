<?php
// You can modify/add some test data.
// The attribut comments indicates what is the matching field name in the Moodle DB.

/**
 * Courses
 **/
$courses = array();
$courses[] = array(
    'CourseIndex' => 30, // master_course_idstr
    'Name' => 'AP Microeconomics', // name
    'Notes' => '', // description
    'CurrentVersion' => 'v9_gs', // current_version
    'FundingCreditValue' => 0.5, // funding_credit
    'LMSIDSTRING' => 'MOODLE', // lms_idstr
    'DepartmentIndex' => '11' // department_idstr
);


/**
 * Students
 **/
$students = array();
$students[] = array(
    'UserIndex' => '3', // sis_user_idstr
    'UserName' => 'sisuser3', // username
    'Password' => 'sisuser3', // password
    'Privilege' => 'STUDENT', // privilege - One of: STUDENT, TEACHER, ADMIN, GUARDIAN, INACTIVE, DEVELOPER (or a new value added by the institution)
    'LastName' => 'Student', // lastname
    'FirstName' => 'Sis', // firstname
    'Email' => 'mouneyrac2@hotmail.com', // email
    'UserIndexPrimary' => 2, // sis_user_idstr_parent - If this is NOT NULL, there can be no other user with UserIndexPrimary = this UserIndex. In other words: there is no multi-generational relation possible.
);


/**
 * Teachers
 **/
$teachers = array();
$teachers[] = array(
    'UserIndex' => '1', // sis_user_idstr
    'UserName' => 'sisuser1', // username
    'Password' => 'sisuser1', // password
    'Privilege' => 'TEACHER', // privilege - One of: STUDENT, TEACHER, ADMIN, GUARDIAN, INACTIVE, DEVELOPER (or a new value added by the institution)
    'LastName' => 'Teacher', // lastname
    'FirstName' => 'Sis', // firstname
    'Email' => 'mouneyrac@gmail.com', // email
    'UserIndexPrimary' => '', // sis_user_idstr_parent - If this is NOT NULL, there can be no other user with UserIndexPrimary = this UserIndex. In other words: there is no multi-generational relation possible.
);


/**
 * Guardians
 **/
$guardians = array();
$guardians[] = array(
    'UserIndex' => '2', // sis_user_idstr
    'UserName' => 'sisuser2', // username
    'Password' => 'sisuser2', // password
    'Privilege' => 'GUARDIAN', // privilege - One of: STUDENT, TEACHER, ADMIN, GUARDIAN, INACTIVE, DEVELOPER (or a new value added by the institution)
    'LastName' => 'Guardian', // lastname
    'FirstName' => 'Sis', // firstname
    'Email' => 'mouneyrac@hotmail.com', // email
    'UserIndexPrimary' => '', // sis_user_idstr_parent - If this is NOT NULL, there can be no other user with UserIndexPrimary = this UserIndex. In other words: there is no multi-generational relation possible.
);

/**
 * Student/Guardian relationships
 **/
$student2guardians = array();
$student2guardians[] = array(
    'TableIndex' => '1', // student2guardian_idstr
    'StudentUserIndex' => 'sisuser3', // student_user_idstr
    'GuardianUserIndex' => 'sisuser2', // guardian_user_idstr
    'Operation' => 0, // operation (if 'deleted' then it is marked as deleted)
);


/**
 * Classroom
 **/
$classrooms = array();
$classrooms[] = array(
    'SectionIndex' => 1, // classroom_idstr
    'courseIndex' => 30, // master_course_idstr
    'Name' => 'AP Microeconomics-v9_gs-Teacher1-1404', // name
    'Notes' => '', // description
    'PrimaryTeacherUserIndex' => 1, // sis_user_idstr - UserIndex values for user mapped directly to the primary teacher of this section.
    'UserIndexList' => '1|2', // sis_user_idstr_list - Pipe-delimited list of UserIndex values for all users mapped to the Teacher of this section. The primary teacher MUST be first.
    'Status' => 'ACTIVE',
    'Version' => 'v9_gs', // current_version
    'FundingCreditValue' => 0.50, // funding_credit
    'LMSIDSTRING' => 'MOODLE', // lms_idstr
);


/**
 * Assessment Pods
 **/
$asmtpods = array();
$asmtpods[] = array(
    'name' => 'Module 1: Decimals and Integers',
    'description' => 'Decimal Review,
                        Order of Operations,
                        Integers, Opposites, and Absolute Value,
                        Adding, Subtracting, Multiplying and Dividing Integers,
                        Variables and Expressions,
                        Applications,
                        Advanced: Perfect Squares, Square Roots, Pythagorean Theorem (Optional)
                        ',
    'master_course_version_id' => 1, // this is master_course_idstr == 30
    'asmt_pod_type_id' => 3, // pod type: 'Module'
    'keywords' => '',
    'num' => 1,
    'percent_transcript_credit' => 0,
    'pct_transcript_cred_override' => 0,
    'is_ptc_overridden' => 0,
    'status_idstr' => 'ACTIVE'
);
$asmtpods[] = array(
    'name' => 'Third Declension, Relative and Interrogative pronouns',
    'description' => 'Students will demonstrate an understanding of third declension,
    relative and interrogative pronouns through translations and use of appropriate pronouns based on context.',
    'master_course_version_id' => 1, // this is master_course_idstr == 30
    'asmt_pod_type_id' => 1, // pod type: 'Competency'
    'keywords' => '',
    'num' => null,
    'percent_transcript_credit' => 0,
    'pct_transcript_cred_override' => 0,
    'is_ptc_overridden' => 0,
    'status_idstr' => 'ACTIVE'
);
$asmtpods[] = array(
    'name' => 'Segment 1',
    'description' => '',
    'master_course_version_id' => 1, // this is master_course_idstr == 30
    'asmt_pod_type_id' => 2, // pod type: 'Segment'
    'keywords' => '',
    'num' => 1,
    'percent_transcript_credit' => 5000,
    'pct_transcript_cred_override' => 0,
    'is_ptc_overridden' => 0,
    'status_idstr' => 'ACTIVE'
);


/**
 * Enrolment requests
 **/

/**
 * Enrolments
 */
$enrolments = array();
//$enrolments[] = array(
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


/**
 * Standards
 **/


/**
 * Standard tags
 **/


/**
 * Affiliation
 **/
$affiliations = array();
$affiliations[] = array(
    'AffiliationIndex' => 11, // sis_affiliation_idstr
    'Name' => 'AbundantLivingChristianLearningCenter', // name
    'ContactName' => 'Abundant Living Christian Learning Center', // contactname
    'ContactPhone' => '603-498-8533', // contactphone
    'ContactEmail' => 'info@vlacs.org', // contactemail
    'Status' => 'ACTIVE', // status_idstr
    'Street' => 'PO Box 1442', // street
    'City' => 'Milton', // city
    'State' => 'New Hampshire', // state
    'Country' => 'US', // country
    'ZIP' => '03851-1442', // zip
    'Notes' => '', // notes
    'BillSetIndex' => '', // sis_billset_idstr
    'DistrictCode' => 129, // districtcode
);

/**
 * Department
 **/
$departments = array();
$departments[] = array(
    'DepartmentIndex' => 2, // department_idstr
    'Name' => 'Business Technology', // name
    'Status' => 'ACTIVE', // status_idstr
    'NeededCredits' => '', // needed_credits
);

/**
 * Communications
 **/
$communications = array();
$communications[] = array(
    'CommunicationIndex' => 1, // sis_comm_idstr
    'Type' => 'STUDENT', // type_idstr
    'Index' => 2, // sis_type_idstr
    'UserIndex' => 3, // sis_user_idstr
    'Date' => 'now', // date_string (strtotime supported value)
    'Confidential' => 0, // isconfidential
    'Category' => 'Email', // category_idstr
    'Subject' => 'This is an email', // sis_user_idstr
    'Contents' => 'This is an email content', // contents
);

/**
 * Assessments
 **/