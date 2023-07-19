<?php

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

$f = function (array $context) {
    $k =  new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
    return $k;
};

return $f;
