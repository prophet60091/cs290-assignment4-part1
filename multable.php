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



$minWarn = "Minimum %d larger than maximum.";
$notIntWarn = " must be an integer.";
$getA = array();

//Check Each parameter for Integer
if(sizeof($_Get)> 4){
    echo "Too many parameters! ";
}else {

    //check for int  b/c _get is a string
    foreach ($_GET as $k => $v) {
        if (((int)$v != $v) || (!is_numeric($v))) {
            echo $k . ' value of "' . $v . '" ' . $notIntWarn;
        }
    }
    //in Heaven everything is fine
    if($_GET['min-multiplicand'] > $_GET['max-multiplicand']){
        echo  'Min-multiplicand  larger than maximum.';

    }
    if($_GET['min-multiplier'] > $_GET['max-multiplier']) {
        echo 'Min-Multiplier is larger than maximum.';
    }

}


//ho sizeof($_GET);
//ho $_GET['min-multiplicand'];

?>