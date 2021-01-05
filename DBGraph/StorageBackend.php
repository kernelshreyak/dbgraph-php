<?php

namespace DBGraph;




/**
 * 
 	Storage Backends implementation for dbgraph-php 
    Author: Shreyak Chakraborty (C) 2021
    License: GNU GPL  
 */
class StorageBackend 
{
	
	function __construct($storagetype = "session")
	{
		$this->storagetype = $storagetype;

		// initialize storage types
		if ($this->storagetype == "session") {
			
			session_start();

			$_SESSION['vertices'] = NULL;
			$_SESSION['edges'] = NULL;
		}
	}

	function setStorage($vertices,$edges)
	{
		if ($this->storagetype == "session") {
			$_SESSION['vertices'] = serialize($vertices);
			$_SESSION['edges'] = serialize($edges);
		}
	}
}