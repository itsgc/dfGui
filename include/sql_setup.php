<?php

$dbInit = new SQLite3('db/dynamicfilter.sqlite');
$domainList = $dbInit->query('SELECT Id from domains');
$domainAdd = "INSERT INTO domains(dname,enabled) VALUES('" . $newDname . "','1');";

?>
