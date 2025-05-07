<?php

namespace local_confirm\hook;

use core\hook\output\before_http_headers as BeforeHttpHeadersInterface;

class BeforeHttpHeaders implements BeforeHttpHeadersInterface {

    /**
     * Modifies the HTTP headers before they are sent.
     *
     * @param array $headers The current HTTP headers (an associative array).
     * @return void
     */
    public static function execute(array &$headers): void {
        global $USER, $PAGE, $SESSION;

        // Solo per l'utente corrente.
        if ($USER->id !== ($headers['user']->id ?? null)) {
            return;
        }

        $userdata = [
            'id' => $USER->id,
            'username' => $USER->username,
            'firstname' => $USER->firstname,
            'lastname' => $USER->lastname,
            'department' => $USER->department,
            'position' => $USER->institution
        ];
        $PAGE->requires->js_call_amd('local_confirm/confirm', 'init', [$userdata]);

        // mostrato NON ripetere
        unset($SESSION->local_confirm_show_modal); // Mostrata, non ripetere
    }
}
