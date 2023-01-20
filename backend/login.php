<?php
require 'config.php';

$json = array();
$data = array();

if(isset($_POST["user"]) && $_POST["user"] != "")
{
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  if($user == "" || $pass == "")
  {
    print "empty";
  }

  else
  {
    $stmt = "SELECT * FROM user WHERE username = ?";
    $get_stmt = mysqli_prepare($con, $stmt);
    mysqli_stmt_bind_param($get_stmt, "s", $user);
    mysqli_execute($get_stmt);
    $result = mysqli_stmt_get_result($get_stmt);
    if($result)
    {
      if(mysqli_num_rows($result)  == 1)
      {
        while($row = mysqli_fetch_assoc($result))
        {
          $admin_id = $row['user_id'];
          $username = $row['username'];
          $password = $row['password'];
        }

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
      else
      {
        $request = array('status' =>  'invalid');
        array_push($json, $request);

        print json_encode($json);
      }
    }
    else
    {
      $request = array('status' =>  'invalid');
      array_push($json, $request);

      print json_encode($json);
    }
  }

}
 