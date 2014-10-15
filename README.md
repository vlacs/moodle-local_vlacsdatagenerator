VLACS test data generator
=========================

1- install a fresh Moodle site.

2- install all the assessment_manager blocks/plugins.

3- install the local plugin (copy this folder in Moodle /local folder and go to /admin/index.php with your browser)

4- in your config.php after

require_once(dirname(__FILE__) . '/lib/setup.php');

Add

$CFG->genius_api_token_incoming = 'arandomtoken';

$CFG->genius_api_client_ips[]= '127.0.0.1';

5- in your browser, in the administration block you can run the test data generator, it will generate all the test data automatically.


Additional information
======================

You can modify the test data in testdata.php.

More information about the assessment manager database structure can be found in the documentation/databasestructure.xlsx.



Behat test
==========

The tests folder contains all assessment manager repository behat tests.

If you want to create a new behat test you must use as first step:

Scenario: YOUR SCENARIO NAME

Given I load the vla test data

...