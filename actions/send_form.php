<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";

$data = [
    'user_name'=>makeValidData($_POST['user_name']),
    'user_address'=>makeValidData($_POST['user_address']),
    'user_phone'=>makeValidData($_POST['user_phone']),
    'user_email'=>makeValidData($_POST['user_email'])
];

$result = addFeedback($data);

if($result){
    echo json_encode("success");
}