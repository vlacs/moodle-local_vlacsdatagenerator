<?php
// Edit this file only if the values change in production database.

/**
 * Pod Types.
 */
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

/**
 * Standard Types
 */
$standardtypes = array();

$standardtype = new stdClass();
$standardtype->name = 'GSE';
$standardtype->description = 'Grade Span Expectation';
$standardtypes[] = $standardtype;

$standardtype = new stdClass();
$standardtype->name = 'NHVACF';
$standardtype->description = 'New Hampshire Visual Arts Curriculum Frameworks';
$standardtypes[] = $standardtype;

$standardtype = new stdClass();
$standardtype->name = 'CC';
$standardtype->description = 'Common Core';
$standardtypes[] = $standardtype;

$standardtype = new stdClass();
$standardtype->name = 'NSLE';
$standardtype->description = 'National Standards for Language Education';
$standardtypes[] = $standardtype;

/**
 * Transcript Credit Types
 */
$transcriptcredittypes = array();

$transcriptcredittype = new stdClass();
$transcriptcredittype->name = 'Regular';
$transcriptcredittype->description = "";
$transcriptcredittype->isfirstpage = 1;
$transcriptcredittypes[] = $transcriptcredittype;

$transcriptcredittype = new stdClass();
$transcriptcredittype->name = 'Competency Recovery';
$transcriptcredittype->description = "";
$transcriptcredittype->isfirstpage = 0;
$transcriptcredittypes[] = $transcriptcredittype;

$transcriptcredittype = new stdClass();
$transcriptcredittype->name = 'Courses by Module/Unit';
$transcriptcredittype->description = null;
$transcriptcredittype->isfirstpage = 0;
$transcriptcredittypes[] = $transcriptcredittype;
