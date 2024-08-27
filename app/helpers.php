<?php

function get_time_diff_string(string $startDate): String
{
    $start_date = new DateTime($startDate);
    $since_start = $start_date->diff(now());

    if ($since_start->y >= 1) {
        $creationDifference = $since_start->y;
        $type = 'years';
    } else if ($since_start->m >= 1) {
        $creationDifference = $since_start->m;
        $type = 'months';
    } else if ($since_start->d >= 1) {
        $creationDifference = $since_start->d;
        $type = 'days';
    } else if ($since_start->h >= 1) {
        $creationDifference = $since_start->h;
        $type = 'hours';
    } else if ($since_start->i >= 1) {
        $creationDifference = $since_start->i;
        $type = 'minutes';
    } else {
        $creationDifference = false;
    }

    if ($creationDifference == false) {
        $return = ' a couple of seconds ';
    } else {
        $return = ' ' . $creationDifference . ' ' . $type . ' ';
    }

    return $return;
}
