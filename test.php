<?php 


require 'DBGraph/DBGraph.php';

use DBGraph\Graph;


$graph = new Graph();
$graph->setStorageBackend("session");

$a1 = $graph->addVertex(["name" => "aa1"]);
$a2 = $graph->addVertex(["name" => "aa2"]);
$a3 = $graph->addVertex(["name" => "aa3"]);

$graph->addEdge($a1,$a2);

$graph->save($graph);

// check graph stored in session
print_r($_SESSION);

print_r($graph);