<?php
include 'include/sql_setup.php';
include 'include/config.php';

$filteredDnamesQuery = "SELECT dname FROM domains WHERE enabled = '1';";  
$asaCommitString = "no dynamic-filter blacklist\ndynamic-filter blacklist\n";
$asaDeleteOldFilter = "no%20dynamic-filter%20blacklist";
$asaHttpRoot = "https://" . $asaIp . "/exec/";
$asaCommitArray = array();
$asaFilterPrefix = $asaHttpRoot . "dynamic-filter%20blacklist";
$asaFilterNew = $asaFilterPrefix . "/name%20";

array_push($asaCommitArray, $asaHttpRoot . $asaDeleteOldFilter);
while ($filteredDnamesArray = $dbInit->query($filteredDnamesQuery)) {
    while($filteredDnamesOutput = $filteredDnamesArray->fetchArray()) {
        $asaCommitString .= "  name " . $filteredDnamesOutput[0] . "\n";
        array_push($asaCommitArray, $asaFilterNew . $filteredDnamesOutput[0]);
    }
    $asaCommitString .= "exit";
    echo $asaCommitString;
    file_put_contents($outputFile, $asaCommitString);
    break;
}

foreach($asaCommitArray as $url) {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $out = curl_exec($ch);
    print "error:" . curl_error($ch) . "<br />";
    print "output:" . $out . "<br /><br />";
    curl_close($ch);
}
?>
