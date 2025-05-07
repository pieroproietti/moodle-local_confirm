<?php
namespace local_confirm;

defined('MOODLE_INTERNAL') || die();

class api {
    public static function update_user($data) {
        global $DB, $USER;

        require_sesskey();

        if ($USER->id != $data['userid']) {
            throw new \moodle_exception('invaliduser');
        }

        $DB->update_record('user', (object)[
            'id' => $USER->id,
            'department' => $data['department'],
            'institution' => $data['position'],
        ]);

        return true;
    }
}
