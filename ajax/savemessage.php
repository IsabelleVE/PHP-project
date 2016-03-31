<?php

include_once("../classes/Activity.class.php");
$activity = new Activity();

//controleer of er een update wordt verzonden
if(!empty($_POST['message']))
{
    $activity->Text = $_POST['message'];
    try
    {
        $activity->Save();
        $response['status'] = "success";
        $response['message'] = $activity->Text;
    }
    catch (Exception $e)
    {
        $response['status'] = "error";
        $response['message'] = $e->getMessage();
    }



    header('Content-Type: application/json');
    echo json_encode($response);
}


?>