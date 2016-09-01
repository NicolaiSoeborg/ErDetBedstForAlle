<?php
/*ini_set('display_errors', 1);
error_reporting(E_ALL);*/

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$result = "Ukendt";
/*$result = apcu_fetch("KBOpen");
if ($result === false) {*/
    //echo "console.log(\"Tjekker om KB er åben...\");";
    $xml = file_get_contents("http://xn--erklderbarenben-slbh.dk/");
    $a = strpos($xml, "<div id=\"svar\">");
    if ($a !== FALSE) {
        $b = strpos($xml, "</div>", $a);
        if ($b !== FALSE) {
            $nope = array("False","Nope", "Nej","Beklager","Niksen Biksen","Niks", "No");
            $yeah = array("True", "Yeah", "Ja", "Tjek",    "Jepper",       "Jep",  "Yes");

            $svar = substr($xml, $a+15, $b-($a+15));

            $result = $svar;
            if (in_array($svar, $yeah)) $result = "Ja";
            if (in_array($svar, $nope)) $result = "Nej";

            //apcu_store("KBOpen", $result, 15*60); // Cache in 15 min

        } //else apcu_store("Error", true, 60);
    } //else apcu_store("Error", true, 60);
//} else $result = "No";

echo $result;
?>