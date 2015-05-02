<?php
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
session_start();//start a session if none
error_reporting(E_ALL);
//ini_set('display_errors', 1);
//ini_set('session.use_cookies', 1);
//ini_set('session.use_only_cookies', 0);

//set some links for later
$logout = ' Click <a href="' . $_SERVER['PHP_SELF'] . '?sessh=logout"> here </a> to return to the login screen.';
$content = '<a href="content2.php">Click for Content 2 </a>';


// Check if user wanted to log out
if (isset($_GET['sessh'])) {

    $_SESSION['on'] = -1;
    session_destroy();
    header("location:login.php", true);
    die();
};

//second level
if (isset($_POST['username'])){
    $_SESSION['on'] = 2; // setting this in case I want to use it for another feature

    if ((isset($_POST['username']) && $_POST['username'] == '')) {

        header("location:login.php?msg=display", true);

        //good login
    } else {

        $_SESSION['username'] = $_POST['username'];
        $_SESSION['visits'] = 0;
        $_SESSION['on'] = 3;
        unset($_POST);
    }

}

if(isset($_SESSION['username'])){
//now we can increase their sessionas we know this is a return visit
$_SESSION['visits']++;

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

    echo "You've been here " . $_SESSION['visits'] . ' times, ' . $_SESSION['username'];
    ?><br/><?php
    echo $logout;
    ?><br/><?php
    echo $content; ?>
    </div>
</body>
</html>
<?php
    }else{
    $msg = "You must log on in to access this page ";
    $_SESSION['on']= -1;
    session_destroy();
    header("location:login.php?msg=$msg", true);
    die(); //end second level



}

?>
