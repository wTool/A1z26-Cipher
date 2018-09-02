<?php
function Encrypt($str, $abc){
    $new_str = "";
    $abc = preg_split("//u", $abc, -1, PREG_SPLIT_NO_EMPTY);
    $arr_str = preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
    array_unshift($abc, " ");
    for ($i = 0; $i < count($arr_str); $i++) {
        if ($arr_str[$i] != $abc[0]) {
            if ($i > 0 && $arr_str[$i - 1] != $abc[0]) {
                $new_str .= "-";
            }
            $new_str .= array_search($arr_str[$i], $abc);
        } else {
            $new_str .= $abc[0];
        }
    }
    return $new_str;
}

function Decrypt($str, $abc){
    $new_str = "";
    $temp = "";
    $abc = preg_split("//u", $abc, -1, PREG_SPLIT_NO_EMPTY);
    $arr_str = preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
    array_unshift($abc, " ");
    for ($i = 0; $i < count($arr_str); $i++) {
        if ($arr_str[$i] == "-") {
            continue;
        }
        if ($arr_str[$i] == $abc[0]) {
            $new_str .= $abc[0];
            continue;
        }
        $temp .= $arr_str[$i];
        if (!is_numeric($arr_str[$i + 1])) {
            $new_str .= $abc[$temp];
            $temp = "";
        }
    }
    return $new_str;
}
