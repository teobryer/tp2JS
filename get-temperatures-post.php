<?php
$dom = new DOMDocument();
if ($dom->load("temperatures.xml") == false) {
    die("could not open document");
}

$month = $_POST["month"];
$xpath = new DOMXpath($dom);
$months = $xpath->query("//month[@name='$month']");
$tab = [];
foreach ($months as $month) {
    $tab[] = [
        $month->getAttribute("name"),
        floatval($month->getAttribute("value"))
    ];
}

echo json_encode($tab);
?>
