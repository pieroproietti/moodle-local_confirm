<?php
defined('MOODLE_INTERNAL') || die();

function local_confirm_extend_navigation_user($navigation, $user, $context, $course, $coursecontext) {
    global $USER, $PAGE;

    if ($USER->id !== $user->id) return;

    $PAGE->requires->js_call_amd('local_confirm/confirm', 'init', [
        [
            'id' => $USER->id,
            'username' => $USER->username,
            'firstname' => $USER->firstname,
            'lastname' => $USER->lastname,
            'department' => $USER->department ?? '',
            'position' => $USER->institution ?? '',
        ]
    ]);
}
