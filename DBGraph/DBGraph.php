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
		$newedge = new Edge(
			array(
				"vertex_from" => $from,
				"vertex_to" => $to
			)
		);

		$this->edges[] = $newedge;

		return $newedge;
	}

	public function getNeighbours(Vertex $vertex)
	{
		$this->vertices[] = new Vertex($vertexdata);
	}
}