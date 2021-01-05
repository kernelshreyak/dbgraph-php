<?php

namespace DBGraph;

/*
    Custom library and utility functions for dbgraph-php 
    Author: Shreyak Chakraborty (C) 2021
    License: GNU GPL
*/
class Utilities
{
    function init($dbhost,$dbuser,$dbpass,$dbname)
    {
        global $dbconnect;
        //load database connection
        $dbconnect=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
        if (mysqli_connect_errno())return 0; //db connection failed
    }

    function data_init()
    {
        global $dbconnect;
        
        $sqlbase="CREATE TABLE IF NOT EXISTS graphs(
            ID int(10) PRIMARY KEY AUTO_INCREMENT,
            name varchar(20) UNIQUE NOT NULL,
            date datetime 
        );";
        $sql1="CREATE TABLE IF NOT EXISTS  nodes(
                ID int(10) PRIMARY KEY AUTO_INCREMENT,
                graphid int(10) NOT NULL,
                data text
        )";
        $sql2="CREATE TABLE IF NOT EXISTS edges(
            ID int(10) PRIMARY KEY AUTO_INCREMENT,
            graphid int(10) NOT NULL,
            source int(10) NOT NULL,
            dest int(10) NOT NULL,
            weight float(8,2) DEFAULT 1.0
        )";
        
        if(mysqli_query($dbconnect,$sqlbase) && mysqli_query($dbconnect,$sql1) && mysqli_query($dbconnect,$sql2))
            return 1;
        else
            return 0; 
    }

     //wrappers to perform SQL queries and get results
    function dbquery($sql)    
    {
        global $dbconnect;
        if($dbconnect==NULL)
            return 0;
        else{
            return mysqli_query($dbconnect,$sql);
        }    
    }

    function dbfetch($resultSet)
    {
        global $dbconnect;
        if($dbconnect==NULL)
            return 0;
        else{
            return mysqli_fetch_array($resultSet);
        }    
    }

    function lastid()
    {
        global $dbconnect;
        return mysqli_insert_id($dbconnect);
    }
}


    

?>