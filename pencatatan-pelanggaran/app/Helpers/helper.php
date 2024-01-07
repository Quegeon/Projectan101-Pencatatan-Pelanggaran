<?php

function IDGenerator($model, $trow, $prefix) {
    $no_pelanggaran = $prefix . '-' . random_int(1000, 9999);

    $check_exist = $model::where($trow, $no_pelanggaran)->first();

    if ($check_exist !== null) {
        $no_pelanggaran = $prefix . '-' . random_int(1000, 9999);
        
        return $no_pelanggaran;    
    }

    return $no_pelanggaran;
}