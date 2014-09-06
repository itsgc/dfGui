<?php 
include 'include/sql_init.php';
echo "Deleted Domain Id:";
$deletedDnameIdArray = $_POST['Id']; 
foreach ($deletedDnameIdArray as $deletedDnameId) {
    $deletedDname = $dbInit->query('SELECT dname FROM domains WHERE Id = ' . $deletedDnameId . ';');
    echo "Are these the domains you want to remove from the filter?";
    echo $deletedDname[0];
}
?>
