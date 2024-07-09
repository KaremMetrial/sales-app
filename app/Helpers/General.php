<?php

use Illuminate\Support\Facades\Config;

function uploadImage($folder, $image)
{
    $ex = strtolower($image->getClientOriginalExtension());
    $filename = time() . '_' . rand(100, 999) . '.' . $ex;
//    $image->getClientOriginalExtension = $filename;
    $image->move($folder, $filename);
    return $filename;
}
