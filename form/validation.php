<?php

function validation($request){ // 連想配列が入る

    $error = [];
    if(empty($request['your_name'])) {
        $error[] = '氏名は必須です';
    }

    return $error;
}


?>