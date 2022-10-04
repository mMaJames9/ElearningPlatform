<?php

use Carbon\Carbon;

function number_format_short( $n ) {
    if($n == 0)
    {
        return 0;
    }
    else
    {
        if ($n > 0 && $n < 1000) {
            // 1 - 999
            $n_format = floor($n);
            $suffix = '';
        } else if ($n >= 1000 && $n < 1000000) {
            // 1k-999k
            $n_format = floor($n / 1000);
            $suffix = 'K+';
        } else if ($n >= 1000000 && $n < 1000000000) {
            // 1m-999m
            $n_format = floor($n / 1000000);
            $suffix = 'M+';
        } else if ($n >= 1000000000 && $n < 1000000000000) {
            // 1b-999b
            $n_format = floor($n / 1000000000);
            $suffix = 'B+';
        } else if ($n >= 1000000000000) {
            // 1t+
            $n_format = floor($n / 1000000000000);
            $suffix = 'T+';
        }

        return !empty($n_format . $suffix) ? $n_format . $suffix : 0;

    }

}

function percentage($portion, $total) {
    if ($total == 0) {
        return 0;
    } else {
        $percent = ($portion / $total) * 100;
        return $total == 0 ? 0 : $percent;
    }

}

function growth ($current, $previous) {
    if ($previous == 0) {
        return 0;
    } else {
        $growth = (($current - $previous) / $previous) * 100;
        return $growth;
    }

}

function mondaysInMonth($month = null) {
    if ($month === null) $month = Carbon::today()->startOfMonth();

    $nextMonth = $month->copy()->endOfMonth();

    return $month->diffInDaysFiltered(function ($date) {
        return $date->isMonday();
    }, $nextMonth);
}

function weekOfMonth($date) {
    //Get the first day of the month.
    $start = new Carbon('first monday of this month');
    $start = $start->format('d');
    $firstOfMonth = strtotime(date("Y-m-$start", $date));

    //Apply above formula.
    return weekOfYear($date) - weekOfYear($firstOfMonth) + 1;
}

function weekOfYear($date) {
    $weekOfYear = intval(date("W", $date));
    if (date('n', $date) == "1" && $weekOfYear > 51) {
        // It's the last week of the previos year.
        return 0;
    }
    else if (date('n', $date) == "12" && $weekOfYear == 1) {
        // It's the first week of the next year.
        return 53;
    }
    else {
        // It's a "normal" week.
        return $weekOfYear;
    }
}

