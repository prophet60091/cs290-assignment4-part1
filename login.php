<?php
session_start();//start a session if none
$_SESSION['on'] = 1;

/**
 * User: Robert
 * Date: 4/27/2015
 * Time: 5:17 PM
 * * Assignment 4 login.php

 */

//if the user tries to access the login screen again but didn't log out push them back to content 1.
if(isset($_SESSION['on']) && $_SESSION['on'] > 1){
  header("Content-Type: plain/text");
  header("location:content1.php");
}

//HTML
?>
    <!DOCTYPE html>
    <html>
        <head lang="en">
            <meta charset="UTF-8">
            <meta name="author" content="Robert Jackson">
            <meta name="description" content="">
            <title>login.php</title>
            <link rel="stylesheet" href="style.css" type="text/css">
        </head>
        <body>
        <div class="form">
            <?php if(isset($_GET['msg'])){ echo 'A username must be entered.'; } ?>
                <form method="post" action="" onsubmit="checkit();" id="login">
                    <label for="username">Username: </label><input type="text" name="username" id="username" class="">
                    <input type="submit"  value="Submit" id="submit">
                </form>

        </div>

        <script type="application/javascript">
            //little java script to  fire on submission. Highlights the field when they didn't enter a username
            if(localStorage.getItem('username') == 'MISSING' ){
                document.getElementById('username').value = localStorage.getItem('username');
                document.getElementById('username').className = "missedElement";
            }

            function checkit(){

                if(document.getElementById('username').value !== ''){

                    document.getElementById('login').action = 'content1.php';
                    localStorage.removeItem('username');
                    document.getElementById('username').className = "";

                }else{

                    document.getElementById('login').action = 'content1.php';
                    localStorage.setItem('username', 'MISSING');
                }
            }

        </script>
        </body>
    </html>


