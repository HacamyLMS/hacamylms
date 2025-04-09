<?php
// run_composer.php
echo "Running composer dump-autoload...<br>";
$output = shell_exec('composer dump-autoload');
echo "<pre>$output</pre>";
echo "Done.";