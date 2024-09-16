<?php
session_start();

$response = array("is_logged_in" => false);

if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
    $response["is_logged_in"] = true;
}

header("Content-Type: application/json");
echo json_encode($response);
?>