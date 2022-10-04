<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";

$getFeedbacks = getFeedbacks();

if($getFeedbacks){
    foreach ($getFeedbacks as $feedback){
        $resultArray[] = [
            'user_name'=>$feedback['user_name'],
            'user_address'=>$feedback['user_address'],
            'user_phone'=>$feedback['user_phone'],
            'user_email'=>$feedback['user_email']
        ];
    }
} else {
    $resultArray = "no data";
}

echo json_encode($resultArray);