<?php
/**
 * User: Robert
 * Date: 4/27/2015
 * Time: 5:17 PM
 * Assignment 4 content2.php
 *
 */
// Check if user wanted to log out
session_start();//start a session if none

//set some links for later
$logout = ' Click <a href="' . $_SERVER['PHP_SELF'] . '?sessh=logout"> here </a> to return to the login screen.';
$content = '<a href="content1.php">Click for Content 1 </a>';

// Check if user wanted to log out
if (isset($_GET['sessh'])) {

    $_SESSION['on'] = -1;
    session_destroy();
    header("location:login.php", true);
    die();
};

//Check if thay are a valid user, i.e. the username is in the session
if ((isset($_SESSION['username']))){

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
        <h1>Welcome to Content 2</h1>
        <?php echo $logout; ?>
        <br/>
        <?php echo $content; ?>
    </div>
    </body>
    </html>
<?php
}else{
    //they are aliens, get rid of them and make them log in
    $msg = "You must log on in to access this page ";
    $_SESSION['on']= -1;
    session_destroy();
    header("location:login.php?msg=$msg", true);
    die(); //end second level



}

?>