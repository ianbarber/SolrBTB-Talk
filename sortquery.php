<?php
include_once "Apache/Solr/Service.php";

$solr = new Apache_Solr_Service('localhost', 8080, '/solr/main');
$query = "album review";
$param = array(
        'sort' => 'title_sort desc'
);

$results = $solr->search($query, 0, 10, $param);
foreach($results->response->docs as $doc) {
        echo $doc->title, PHP_EOL;
}
