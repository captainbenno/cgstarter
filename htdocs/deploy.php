<?php 

//deploy.php




//exec("sudo git pull https://captainbenno:lila2010@github.com/captainbenno/cgstarter.git master");
//die;

function execPrint($command) {
    $result = array();
    exec($command, $result);
    foreach ($result as $line) {
        echo($line . "\n");
    }
}
// Print the exec output inside of a pre element
echo("<pre>" . execPrint("sudo git pull https://captainbenno:lila2010@github.com/captainbenno/cgstarter.git master") . "</pre>");
