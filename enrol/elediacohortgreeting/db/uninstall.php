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
 * Meta link enrolment plugin uninstallation.
 *
 * @package    enrol
 * @subpackage elediacohortgreeting
 * @author     Benjamin Wolf <support@eledia.de>
 * @copyright  2013 eLeDia GmbH
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

function xmldb_enrol_elediacohortgreeting_uninstall() {
    global $CFG, $DB;

    $cohort = enrol_get_plugin('elediacohortgreeting');
    $rs = $DB->get_recordset('enrol', array('enrol'=>'elediacohortgreeting'));
    foreach ($rs as $instance) {
        $cohort->delete_instance($instance);
    }
    $rs->close();

    role_unassign_all(array('component'=>'enrol_elediacohortgreeting'));

    return true;
}
