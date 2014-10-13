<?php
/*
 * This file install data which has been manually entered into the VLACS database.
 */

// Load Moodle config file.
require_once((dirname(dirname(dirname(__FILE__)))) . '/config.php');

// Load the static data. Edit this file only if the values change in production database.
require_once($CFG->dirroot . '/local/vlacsdatagenerator/staticdata.php');

// Insert/update the pod types.
foreach($asmtpodtypes as $asmtpodtype) {
    $asmtpodtype->id = $DB->get_field('asmt_pod_type', 'id', array('name' => $asmtpodtype->name));
    if (!$asmtpodtype->id) {
        $podtypeid = $DB->insert_record('asmt_pod_type', $asmtpodtype);
        if ($podtypeid) {
            print_r($asmtpodtype->name . ' pod type created.<br/>');
        }
    } else {
        // Uncomment if you need to change the pod type values.
        //update_record('asmt_pod_type', $asmtpodtype);
        //print_r($asmtpodtype->name . ' pod type updated.<br/>');
    }
}

// Insert/update the standard types.
foreach($standardtypes as $standardtype) {
    $standardtype->id = $DB->get_field('standard_type', 'id', array('name' => $standardtype->name));
    if (!$standardtype->id) {
        $standardtypeid = $DB->insert_record('standard_type', $standardtype);
        if ($standardtypeid) {
            print_r($standardtype->name . ' standard type created.<br/>');
        }
    } else {
        // Uncomment if you need to change the pod type values.
        //update_record('standard_type', $standardtype);
        //print_r($standardtype->name . ' standard type updated.<br/>');
    }
}

// Insert/update the transcript credit types.
foreach($transcriptcredittypes as $transcriptcredittype) {
    $transcriptcredittype->id = $DB->get_field('pod_transcript_credit_type', 'id', array('name' => $transcriptcredittype->name));
    if (!$transcriptcredittype->id) {
        $transcriptcredittypeid = $DB->insert_record('pod_transcript_credit_type', $transcriptcredittype);
        if ($transcriptcredittypeid) {
            print_r($transcriptcredittype->name . ' transcript credit type created.<br/>');
        }
    } else {
        // Uncomment if you need to change the pod type values.
        //update_record('pod_transcript_credit_type', $transcriptcredittype);
        //print_r($transcriptcredittype->name . ' transcript credit type updated.<br/>');
    }
}

