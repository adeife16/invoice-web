<?php
session_start();
$users = file_get_contents('../db/user.json');

$json = [];

if(isset($_POST["user"]) && $_POST["user"] != "")
{
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  if($user == "" || $pass == "")
  {
    echo "empty";
  }

  else
  {
    $user_decode = json_decode($users, true);
    
    $search_user = array_filter($user_decode, function($item) use ($user) {
      return $item['username'] == $user;
    });
    if(count($search_user) == 0)
    {
      $request = array('status' =>  'invalid');
      return;
    }
    $user_data = $search_user[0];

    // print_r($user_data);
    // exit;

    $admin_id = $user_data['user_id'];
    $username = $user_data['username'];
    $password = $user_data['password_hash'];

    if(password_verify($pass, $password))
    {
      session_destroy();
      session_start();

      $_SESSION['id'] = $admin_id;
      $_SESSION['username'] = $username;

      $request = array("status" => "success");
      array_push($json, $request);

      $session = array("session_id" => $_SESSION['id'], "session_name" => $_SESSION['username']);

      array_push($json, $session);
      print json_encode($json);

    }
    else
    {
      $request = array('status' =>  'invalid');
      array_push($json, $request);

      print json_encode($json);

    }

  }

}
