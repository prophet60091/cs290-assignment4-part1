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
//Received logout info killing the session dir
if($_GET){
    $_SESSION['on']= false;
    session_destroy();
    header("location:login.php");

}else{

    //user logging in starting the session
    session_start();
    session_set_cookie_params(time()+10000, '/cs290-assignment4', '' ,false, false);

}

?>
<!DOCTYPE html>
    <html>
        <head lang="en">
            <meta charset="UTF-8">
            <meta name="author" content="Robert Jackson">
            <meta name="description" content="">
            <title>content1.php</title>
            <script src="" type="application/javascript"></script>
            <link rel="stylesheet" href="" type="text/css">
        </head>
        <body>
<?php

$toLogin = '<a href="login.php"> here </a>';
$logout = "<a href=" . $_SERVER['PHP_SELF'] ."?sessh=FALSE> here </a>";

//If there is not a Post and no session, we don't know how the user got here send them back.
if(!$_POST && $_SESSION['on'] == false ){

    session_destroy();
    header("location:login.php");

}else{

    //User clicked login but didn't give a value send em back
    if(!$_POST['username']){
        session_destroy();
        echo "A username must be entered. Click" . $logout. " to return to the login screen.";


    }else{
            //Must be legit start a session
            $_SESSION["on"] = true;

            //First Time
            if(!isset($_COOKIE[$_POST['username']])){
                setcookie($_POST['username'], 1);
                echo "This is your first visit here, " .  $_POST['username'] ;
                ?>
                <br />
                <?php
                echo "Click" . $logout . " to return to the login screen.";

            }else{
                //Other then first time
                $incCookie =  $_COOKIE[$_POST['username']] + 1; // increment their visit count
                $ckvar = $_POST['username']; //shortening their entry

                setcookie($ckvar,  $incCookie);

                echo "you've been here " .  $incCookie . ' times';
                ?>
                <br />
                <?php
                echo "Click" . $logout . " to return to the login screen.";

            }
    }
};
print_r($_SESSION);
?>
        <section   >
        <a href="content2.php">Content 2</a>
        </section>
        </body>
</html>
