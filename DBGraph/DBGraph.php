<?php 

namespace DBGraph;

use DBGraph\Utilities;


/**
 * DB Graph Implementation of persistent graph data structures
   	
   Author: Shreyak Chakraborty (C) 2021
   License: GNU GPL
 */



class Vertex
{
	function __construct(array $data)
	{
		$this->data = $data;
	}

	public function getAttribute(string $key){
		return $this->data[$key];
	}
}

class Edge
{
	function __construct(array $data)
	{
		$this->data = $data;
	}
}


class Graph
{
	
	function __construct()
	{
		$this->vertices = array();  //vertices have keys and corresponding attributes
	}

	public function test(){
		return "DBGraph is working!\n";
	}


	public function addVertex(array $vertexdata)
	{
		$this->vertices[] = new Vertex($vertexdata);
	}

	public function getNeighbours(Vertex $vertex)
	{
		$this->vertices[] = new Vertex($vertexdata);
	}
}