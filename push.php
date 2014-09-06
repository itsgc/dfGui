<?php 
include 'include/sql_setup.php';
$deletedDnameIdArray = $_POST['Id'];
$newDname = $_POST['dname'];
if ($deletedDnameIdArray == '') {
    if ($newDname == '') {
        echo "Nessun dominio selezionato!";
        exit();
    }
    else {
        $newDnameClean = htmlspecialchars($newDname);
        echo "INSERT INTO domains(dname,enabled) VALUES('" . $newDnameClean . "',1);";
        exit();
    }
}
else {
    if ($newDname != '') {
          echo "Puoi effettuare solo rimozioni o aggiunte separatamente.";
          exit();
    }
    else {
        echo "Are these the domains you want to remove from the filter? <br />";
        foreach ($deletedDnameIdArray as $deletedDnameId) {
            $deletedDnameIdClean = htmlspecialchars($deletedDnameId);
            $deletedDnameArray = $dbInit->query('SELECT dname FROM domains WHERE Id = ' . $deletedDnameIdClean . ';');
            while($deletedDname = $deletedDnameArray->fetchArray()) {
                echo $deletedDname[0] . "<br />";
            }
        }
    }
}
?>
