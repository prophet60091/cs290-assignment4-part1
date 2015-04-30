<?php
/**

 * User: Robert
 * Date: 4/27/2015
 * Time: 5:17 PM
 * This file should accept either a GET or POST for input. That GET or POST will have an unknown number of key/value pairs.
 * The page should return a JSON object (remember, this is almost identical to an object literal in JavaScript) of the form
 * {"Type":"[GET|POST]","parameters":{"key1":"value1", ... ,"keyn":"valuen"}}. Behavior if a key is passed in and no value is specified
 * is undefined. If no key value pairs are passed it it should return {"Type":"[GET|POST]", "parameters":null}. You are welcome to use
 * built in JSON function in PHP to produce this output.
 *
 *
 */


$queryS = $_SERVER['QUERY_STRING'];
$reqType = array();
//$parameters = array();
//$parameters['type'] = array();
//$parameters['parameters'] = array();
$jobj = '';

//swap for undefined in an Array
function swapUndies($typeS, &$typeA){
    $a = array();

    $a['Type'] = $typeS;
    foreach ($typeA as $k => $v) {

        if($v == ''){
            $a[$k] = 'undefined';
        }
        else{
            $a[$k] = $v;
        }
    }
    return json_encode($a);

}


if($_GET){


    echo swapUndies('GET', $_GET);


}else{

    echo swapUndies('POST', $_POST);
}

//echo json_encode($jobj);


