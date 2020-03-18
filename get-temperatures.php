<?php
$dom=new DOMDocument();
if ($dom->load("temperatures.xml")==false) {
  die("could not open document");
}

$xpath = new DOMXpath($dom) ;
$months = $xpath->query("//month");
$tab = [];
foreach($months as $month) {
	$tab[]= [ $month->getAttribute("name"), floatval($month->getAttribute("value"))];
}

echo json_encode($tab);
?>
