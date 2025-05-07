<?php
defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_confirm', get_string('pluginname', 'local_confirm'));

    $settings->add(new admin_setting_configtext(
        'local_confirm/defaultdepartment',
        get_string('defaultdepartment', 'local_confirm'),
        get_string('defaultdepartment_desc', 'local_confirm'),
        'istruzione'
    ));

    $settings->add(new admin_setting_configtext(
        'local_confirm/defaultposition',
        get_string('defaultposition', 'local_confirm'),
        get_string('defaultposition_desc', 'local_confirm'),
        'studente'
    ));

    $ADMIN->add('localplugins', $settings);
}
