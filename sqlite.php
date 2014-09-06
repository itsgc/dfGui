<?php

include 'include/html_wrap.php';
include 'include/sql_setup.php';
echo $htmlHead;
echo $formOpen;
echo $domainBoxOpen;
while ($uniqueIds = $domainList->fetchArray()) {
    $singleId = $uniqueIds[0];
    $domainQuery = $dbInit->query('SELECT dname FROM domains WHERE Id = ' . $singleId . ';');
    /*Fetch real domains from Id */
    while ($domainName = $domainQuery->fetchArray()) {
        $singleDomain = $domainName[0];
        echo '<input type="checkbox" name="Id[]" value="' . $singleId . '">' . $singleDomain . '<br />';
    }
}
echo $domainBoxClose;
echo $formClose;
echo $htmlFooter;

?>
