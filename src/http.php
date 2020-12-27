<?php

define('FORCE_TLS', getenv('FORCE_TLS') === 'true');
$httpHost = $_SERVER['HTTP_HOST'];
$expectedHost = getenv('HOST');

if (!DEBUG) {
    if (FORCE_TLS) {
        header("Strict-Transport-Security: max-age=31415926; includeSubDomains; preload");
    }
    if (
        FORCE_TLS &&
        isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
        $_SERVER['HTTP_X_FORWARDED_PROTO'] !== 'https'
    ) {
        header('Location: https://' . $expectedHost . $_SERVER['REQUEST_URI']);
        exit;
    }
    if ($httpHost !== $expectedHost) {
        header('Location: https://' . $expectedHost . $_SERVER['REQUEST_URI']);
        exit;
    }
}
