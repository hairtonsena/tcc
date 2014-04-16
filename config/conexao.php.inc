<?php
 $username = 'maesbala_maps';
 $password = 'maps1234';
 $database = 'maesbala_GoogleMaps';
 $server = 'localhost';
 
// Opens a connection to a MySQL server.
$connection = mysql_connect ($server, $username, $password);
if (!$connection) 
{
    die(mysql_error());
}

// Sets the active MySQL database.
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) 
{
    die (mysql_error());
}
 
	mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');

 
?>