<?php
namespace local_confirm\hook;

defined('MOODLE_INTERNAL') || die();

class before_http_headers {

    public static function execute($page): void {
        global $USER, $SESSION;

        if (!($page instanceof \moodle_page)) {
            debugging('Oggetto $page non è istanza di moodle_page', DEBUG_DEVELOPER);
            return;
        }

        if (isloggedin() && !isguestuser() && !empty($SESSION->local_confirm_show_modal)) {
            $userdata = [
                'id' => $USER->id,
                'username' => $USER->username,
                'firstname' => $USER->firstname,
                'lastname' => $USER->lastname,
                'department' => $USER->department,
                'position' => $USER->institution
            ];
            $page->requires->js_call_amd('local_confirm/confirm', 'init', [$userdata]);

            unset($SESSION->local_confirm_show_modal);
            debugging('Modale caricata tramite hook before_http_headers', DEBUG_DEVELOPER);
        }
    }
}
