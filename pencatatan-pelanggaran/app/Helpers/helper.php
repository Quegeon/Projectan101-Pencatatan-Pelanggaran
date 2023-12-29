<?php

function IDGenerator($model, $trow, $length = 4, $prefix) {
    $data = $model::orderBy('id', 'desc')->first(); // DV-0002

    if(!$data) {
        $code_length = $length - 1;
        $last_number = 1;
    } else {
        $code_without_prefix = substr($data->$trow, strlen($prefix) + 1); // '0002'
        $get_last_number = ($code_without_prefix / 1) * 1; // 2
        $last_number_length = strlen($get_last_number); // 1
        $code_length = $length - $last_number_length; // 3
        $last_number = $get_last_number + 1; // 3
    }

    $zeros = '';
    for($i = 0; $i < $code_length; $i++) {
        $zeros .= '0';
    }

    return $prefix.'-'.$zeros.$last_number;
}