<?php

function IDGenerator($model, $trow, $prefix, $length = 4) {
    $rand = rand(1000, 9999);
    $data = $model::where($trow, $rand)->first(); // DV-0002
    // dd($data);

    if($data) {
        return $prefix.'-'.rand(1000, 9999);
    }

    return $prefix.'-'.$rand;
}