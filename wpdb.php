<?php
    $vars = mysql_connect('localhost','mzchewii_regis','mzchewiize6831');                
   
    if($vars)
    {
        mysql_select_db('mzchewii_regis');
        mysql_query("SET NAMES UTF8") or die('Invalid query: ' . mysql_error());
    } 
    else 
    {
        echo mysql_errno();
    }
 global $vars;
   