<?php 


/*
	Common graph algorithms and mathematical functions implemented using dbgraph-php
*/


require 'DBGraph/DBGraph.php';

use DBGraph\Graph;


$graph = new Graph();
$graph->setStorageBackend("session");


// verify Handshake Theorem: sum of degrees of vertices is twice the number of edges


$a1 = $graph->addVertex(["name" => "V1"]);
$a2 = $graph->addVertex(["name" => "V2"]);
$a3 = $graph->addVertex(["name" => "V3"]);
$a4 = $graph->addVertex(["name" => "V4"]);
$a5 = $graph->addVertex(["name" => "V5"]);

$graph->addEdge($a1,$a2);
$graph->addEdge($a2,$a3);
$graph->addEdge($a3,$a3);
$graph->addEdge($a3,$a4);
$graph->addEdge($a4,$a5);
$graph->addEdge($a5,$a1);

echo $graph->printEdges();


$vertex_degreesum = 0;
foreach ($graph->vertices as $vertex) {
	$vertex_degreesum += intval($graph->vertexDegree($vertex));
}


echo "Handshake Theorem verification:";
echo "\nVertex Degree Sum:".$vertex_degreesum;
echo "\nEdge Count:".count($graph->edges)."\n";
