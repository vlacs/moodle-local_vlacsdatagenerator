<?php

function call($functionname, $params) {
    global $CFG;

    $token = $CFG->genius_api_token_incoming;
    $domainname = $CFG->wwwroot;
    $qworker = true;
    $restformat = 'xml';

    /// REST CALL
    $serverurl = $domainname . '/blocks/geniusapis/rest/server.php'. '?token=' . $token . '&wsfunction='.$functionname;
    require_once('./curl.php');
    $curl = new curl;
    // if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
    $restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
    $resp = $curl->post($serverurl . $restformat . '&qworker=' . $qworker, $params);
    print_r($functionname . ': ');
    print_r($resp);
    print_r('<br/><br/>');
}