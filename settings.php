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
 * Version information for confirmdep2
 *
 * @package    local_confirmdep
 * @copyright  2025 Piero Proietti <piero.proietti@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_confirmdep', get_string('pluginname', 'local_confirmdep'));

    $settings->add(new admin_setting_configtext(
        'local_confirmdep/defaultdepartment',
        get_string('defaultdepartment', 'local_confirmdep'),
        get_string('defaultdepartment_desc', 'local_confirmdep'),
        'istruzione'
    ));

    $settings->add(new admin_setting_configtext(
        'local_confirmdep/defaultposition',
        get_string('defaultposition', 'local_confirmdep'),
        get_string('defaultposition_desc', 'local_confirmdep'),
        'studente'
    ));

    $ADMIN->add('localplugins', $settings);
}
