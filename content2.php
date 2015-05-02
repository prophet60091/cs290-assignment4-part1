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

if(isset($_GET) &&  $_GET['sessh'] == 'logout'){
    $_SESSION['on'] = false;
    session_destroy();
    header("location:login.php");

}elseif(!isset($_SESSION) || $_SESSION['on'] == false){

    $_SESSION['on'] = false;
    session_destroy();
    header("location:login.php");

}else{

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="author" content="Robert Jackson">
    <meta name="description" content="">
    <title>content2.php</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<div class="content">
    <h1>Welcome to content 2!</h1>
    <?php

    $logout = '<a href="' . $_SERVER['PHP_SELF'] . '?sessh=logout"> here </a>';
    $back = '<a href="content1.php"> back </a>';

    echo "You've been here " . $_SESSION['visits'] . ' times, ' . $_SESSION['username'];

    ?><br/><?php

    echo "Click" . $logout . " to return to the login screen. ";
    echo "Click" . $back . " to return to the previous page. ";
    }
    ?>

<span>Otherwise their ain't anything to do here!</span>

</div>
</body>
</html>
