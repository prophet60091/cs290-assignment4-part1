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


$queryS = $_SERVER['QUERY_STRING'];
$getA = array();
$expPara = array( 'min-multiplicand', 'max-multiplicand', 'min-multiplier', 'max-multiplier');
$errMsg = '';

 function checkMissing($para){
     global $errMsg;
     foreach ($para as  $req) {

        if(!strstr($_SERVER['QUERY_STRING'], $req)){
            //$errMsg = $req .' was missing!';
           return false;
               break;
       }
    }
    return true;
};

function outputMissing($para){
    global $errMsg;
    foreach ($para as  $req) {

        if(!strstr($_SERVER['QUERY_STRING'], $req)){
            $errMsg .= $req .' was missing! ';

        }
    }

};


function checkInt(){
    global $errMsg;
    //check for int  b/c _get is a string
    foreach ($_GET as $k => $v) {
        if (((int)$v != $v) || (!is_numeric($v))) {
            $errMsg .= $k . ' value of "' . $v . '" Must be an Integer';

            return false;
        }
        //in Heaven everything is fin
    }
    return true;
};

function checkMinMax(){
    global $errMsg;
    if ($_GET['min-multiplicand'] >= $_GET['max-multiplicand']){
        $errMsg .=  'Min-multiplicand of '. $_GET['min-multiplicand'].' is larger than maximum of ' . $_GET['max-multiplicand'];
        return false;
    }
    if ($_GET['min-multiplier'] >= $_GET['max-multiplier']) {
        $errMsg .= 'Min-Multiplier of ' . $_GET['min-multiplier'] . 'is larger than maximum of ' . $_GET['max-multiplier'];
        return false;
    }
    return true;
}

function tNumber(){


}

function makeTable(){

    $xmd = $_GET['max-multiplicand'];
    $mmd = $_GET['min-multiplicand'];
    $xmp = $_GET['max-multiplier'];
    $mmp = $_GET['min-multiplier'];

    $high = $xmp -$mmp + 2;
    $wide = $xmd - $mmd + 2;


    for($n = $mmp; $n-$mmp < $high; $n++) {
        echo '<tr>';

        for ($i = $mmd; $i-$mmd < $wide; $i++) {

            if($n == $mmp && $i ==$mmd) {
                echo '<td></td>';

            }elseif($i == $mmd) {
                $disp = $n-1;
                echo '<td>' . $disp . '</td>';

            }elseif($n == $mmp){
                $disp = $i-1;
                echo '<td>' . $disp . '</td>';

           }else{
                $disp = ($i-1) * ($n-1);
                echo '<td>' . $disp . '</td>';

            }
        }
        echo '</tr>';
    }
}


//Check Each parameter for Integer
if(!checkMissing($expPara) || !checkInt() || !checkMinMax()){

    ?>
    <!DOCTYPE html>
    <html>
        <head lang="en">
            <meta charset="UTF-8">
            <meta name="author" content="Robert Jackson">
            <meta name="description" content="">
            <title>Multable.php</title>
            <script src="" type="application/javascript"></script>
            <link rel="stylesheet" href="" type="text/css">
        </head>
        <body>

            <?php
            if(!checkMissing($expPara)){
                outputMissing($expPara);
            }
            echo $errMsg;
            ?>

        </body>
    </html>
    <?php


}else {


        //(max-multiplicand - min-multiplicand + 2)high
        $high = $_GET['max-multiplier'] - $_GET['min-multiplier'] + 2;
        $wide = $_GET['max-multiplicand'] - $_GET['min-multiplicand'] +2;
        //HTML
    ?>

    <!DOCTYPE html>
    <html>
    <head lang="en">
        <meta charset="UTF-8">
        <meta name="author" content="Robert Jackson">
        <meta name="description" content="">
        <title>Multable.php</title>
        <script src="" type="application/javascript"></script>
        <link rel="stylesheet" href="" type="text/css">
    </head>
    <body>
        <table>
            <tbody>
            <?php
                makeTable();
            ?>

            </tbody>
        </table>
    </body>
    </html>



        <?php
        //(max-multiplier - min-multiplier + 2)wide
        //create Table


    };


?>
