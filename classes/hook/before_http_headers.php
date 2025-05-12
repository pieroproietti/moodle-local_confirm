<?php

namespace local_confirmdep\hook;

defined('MOODLE_INTERNAL') || die();

final class before_http_headers
{

    public function __construct(
        public readonly string $version,
    ) {
        debugging("confirmdep: $version", DEBUG_DEVELOPER);
    }

    public static function execute($page): void
    {
        global $USER, $SESSION;

        if (!($page instanceof \moodle_page)) {
            debugging('Oggetto $page non è istanza di moodle_page', DEBUG_DEVELOPER);
            return;
        }

        // if (isloggedin() && !isguestuser() && !empty($SESSION->local_confirmdep_show_modal)) {
        if (isloggedin() && !empty($SESSION->local_confirmdep_show_modal)) {
            $userdata = [
                'id' => $USER->id,
                'username' => $USER->username,
                'firstname' => $USER->firstname,
                'lastname' => $USER->lastname,
                'department' => $USER->department,
                'position' => $USER->institution
            ];
            $page->requires->js_call_amd('local_confirmdep/confirmdep', 'init', [$userdata]);

            unset($SESSION->local_confirmdep_show_modal);
            debugging('Modale caricata tramite hook before_http_headers', DEBUG_DEVELOPER);
        }
    }
}
