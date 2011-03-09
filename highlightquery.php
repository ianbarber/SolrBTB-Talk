<?php 

include_once "Apache/Solr/Service.php";

$solr = new Apache_Solr_Service('localhost', 8080, '/solr/main');

$query = "album review";
$start = 0;
$rows = 5;

$additionalParameters = array(
	'hl' => "true",
//	'f.body.hl.snippets' => 2,
	'qt' => 'dismax'
);

$results = $solr->search($query, $start, $rows, $additionalParameters);
foreach($results->response->docs as $doc) {
	echo $results->highlighting->{$doc->permalink}->title[0], PHP_EOL;
}
