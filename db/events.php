<?php
defined('MOODLE_INTERNAL') || die();

$observers = [
    [
        'eventname' => '\\core\\event\\user_loggedin',
        'callback' => 'local_confirmdep_observer::on_user_loggedin',
        'includefile' => '/local/confirmdep/classes/observer.php',
        'priority' => 9999,
    ],
];

