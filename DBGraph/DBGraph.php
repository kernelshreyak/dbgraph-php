<?php 

namespace DBGraph;

require 'StorageBackend.php';
require 'Exception.php';

use DBGraph\StorageBackend;
use DBGraph\DBGraphException;
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

	public function getAttribute(string $key)
	{
		return $this->data[$key];
	}
}

class Edge
{
	function __construct(Vertex $vertex_from,Vertex $vertex_to,array $data = [])
	{
		$this->vertex_from = $vertex_from;
		$this->vertex_to = $vertex_to;
		$this->data = $data;
	}

	public function edgeData()
	{
		return $this->data;
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

	//----------------------------- storage components--------------------------

	public function setStorageBackend($value)
	{
		$this->storagebackend = new StorageBackend();
	}

	public function save()
	{
		if ($this->storagebackend) {
			if (!$this->vertices) {
				throw new DBGraphException("No vertex data!", 1);
				return;
			}

			if (!$this->edges) {
				throw new DBGraphException("No edge data!", 1);
				return;
			}

			$this->storagebackend->setStorage($this->vertices,$this->edges);
		}
		else{
			throw new DBGraphException("No storage backend found", 1);
			
		}
	}


	//----------------------------- structural components-----------------

	public function addVertex(array $vertexdata)
	{
		$newvertex = new Vertex($vertexdata);
		$this->vertices[] = $newvertex;

		return $newvertex;

	}

	public function addEdge(Vertex $from,Vertex $to)
	{
		$newedge = new Edge($from,$to);
		$this->edges[] =$newedge;

		return $newedge;
	}

	public function getNeighbours(Vertex $vertex)
	{
		$this->vertices[] = new Vertex($vertexdata);
	}


	// returns degree of a vertex: number of edges connected to that vertex
	public function vertexDegree(Vertex $vertex)
	{
		$degree = 0;
		foreach ($this->edges as $edge) {
			if($edge->vertex_from == $vertex)
				$degree += 1;
			if($edge->vertex_to == $vertex)
				$degree += 1;
		}
		return $degree;
	}

	// pretty print the edges of the graph
	public function printEdges()
	{
		$print_str = "";
		foreach ($this->edges as $edge) {
			$print_str .= $edge->vertex_from->getAttribute('name')." --> ".$edge->vertex_to->getAttribute('name')."\n";
		}

		return $print_str;
	}
}