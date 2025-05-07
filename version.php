<?php
defined('MOODLE_INTERNAL') || die();

$plugin->component = 'local_confirm';
$plugin->version = 2025050703;
$plugin->requires = 2020061500; // Moodle 5.0.0
$plugin->maturity = MATURITY_ALPHA;
$plugin->release = '0.1';

$plugin->hooks = [
    'core\hook\output\before_http_headers' => '\local_confirm\hook\BeforeHttpHeaders::execute',
];

