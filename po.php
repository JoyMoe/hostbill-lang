<?php

require_once 'english.php';

foreach ($lang as $key => $value) {
    $key   = addslashes($key);

    $fh = fopen(__DIR__ . '/locale/en_US/LC_MESSAGES/' . $key . '.po', 'w');
    fwrite($fh, "#\n");
    fwrite($fh, "msgid \"\"\n");
    fwrite($fh, "msgstr \"\"\n");

    foreach ($value as $svalue) {
        $svalue = addslashes($svalue);
        fwrite($fh, "\n");
        fwrite($fh, "msgid \"$svalue\"\n");
        //fwrite($fh, "msgstr \"$svalue\"\n");
        fwrite($fh, "msgstr \"\"\n");
    }

    fclose($fh);
}
