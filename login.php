<?php
/**

 * User: Robert
 * Date: 4/27/2015
 * Time: 5:17 PM
 * It should check than the min is in fact less than or equal to the max multiplicand and multiplier respectively.
 * If it is not, it should print the message "Minimum [multiplicand|multiplier] larger than maximum.".
 * It should also check that the values returned are integers for each parameter. If it is not it should print 1 message
 * for each invalid input "[min-multiplicand...max-multiplier] must be an integer.". It should check that all
 * 4 parameters exist for each missing parameter it should print "Missing parameter [min-multiplicand ... max-multiplier].".

If all of the above conditions are met, it should produce a multiplication table that is
 * (max-multiplicand - min-multiplicand + 2) tall and (max-multiplier - min-multiplier + 2) wide.
 * The upper left cell should be empty. The left column should have integers running from min-multiplicand through
 * max-multiplicand inclusive. The top row should have integers running from min-multiplier to max-multiplier inclusive. Every cell within the table should be the product of the corresponding multiplicand and multiplier.

To accomplish the above task you will want to work with loops to dynamically create rows and within each row,
 * loop to create the cells. It should output as a valid HTML5 document.
 *
 *
 *
 */

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

<form method="post" action="" onsubmit="checkit();" id="login">
    <label for="username">Username: </label><input type="text" name="username" id="username" class="">
    <input type="submit"  value="Submit" id="submit">
</form>

<script type="application/javascript">

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


<?php print_r($_SESSION); ?>

