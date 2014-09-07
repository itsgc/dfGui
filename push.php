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
        $domainAdd = "INSERT INTO domains(dname,enabled) VALUES('" . $newDnameClean . "','1');";
        while ($domainAddOutput = $dbInit->query($domainAdd)) {
            echo "Hai inserito " . $newDnameClean . " nella lista dei domini filtrati!\n<br />Sarai reindirizzato alla home in 5 secondi.\n<br /> Clicca <a href='http://" . $_SERVER['HTTP_HOST'] . "/sqlite.php'>qui</a> per essere reindirizzato immediatamente.<p />";
            system("php asapush.php");
            header("Refresh: 5; URL=http://" . $_SERVER['HTTP_HOST'] . "/sqlite.php");
            exit();
        }
    }
}
else {
    if ($newDname != '') {
          echo "Puoi effettuare solo rimozioni o aggiunte separatamente.";
          exit();
    }
    else {
        echo "Hai rimosso dal filtro i seguenti domini: <br />";
        foreach ($deletedDnameIdArray as $deletedDnameId) {
            $deletedDnameIdClean = htmlspecialchars($deletedDnameId);
            $domainDisable = "UPDATE domains SET enabled = '0' WHERE Id = '" . $deletedDnameIdClean . "';";
            while($domainDisableOutput = $dbInit->query($domainDisable)) {
                 $deletedDnameArray = $dbInit->query('SELECT dname FROM domains WHERE Id = ' . $deletedDnameIdClean . ';');
                  while($deletedDname = $deletedDnameArray->fetchArray()) {
                      echo $deletedDname[0] . "<br />";
                      system("php asapush.php");
                      header("Refresh: 5; URL=http://" . $_SERVER['HTTP_HOST'] . "/sqlite.php");
                  }
                 break;
            }
        }
        echo "Sarai reindirizzato alla home in 5 secondi.\n<br /> Clicca <a href='http://" . $_SERVER['HTTP_HOST'] . "/sqlite.php'>qui</a> per essere reindirizzato immediatamente.<p />";
    }
}
?>
