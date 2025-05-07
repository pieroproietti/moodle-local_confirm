<?php
defined('MOODLE_INTERNAL') || die();

/*
function local_confirm_before_http_headers($navigation, $user, $context, $course, $coursecontext)
{
    global $USER, $PAGE;

    // Solo per l'utente corrente.
    if ($USER->id !== $user->id) return;

    //if (isloggedin() && !isguestuser() && !empty($SESSION->local_confirm_show_modal)) {
    // if (!empty($SESSION->local_confirm_show_modal)) return;


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

*/