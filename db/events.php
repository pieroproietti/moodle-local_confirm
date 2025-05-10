<?php
defined('MOODLE_INTERNAL') || die();

$observers = [
    [
        'eventname' => '\\core\\event\\user_loggedin',
        'callback' => 'local_confirm_observer::on_user_loggedin',
        'includefile' => '/local/confirm/classes/observer.php',
        'priority' => 9999,
    ],
];

