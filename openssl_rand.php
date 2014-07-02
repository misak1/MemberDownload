<?php
if (!function_exists('openssl_random_pseudo_bytes')) {
    // openssl_random_pseudo_bytes (PHP 5 >= 5.3.0)
    function openssl_random_pseudo_bytes($length) {
        $length_n = (int) $length; // shell injection is no fun
        $handle = popen("/usr/bin/openssl rand $length_n", "r");
        $data = stream_get_contents($handle);
        pclose($handle);
        return $data;
    }
}

for ($i = -1; $i <= 4; $i++) {
    $bytes = openssl_random_pseudo_bytes($i, $cstrong);
    $hex   = bin2hex($bytes);

    echo "Lengths: Bytes: $i and Hex: " . strlen($hex) . PHP_EOL;
    var_dump($hex);
    var_dump($cstrong);
    echo PHP_EOL;
}
?>
