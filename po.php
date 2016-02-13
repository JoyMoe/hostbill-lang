<?php

function po($client = true)
{
    if ($client) {
        $dir = __DIR__ . '/clientarea';
    } else {
        $dir = __DIR__ . '/adminarea';
    }

    require_once $dir . '/english.php';

    foreach ($lang as $key => $value) {
        $key = addslashes($key);

        $fh = fopen($dir . '/locale/en_US/LC_MESSAGES/' . $key . '.po', 'w');
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
}

po();

po(false);
