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

namespace local_confirmdep;

defined('MOODLE_INTERNAL') || die();

class api
{
    public static function update_user($data)
    {
        global $DB, $USER;

        require_sesskey();

        if ($USER->id != $data['userid']) {
            throw new \moodle_exception('invaliduser');
        }

        $DB->update_record('user', (object) [
            'id' => $USER->id,
            'department' => $data['department'],
            'institution' => $data['position'],
        ]);

        return true;
    }
}
