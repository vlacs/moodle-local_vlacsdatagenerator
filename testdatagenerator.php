<?php
/**
 * Test data generator for vlacs Moodle
 */

// Load Moodle config file.
require_once((dirname(dirname(dirname(__FILE__)))) . '/config.php');

// Load the test data generator library.
require_once($CFG->dirroot . '/local/vlacsdatagenerator/locallib.php');

// Load the test data - you can edit this file with your own test data.
require_once($CFG->dirroot . '/local/vlacsdatagenerator/testdata.php');

// Load the DB static data generator - you should not have to change this file,
// except if some new data have been manually added to the DB of all Moodle test sites.
require_once($CFG->dirroot . '/local/vlacsdatagenerator/staticdatagenerator.php');

// Load the assessment manager library - it is need for creating assessmenet pods and other things.
require_once($CFG->dirroot . "/blocks/assessment_manager/lib.php");

// Check the API incoming token is set.
if (empty($CFG->genius_api_token_incoming)) {
    print_r('ERROR: set a value to $CFG->genius_api_token_incoming in your Moodle site config.php file.<br/><br/>');
    die();
}

// Check your IP is whitelisted.
if (empty($_SERVER['SERVER_ADDR'])) {
    $serverip = '127.0.0.1';
} else {
    $serverip = $_SERVER['SERVER_ADDR'];
}

if (empty($CFG->genius_api_client_ips) ||
    !in_array($serverip , $CFG->genius_api_client_ips)) {

    print_r('ERROR: add your IP: $CFG->genius_api_client_ips[]=\''.$serverip.'\'; in your Moodle site config.php file.<br/><br/>');
    die();
}

// Display the header admin page.
require_once($CFG->libdir.'/adminlib.php');
admin_externalpage_setup('vlacstestdatagenerator');
echo $OUTPUT->header();

// Display the web service documentation.
//call();


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

// Create some assessment pods.
// Obviously this is not a ws, but we need to create the pods before creating the enrolment.
foreach($asmtpods as $asmtpod) {
    $asmtpod = (object) $asmtpod;
    // this is basically the code logic of asmt_pod/edit.php without the call to the Genius API (i.e. not push of data in the SIS).
    $pod = $DB->get_record('asmt_pod', array('name' => $asmtpod->name, 'master_course_version_id' => $asmtpod->master_course_version_id));
    amgr_ensure_mcv2apt_exists($asmtpod->master_course_version_id, $asmtpod->asmt_pod_type_id);
    $asmtpod->timemodified = time();
    if (empty($pod)) {
        $asmtpod->timecreated = $asmtpod->timemodified;
        $asmtpod->id = $DB->insert_record('asmt_pod', $asmtpod);
        $successtext = 'pod created.';
    } else {
        $asmtpod->id = $pod->id;
        $DB->update_record('asmt_pod', $asmtpod);
        $successtext = 'pod updated.';
    }
    amgr_reset_asmt_grades_dirtypods(array($asmtpod->id));

    print_r('"'.$asmtpod->name . '" ');
    print_r($successtext);
    print_r('<br/><br/>');
}

foreach($enrolmentreqs as $enrolmentreq) {
    call('updaterequestedcourse', $enrolmentreq);
}
foreach($enrolments as $enrolment) {
    call('updateenrollment', $enrolment);
}

// Fill up the database with some test data calling some assessment manager functions.

// Create some standards.
foreach($standards as $standard) {
    $standard = (object) $standard;

    // this is basically the code logic of process_common_core.php.
    $astandard = $DB->get_record('standard', array('name' => $standard->name, 'standard_type_id' => $standard->standard_type_id));
    if (empty($astandard)) {
        $standard->timecreated = time();
        $standard->id = $DB->insert_record('standard', $standard);
        $successtext = 'standard created.';
    } else {
        $standard->id = $astandard->id;
        $DB->update_record('standard', $standard);
        $successtext = 'standard updated.';
    }

    print_r('"'.$standard->name . '" ');
    print_r($successtext);
    print_r('<br/><br/>');
}

// Create some standard tags.
foreach($standardtags as $standardtag) {
    $standardtag = (object) $standardtag;

    // this is basically the code logic of process_common_core.php.
    $wheresql = $DB->sql_compare_text('value') . ' = ' . $DB->sql_compare_text(':value') . 'AND name = :name';
    $astandardtag = $DB->get_record_select('standard_tag', $wheresql, array('name' => $standardtag->name, 'value' => $standardtag->value));
    if (empty($astandardtag)) {
        $standardtag->id = $DB->insert_record('standard_tag', $standardtag);
        $successtext = 'standard tag created.';
    } else {
        $standardtag->id = $astandardtag->id;
        $DB->update_record('standard_tag', $standardtag);
        $successtext = 'standard tag updated.';
    }

    print_r('"'.$standardtag->name . '" ');
    print_r($successtext);
    print_r('<br/><br/>');
}

