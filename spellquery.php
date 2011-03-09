<?php

include_once "Apache/Solr/Service.php";

$solr = new Apache_Solr_Service('localhost', 8080, '/solr/main');

$query = "roose";
$start = 0;
$rows = 5;

$additionalParameters = array(
        'qt' => "dismax",
        'spellcheck' => 'true',
        //'spellcheck.build' => 'true',
        'spellcheck.collate' => 'true',
);

$results = $solr->search($query, $start, $rows, $additionalParameters);
echo "Did you mean " . $results->spellcheck->suggestions->collation, PHP_EOL;