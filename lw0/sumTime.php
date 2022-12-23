<?php
$Time_1 = $argv[1];
$Time_2 = $argv[2];
function sumTime($Time_1, $Time_2): string
{
    $result = "";
    $checkStr = " :0123456789";
    $Time_1_Twink = str_split($Time_1);
    $Time_2_Twink = str_split($Time_2);
    $Time_1_Arr = [];
    $Time_1_counter = 0;
    $Time_2_Arr = [];
    $Time_2_counter = 0;
    if ($Time_1 === NULL or $Time_2 === NULL or (strlen($Time_1) > 8) or (strlen($Time_2) > 8)) {
        $result = "Unexpected Error!";
        return $result;
    }
    foreach ($Time_1_Twink as $symbol) {
        if (!strpos($checkStr, $symbol)) {
            $result = "It looks like there are extra characters int the argument...";
            return $result;
        }
        if ($symbol !== ":") {
            $Time_1_Arr[$Time_1_counter] .= $symbol;
        } else {
            $Time_1_Arr[$Time_1_counter] = intval($Time_1_Arr[$Time_1_counter]);
            $Time_1_counter++;
        }
    }
    foreach ($Time_2_Twink as $symbol) {
        if (!strpos($checkStr, $symbol)) {
            $result = "It looks like there are extra characters int the argument...";
            return $result;
        }
        if ($symbol !== ":") {
            $Time_2_Arr[$Time_2_counter] .= $symbol;
        } else {
            $Time_2_Arr[$Time_2_counter] = intval($Time_2_Arr[$Time_2_counter]);
            $Time_2_counter++;
        }
    }
    if (sizeof($Time_1_Arr) === 1) {
        $Time_1_Arr[1] = intval(0);
        $Time_1_Arr[2] = intval(0);
    }
    if (sizeof($Time_1_Arr) === 2) {
        $Time_1_Arr[2] = intval(0);
    }
    if (sizeof($Time_2_Arr) === 1) {
        $Time_2_Arr[1] = intval(0);
        $Time_2_Arr[2] = intval(0);
    }
    if (sizeof($Time_2_Arr) === 2) {
        $Time_2_Arr[2] = intval(0);
    }
    $second = $Time_1_Arr[2] + $Time_2_Arr[2];
    $minute = $Time_1_Arr[1] + $Time_2_Arr[1];
    $hour = $Time_1_Arr[0] + $Time_2_Arr[0];
    while ($second > 59) {
        $second -= 60;
        $minute++;
    }
    while ($minute > 59) {
        $minute -= 60;
        $hour++;
    }
    while ($hour > 23) {
        $hour -= 24;
    }
    $result = $hour . ":" . $minute . ":" . $second;
    return $result;
}
$output = sumTime($Time_1, $Time_2);
echo $output;
