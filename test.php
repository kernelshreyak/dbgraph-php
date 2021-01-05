<?php 


require 'DBGraph/DBGraph.php';

use DBGraph\Graph;


$graph = new Graph();

$a1 = $graph->addVertex(["name" => "aa1"]);
$a2 = $graph->addVertex(["name" => "aa2"]);
$a3 = $graph->addVertex(["name" => "aa3"]);


$graph->addEdge($a1,$a2);

print_r($graph);