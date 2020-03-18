<?php
$dom=new DOMDocument();
if ($dom->load("temperatures.xml")==false) {
  die("could not open document");
}

//sleep(3);
echo <<<EOT
{
	"chart": { 
		"type": "line",
		"margin": [50, 200, 60, 170] },
	"title": { 
		"text": "Temperatures"
	},
	"legend": {
		"layout": "vertical",
		"style": {
			"left": "auto",
			"bottom": "auto",
			"right": "50px",
			"top": "100px"
		}
	},
	"xAxis": {
		"categories": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
		"title": {
			"text": "Month"
		}
	},
	"yAxis": {
		"title": {
			"text": "Temperature (°C)"
		},
		"plotLines": [{
			"value": "0",
			"width": "1",
			"color": "#808080"
		}]
	},
    "series": [
		{
			"name": "angers",
			"data": [
EOT;
$xpath = new DOMXpath($dom) ;
$months = $xpath->query("//month");
foreach($months as $month) {
	$tab[]="[\"".$month->getAttribute("name")."\",".$month->getAttribute("value")."]";
}
echo implode(", ",$tab);
echo <<<EOT
			]
		}
	]
}
EOT;
?>
