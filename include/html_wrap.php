<?php
$databaseAction = "Modifica 1, 2, 3";
$htmlHead = "<html>\n<head>\n<title>\nCisco ASA Dynamic Filter Frontend\n</title>\n<script type='text/javascript' src='js/select_all.js' async></script></head>\n<body>\n";
$formOpen = "<form name='input' action='push.php' method='post'>";
$formClose = "<input type='checkbox' onClick='toggle(this)' /> Seleziona Tutti/Nessuno\n<p />Aggiungi dominio alla blacklist: <input type='text' name='dname'>\n<p /><input type='submit' />\n</form>";
$domainBoxOpen =  "<div style='height:360px;width:320px;border:1px solid #ccc;font:16px/26px;overflow:auto;'>";
$domainBoxClose = "</div>";
$htmlFooter = "</body>\n</html>";

?>

