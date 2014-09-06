<?php 
include 'include/sql_setup.php';
echo "Are these the domains you want to remove from the filter? <br />";
$deletedDnameIdArray = $_POST['Id']; 
foreach ($deletedDnameIdArray as $deletedDnameId) {
    $deletedDnameArray = $dbInit->query('SELECT dname FROM domains WHERE Id = ' . $deletedDnameId . ';');
    while($deletedDname = $deletedDnameArray->fetchArray()) {
        echo $deletedDname[0] . "<br />";
    }
}
?>
