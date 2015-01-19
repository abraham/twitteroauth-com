<?php

define('FORCE_TLS', getenv('FORCE_TLS') === 'true');
$httpHost = $_SERVER['HTTP_HOST'];
$expectedHost = getenv('HOST');

foreach ($_SERVER as $name => $value) {
    error_log("HEADER: $name: $value");
}

if (!DEBUG) {
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
