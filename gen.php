<?php

function gen($client = true)
{
    if ($client) {
        $dir = __DIR__ . '/clientarea';
    } else {
        $dir = __DIR__ . '/adminarea';
    }

    require_once $dir . '/english.php';

    $fh = fopen($dir . '/' . getenv('LC_ALL') . '.php', 'w');
    fwrite($fh, "<?php\n");

    foreach ($lang as $key => $value) {
        $key = addslashes($key);

        bindtextdomain($key, $dir . '/locale/');
        textdomain($key);

        foreach ($value as $skey => $svalue) {
            fwrite($fh, "\n");
            $l = "\$lang['$key']['$skey'] = '" . addslashes(_($svalue)) . "';";
            fwrite($fh, $l);
        }
    }

    fclose($fh);
}

gen();

gen(false);
