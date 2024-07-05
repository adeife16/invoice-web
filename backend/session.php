<?php
require_once 'config.php';
// session_start();
$json = array();
$data = array();

// get all dashboard data
if(isset($_GET["getSession"]))
{
  if(!isset($_SESSION["id"]))
  {
    $request = array('status' =>  'invalid');
    array_push($json, $request);

    print json_encode($json);
  }
  else
  {
    $request = array("status" => "success");
    array_push($json, $request);

    $session = array("session_id" => $_SESSION['id'], "session_name" => $_SESSION['username']);

    array_push($json, $session);
    print json_encode($json);
  }
}
