<!DOCTYPE html>
<html manifest="bedstforalle.appcache">
<head>
  <title>Er det bedst for alle?</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="manifest" href="manifest.json">
  <link rel="icon" sizes="192x192" href="icon-192x192.png">
  <link rel="apple-touch-icon" sizes="128x128" href="icon-128x128.png">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/intro.js/2.1.0/introjs.min.css">
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
</head>
<body style="background-image:url(bg.jpg); background-repeat:no-repeat; background-size:cover;">
    <div id="content">
        <h1 id="Ja"  class="box hidden introjs-showElement"> JA </h1>
        <h1 id="Nej" class="box hidden introjs-showElement"> NEJ </h1>
        <h1 id="Spg" class="box introjs-showElement">Er det bedst for alle?</h1>
		<footer class="hidden">Husk at KB er åben!</footer>
    </div>
    <div class="introjs-overlay" style="top: 0; bottom: 0; left: 0;right: 0; position: fixed; opacity: 0.8;"></div>
<script>
/*
<?php
$result = apcu_fetch("KBOpen");
if ($result === false) {
    echo "console.log(\"Tjekker om KB er åben...\");";
    $xml = file_get_contents("http://xn--erklderbarenben-slbh.dk/");
    $a = strpos($xml, "<div id=\"svar\">");
    if ($a !== FALSE) {
        $b = strpos($xml, "</div>", $a);
        if ($b !== FALSE) {
            $svar = substr($xml, $a+15, $b-($a+15));
            $nope = array("False","Nej","Beklager","Niksen Biksen","Nope","Niks");
            $result = in_array($svar, $nope) ? false : true;
            apcu_store("KBOpen", $result, 15*60); // Cache in 15 min

        } else apcu_store("Error", true, 60);
    } else apc_ustore("Error", true, 60);
}
?>
*/
var rand = function() {
	return Math.random() <?=($result ? "+0.1" : "")?> >= 0.5;
}

$( "#Spg" ).click(function() {
  $( "#Spg" ).fadeOut("fast");
  $( rand() ? "#Ja" : "#Nej" ).fadeIn();
});

$( ".introjs-overlay, .hidden" ).click(function() {
  $( "#Spg" ).fadeIn("fast");
  $( "#Nej" ).fadeOut("fast");
  $( "#Ja" ).fadeOut("fast");
});
</script>
</body>
</html>
