<?php

// autoload_psr4.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'voku\\db\\' => array($vendorDir . '/voku/simple-mysqli/src/voku/db'),
    'voku\\cache\\' => array($vendorDir . '/voku/simple-cache/src/voku/cache'),
    'voku\\' => array($vendorDir . '/voku/portable-utf8/src/voku'),
    'Symfony\\Polyfill\\' => array($vendorDir . '/symfony/polyfill/src'),
    'Symfony\\Component\\Intl\\' => array($vendorDir . '/symfony/intl'),
    'Arrayy\\' => array($vendorDir . '/voku/arrayy/src'),
    'App\\' => array($baseDir . '/helpers'),
);
