<?php

$dbInit = new SQLite3('db/dynamicfilter.sqlite');
$domainList = $dbInit->query('SELECT Id from domains WHERE enabled = 1');
$newDnameClean = '';
$domainAdd = "INSERT INTO domains(dname,enabled) VALUES('" . $newDnameClean . "','1');";

?>
