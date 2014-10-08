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
$enrolmentreqs = array();
$enrolmentreqs[] = array(
    'RequestedCourseIndex' => 1, // enrolment_request_idstr
    'UserIndex' => '3', // sis_user_idstr
    'CourseIndex' => 30, // master_course_idstr
    'StartDate' => '2014-06-11 01:01:01', // start_date - 'Format: YYYY-MM-DD HH:MM:SS'
    'PodIdList' => '2', // asmt_pod_id_list - "Pipe-delimited list of PodIds"
    'Approved' => 1, // approval_status_idstr 'We will make this field required after you begin sending it.' - Note: it doesn't seem this field is used,
);


/**
 * Enrolments
 */
$enrolments = array();
$enrolments[] = array(
    'EnrollmentIndex' => 1, // enrolment_idstr
    'SectionIndex' => 1, // classroom_idstr
    'UserIndex' => '3', // sis_user_idstr
    'PodIdList' => '2', // asmt_pod_id_list - "Pipe-delimited list of PodIds"
    'Status' => 'ACTIVE', // status_idstr - "One of: ACTIVE, WITHDRAWN_NO_GRADE, WITHDRAWN_FAILING, COMPLETED"
    'CurrentGrade' => null, // current_grade_from_sis - "VLACS will only use this in case of an override coming from the SIS (ex: estart)"
    'CurrentAssignment' => null, // current_assignment_from_sis - "the current number of assessments that have been completed - VLACS will only use this in the case of an override coming from the SIS (ex: estart)"
    'TotalAssignments' => null, // total_assignments_from_sis - "the total number of assessments that must be completed - VLACS will only use this in the case of an override coming from the SIS (ex: estart)"
    'ActivationStatus' => 'ENABLED', // activation_status_idstr - "One of: ENABLED, CONTACT_INSTRUCTOR"
    'CreditLevel' => 1, // credit_level
    'force' => 0, // force_recalculations - "do not short-circuit processing even if there appear to be no changes" - this will trigger data pull from moosis
    'RequestedCourseIndex' => 1, // enrolment_request_idstr
    'EndDate' => '10 September 2040', // proposed_completion_date - MUST BE FILLED OTHERWISE A GENIUS API CALL IS EXECUTED - strtotime will be apply to this date
    'ExitDate' => '20 September 2040', // actual_exit_date - MUST BE FILLED OTHERWISE A GENIUS API CALL IS EXECUTED - strtotime will be apply to this date
    'ActualStartDate' => 'now', // actual_start_date - strtotime will be apply to this date
    'EntryDate' => 'now', // enrolment_date - strtotime will be apply to this date
);


/**
 * Standards
 **/
$standards = array();
$standards[] = array(
    'standard_type_id' => 3,
    'name' => 'F:5.2',
    'description' => 'Students show evidence of becoming life-long learners by using the language for personal enjoyment and enrichment.',
    'keywords' => ''
);


/**
 * Standard tags
 **/
$standardtags = array();
$standardtags[] = array(
    'standard_id' => 1,
    'name' => 'Category',
    'value' => 'Using Probability To Make Decisions'
);
$standardtags[] = array(
    'standard_id' => 1,
    'name' => 'Sub Category',
    'value' => 'Use Probability To Evaluate Outcomes Of Decisions'
);

/**
 * Affiliation
 **/
$affiliations = array();
$affiliations[] = array(
    'AffiliationIndex' => 11, // sis_affiliation_idstr
    'Name' => 'Fish School', // name
    'ContactName' => 'Mr. Sturgeon', // contactname
    'ContactPhone' => '001-867-5309', // contactphone
    'ContactEmail' => 'info@fish.org', // contactemail
    'Status' => 'ACTIVE', // status_idstr
    'Street' => 'PO Box 1234', // street
    'City' => 'Saskatoon', // city
    'State' => 'Grenada', // state
    'Country' => 'YE', // country
    'ZIP' => '12345-1442', // zip
    'Notes' => '', // notes
    'BillSetIndex' => '', // sis_billset_idstr
    'DistrictCode' => 291, // districtcode
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
 *
 * The attributs are:
 * - the fields from the 'assignment' table.
 * - a 'classroom_idstr' attribut (to know which course is concerned).
 **/
$assessments = array();
$assessments[] = array(
    'classroom_idstr' => 1,
    'name' => 'An offline assignment',
    'description' => 'This is an offline assignment.',
    'grade' => 100
);
