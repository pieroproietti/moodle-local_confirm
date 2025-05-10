<?php
defined('MOODLE_INTERNAL') || die();

class local_confirm_observer
{
    public static function on_user_loggedin(\core\event\user_loggedin $event)
    {
        global $SESSION;

        $SESSION->local_confirm_show_modal = true;
        debugging('Modale flag impostato da local_confirm', DEBUG_DEVELOPER);
    }
}
