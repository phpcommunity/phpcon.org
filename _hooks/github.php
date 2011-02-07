<?php
$gitpath = '/usr/local/bin/git';
header("Content-type: text/plain");
system("/usr/bin/env -i HOME=/var/www/vhosts/phpcon.org {$gitpath} pull 2>&1");
echo "\nDone.\n";

