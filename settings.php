<?php
/**
 * @package   local_vlacsdatagenerator
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/// Add hub administration pages to the Moodle administration menu
$ADMIN->add('root', new admin_category('local_vlacsdatagenerator', get_string('pluginname', 'local_vlacsdatagenerator')));

$ADMIN->add('local_vlacsdatagenerator', new admin_externalpage('vlacstestdatagenerator', get_string('rungenerator', 'local_vlacsdatagenerator'),
    $CFG->wwwroot."/local/vlacsdatagenerator/testdatagenerator.php",
    'moodle/site:config'));
