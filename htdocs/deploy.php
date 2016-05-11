<?php 

//deploy.php

function execPrint($command) {
    $result = array();
    exec($command, $result);
    foreach ($result as $line) {
        echo($line . "\n");
    }
}
// Print the exec output inside of a pre element
echo("<pre>" . execPrint("git pull https://captainbenno:lila2010@github.com/captainbenno/cgstarter.git master") . "</pre>");