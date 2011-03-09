<?php 

include_once "Apache/Solr/Service.php";
$solr = new Apache_Solr_Service('localhost', 8080, '/solr/main');

$query = "badly drawn";

$p = array(
	'facet' => "true",
	'facet.field' => 'category',
	'facet.mincount' => 1,
);

$results = $solr->search($query, 0, 5, $p);
foreach($results->facet_counts->facet_fields->category as $cat => $count) {
	echo $cat, " ", $count, PHP_EOL;
}

$query = "*";
$p = array(
	"facet" => "true",
	"facet.date" => 'date',
	"facet.date.end" => "NOW/YEAR",
	"facet.date.gap" => "+1MONTH",
	"facet.date.start" => "NOW/YEAR-6MONTHS",
	"fq" => "category: Reviews",
);

$results = $solr->search($query, 0, 0, $p);
foreach($results->facet_counts->facet_dates->date as $date => $count) {
	if($date == 'gap' || $date == 'end') continue;
	echo $date, " ", $count, PHP_EOL;
}

$query = "";
$p = array(
	'q.alt' => "*:*",  
	'facet' => "true",
	'facet.mincount' => 1,
	"facet.query" => array("title:gig", "title:album"),
	"fq" => "category:Reviews",
);  
$r = $solr->search($query, $start, $rows, $p);
foreach($r->facet_counts->facet_queries as $query => $count) {
        echo $query, " ", $count, PHP_EOL;
}

$additionalParameters = array(
	'q.alt' => "*:*", // parsed with default 
        'qt' => "dismax",
        'facet' => "true",
        'facet.mincount' => 1,
	'facet.prefix' => "do",
	'facet.field' => "body",
	"fq" => "category:Reviews",
	"facet.limit" => 5,
);  
// IF we're going to do this, we don't want stemming on! User friendly text analysis, like spelling
$rows = 0;
$results = $solr->search($query, $start, $rows, $additionalParameters);
foreach($results->facet_counts->facet_fields->body as $body => $count) {
        echo $body, " ", $count, PHP_EOL;
}

