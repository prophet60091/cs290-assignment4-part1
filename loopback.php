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
$aGet = array('GET');
$aPost = array('POST');
//swap for undefined in an Array
//@param typeA a reference to an Array such as GET or POST
//@ TypeS an Array which holds one time, the tyoe of post... Don't ask it's what was stated as a req. Above.
function swapUndies($typeS, &$typeA){
    $a = array();

    $a['Type'] = $typeS;

    foreach ($typeA as $k => $v) {

        if($v == ''){
            $typeA[$k] = 'undefined';
        }

        $a['Parameters'] = $typeA;
    }
    return json_encode($a);

}

if($_GET){

    echo swapUndies($aGet, $_GET);

}elseif($_POST){

    echo swapUndies($aPOST, $_POST);

}else{

    echo '{"Type":"[GET|POST]", "Parameters":null}';
}

