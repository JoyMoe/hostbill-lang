<?php

require 'english.php';

putenv('LC_ALL=zh_CN');
setlocale(LC_ALL, 'zh_CN');

$fh = fopen('chinese2.php', 'w');
fwrite($fh, "<?php\n");

foreach ($lang as $key => $value) {
    $key   = addslashes($key);

    bindtextdomain($key, './locale/');
    textdomain($key);

    foreach ($value as $skey => $svalue) {
        fwrite($fh, "\n");
        $l = "\$lang['$key']['$skey'] = '" . _(addslashes($svalue)) . "';";
        fwrite($fh, $l);
    }
}

fclose($fh);
