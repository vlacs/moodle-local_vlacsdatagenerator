<?php



function call($domainname, $token, $functionname, $restformat, $params, $qworker) {
    /// REST CALL
    $serverurl = $domainname . '/blocks/geniusapis/rest/server.php'. '?token=' . $token . '&wsfunction='.$functionname;
    require_once('./curl.php');
    $curl = new curl;
    // if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
    $restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
    $resp = $curl->post($serverurl . $restformat . '&qworker=' . $qworker, $params);
    print_r($resp);
}