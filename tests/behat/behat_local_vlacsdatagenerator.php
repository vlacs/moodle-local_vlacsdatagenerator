<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * VLA Test data generator steps definitions.
 *
 * @package    local_vlacsdatagenerator
 * @category   test
 * @copyright  2014 Jerome Mouneyrac
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// NOTE: no MOODLE_INTERNAL test here, this file may be required by behat before including /config.php.

require_once(__DIR__ . '/../../../../lib/behat/behat_base.php');

use Behat\Behat\Context\Step\Given as Given;

/**
 * Steps definitions for vla plugins actions.
 *
 * @package    local_vlacsdatagenerator
 * @category   test
 * @copyright  2014 Jerome Mouneyrac
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class behat_local_vlacsdatagenerator extends behat_base {

    /**
     * Adds VLA data for the purpose of behat testing.
     *
     * @Given /^I load the vla test data$/
     */
    public function i_load_the_vla_test_data() {
        global $CFG, $DB;

        $steps = array(
            new Given ('I log in as "admin"'),
            new Given('I expand "' . get_string('administrationsite') .'" node'),
            new Given('I expand "' . get_string('pluginname', 'local_vlacsdatagenerator') .'" node'),
            new Given('I click on "' . get_string('rungenerator', 'local_vlacsdatagenerator'). '" "link"'),
            new Given('I click on "Home" "link"'),
            new Given('I click on "AP Microeconomics v9_gs-Teacher-1" "link"'),
            new Given('I click on "Turn editing on" "link"'),
            new Given('I add the "Assessment Manager" block'),
            new Given('I log out'),
        );
        return $steps;
    }
}
