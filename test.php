<?php 


require 'DBGraph/DBGraph.php';

use DBGraph\Graph;


$graph = new Graph();
$graph->setStorageBackend("session");

$a1 = $graph->addVertex(["name" => "aa1"]);
$a2 = $graph->addVertex(["name" => "aa2"]);
$a3 = $graph->addVertex(["name" => "aa3"]);

$graph->addEdge($a1,$a2);
$graph->addEdge($a2,$a3);
$graph->addEdge($a3,$a3);

$graph->save($graph);

// check graph stored in session
// print_r($_SESSION);

// print_r($graph);



echo "Degree of vertices:\n";
foreach ($graph->vertices as $vertex) {
	echo $vertex->getAttribute("name").": ".$graph->vertexDegree($vertex)."\n";
}
