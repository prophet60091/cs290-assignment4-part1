<?php
/**
 * User: Robert
 * Date: 4/27/2015
 * Time: 5:17 PM
 *  Assignment 4 content1.php
 *
 *
 */
session_start();//start a session if none

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

//second has submitted a user name?
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
// we got a valid user name and set it to the session
if(isset($_SESSION['username'])){

$_SESSION['visits']++;//now we can increase their sessionas

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
    }else{ //Aliens, no greencard...
    $msg = "You must log on in to access this page ";
    $_SESSION['on']= -1;
    session_destroy();
    header("location:login.php?msg=$msg", true);
    die();

}

?>