// Create an assignment for each courses and trigger the assessment generation code.
foreach($assessments as $assessment) {
    $dbcourse = $DB->get_record('course', array('idnumber' => $assessment['classroom_idstr']));

    // Create an assignment - Code logic from course/modedit.php
    if (!$DB->record_exists('assign', array('name' => $assessment['name']))) {

        $coursemodule = new stdClass();
        $coursemodule->add = 'assign';
        $coursemodule->modulename = 'assign';
        $coursemodule->grade = 100;
        $coursemodule->course = $dbcourse->id;
        $coursemodule->section = 1;
        $coursemodule->visible = 1;
        $coursemodule->timeavailable = 1402565100;
        $coursemodule->timedue = 1403169900;
        $coursemodule->groupmode = 0;
        $coursemodule->module = 1;
        $instance = (object) $assessment;
        $instance->course = $dbcourse->id;
        $instance->timedue = $coursemodule->timedue;
        $instance->timeavalailable = $coursemodule->timeavailable;
        $instance->cmidnumber = null;
        $instance->intro = 'this is an intro';
        $instance->introformat = FORMAT_HTML;
        $instance->submissiondrafts = 0;
        $instance->requiresubmissionstatement = 0;
        $instance->sendnotifications = 0;
        $instance->sendlatenotifications = 0;
        $instance->sendstudentnotifications = 0;
        $instance->allowsubmissionsfromdate = 0;
        $instance->completionsubmit = 0;
        $instance->teamsubmission = 0;
        $instance->requireallteammemberssubmit = 0;
        $instance->attemptreopenmethod = 0;
        $instance->cutoffdate = 0;
        $instance->duedate = 0;
        $instance->blindmarking = 0;
        $instance->markingworkflow = 0;
        $instance->markingallocation = 0;
        $PAGE->set_context(context_course::instance($dbcourse->id));
        require_once($CFG->dirroot . '/course/lib.php');
        require_once($CFG->dirroot . '/mod/assign/lib.php');
        $coursemodule->coursemodule = add_course_module($coursemodule);
        $instance->coursemodule = $coursemodule->coursemodule;
        $coursemodule->instance = assign_add_instance($instance);
        $DB->set_field('course_modules', 'instance', $coursemodule->instance, array('id'=>$coursemodule->coursemodule));
        $sectionid =  course_add_cm_to_section($coursemodule->course, $coursemodule->coursemodule, $coursemodule->section);
        $DB->set_field("course_modules", "section", $sectionid, array("id" => $coursemodule->coursemodule));
        set_coursemodule_visible($coursemodule->coursemodule, $coursemodule->visible);
        if (isset($coursemodule->cmidnumber)) {
            set_coursemodule_idnumber($coursemodule->coursemodule, $coursemodule->cmidnumber);
        }
        if ($grade_item = grade_item::fetch(array('itemtype'=>'mod', 'itemmodule'=>$coursemodule->modulename,
            'iteminstance'=>$coursemodule->instance, 'itemnumber'=>0, 'courseid'=>$COURSE->id))) {
            if ($grade_item->idnumber != $coursemodule->cmidnumber) {
                $grade_item->idnumber = $coursemodule->cmidnumber;
                $grade_item->update();
            }
        }
        $items = grade_item::fetch_all(array('itemtype'=>'mod', 'itemmodule'=>$coursemodule->modulename,
            'iteminstance'=>$coursemodule->instance, 'courseid'=>$COURSE->id));
        if ($items and isset($coursemodule->gradecat)) {
            if ($coursemodule->gradecat == -1) {
                $grade_category = new grade_category();
                $grade_category->courseid = $COURSE->id;
                $grade_category->fullname = stripslashes($coursemodule->name);
                $grade_category->insert();
                if ($grade_item) {
                    $parent = $grade_item->get_parent_category();
                    $grade_category->set_parent($parent->id);
                }
                $coursemodule->gradecat = $grade_category->id;
            }
            foreach ($items as $itemid=>$unused) {
                $items[$itemid]->set_parent($coursemodule->gradecat);
                if ($itemid == $grade_item->id) {
                    // use updated grade_item
                    $grade_item = $items[$itemid];
                }
            }
        }
        // Note: we skip outcome code logic.

        rebuild_course_cache($dbcourse->id);
        grade_regrade_final_grades($dbcourse->id);

        // Now we generate the assessment for the activity.
        $messages = amgr_update($dbcourse);
        print_r($messages . ' ');
        print_r('"'.$instance->name . '" assignment and assessment created.');
        print_r('<br/><br/>');
    }
}

echo $OUTPUT->footer();

