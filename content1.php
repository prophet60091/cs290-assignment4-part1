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
//REceived logout infor killing the session
if($_GET){

    session_destroy();
    header("location:login.php");

}else{

    //user logging in starting the session
    session_start();
    session_regenerate_id(true);
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
$aPost = array('POST');
$toLogin = '<a href="login.php"> here </a>';
$logout = "<a href=" . $_SERVER['PHP_SELF'] ."?sessh=FALSE> here </a>";


if(!$_POST && !$_SESSION['on'] ){
    session_destroy();
    header("location:login.php");

}else{

    if(!$_POST['username']){
        echo "A username must be entered. Click" . $logout. " to return to the login screen.";

    }else{
            //Must be legit start a session
            $_SESSION["on"] = true;

            //First Time
            if(!isset($_COOKIE[$_POST['username']])){
                setcookie($_POST['username'], 1);
                echo "This is your first visit here, " .  $_POST['username'] ;

            }else{
                //Other then first time
                $incCookie =  $_COOKIE[$_POST['username']] + 1;
                $ckvar = $_POST['username'];

                setcookie($ckvar,  $incCookie);
                echo "you've been here " .  $incCookie . ' times';

                echo "Click" . $logout . " to return to the login screen.";

            }
    }
};

?>

        </body>
</html>
