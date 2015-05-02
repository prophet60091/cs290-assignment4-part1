<?php
session_start();//start a session if none
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('session.use_cookies', 1);
ini_set('session.use_only_cookies', 0);

/**
 * User: Robert
 * Date: 4/27/2015
 * Time: 5:17 PM
 * This file should accept either a GET or POST for input.
 * The page should return a JSON object (remember, this is almost identical to an object literal in JavaScript) of the form
 * {"Type":"[GET|POST]","parameters":{"key1":"value1", ... ,"keyn":"valuen"}}.  If no key value pairs are passed it it should return {"Type":"[GET|POST]", "parameters":null}. You are welcome to use
 * built in JSON function in PHP to produce this output.
 *
 *
 */

// Check if user wanted to log out
// Check if user wanted to log out
if(isset($_GET) &&  $_GET['sessh'] == 'logout'){
    $_SESSION = array();
    session_destroy();
    header("location:login.php", true);
    die();

// make sure user is not an alien
}elseif(!isset($_SESSION['on'])) {

    $_SESSION['on'] = array();
    session_destroy();
    header("location:login.php", true);
    die();

// now make sure we got an actual name with the post
}elseif((isset($_POST['username']) && $_POST['username'] == '')){

  header("location:login.php", true);
  echo "A username must be entered. Click" . $logout . " to return to the login screen.";
    die();

}else{

$toLogin = '<a href="login.php"> here </a>';
$logout = '<a href="' . $_SERVER['PHP_SELF'] . '?sessh=logout"> here </a>';
$content2 = '<a href="content2.php"> Content 2 </a>';

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="author" content="Robert Jackson">
    <meta name="description" content="">
    <title>content1.php</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<div class="content">
    <h1>Welcome to Content 1</h1>
    <?php

    if(isset($_SESSION)  && $_SESSION['on'] == true){
        $_SESSION['visits']++;

        echo "You've been here " .  $_SESSION['visits'] . ' times, ' . $_SESSION['username'];

        ?><br/><?php

        echo "Click" . $logout . " to return to the login screen.";
        ?><br /><?php
        echo "Click" . $content2 . " to go to content 2.";



    }else{
        //Must be legit, first time login set some session vars
        $_SESSION['on'] = true;
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['visits'] = 1;

        setcookie('visits',  $_SESSION['visits'], time()+30000);
        setcookie('username', $_SESSION['username'], time()+30000);

        echo "This is your first visit here, " .  $_SESSION['username'] ;
        ?><br /><?php
        echo "Click" . $logout . " to return to the login screen.";
        ?><br /><?php
        echo "Click" . $content2 . " to go to content 2.";

    }
    }

    ?>
</div>
</body>
</html>
