<?php
/*
Plugin Name: wp_attempt_focus Fix
Description: Fix the "Password Field is Empty" WordPress Error. https://wordpress.stackexchange.com/a/163525/92974
Version: 1.0
Author: Robbert
*/
add_action("login_form", "kill_wp_attempt_focus_start");
function kill_wp_attempt_focus_start() {
    ob_start("kill_wp_attempt_focus_replace");
}

function kill_wp_attempt_focus_replace($html) {
    return preg_replace("/d.value = '';/", "", $html);
}

add_action("login_footer", "kill_wp_attempt_focus_end");
function kill_wp_attempt_focus_end() {
    ob_end_flush();
}
