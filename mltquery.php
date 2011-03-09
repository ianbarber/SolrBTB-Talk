<?php 

include_once "Apache/Solr/Service.php";

$solr = new Apache_Solr_Service('localhost', 8080, '/solr/main');

$query = "Losing my backpacking virginity";

$additionalParameters = array(
	'qt' => "mlt",
);

$results = $solr->search($query, 0, 5, $additionalParameters);
foreach($results->response->docs as $doc) {
	echo $doc->title, PHP_EOL;
}


