<?php

namespace App;

require '../vendor/autoload.php';

spl_autoload_register(function ($classname) {
    $classname = str_replace('\\', '/', $classname);
    require_once(__DIR__ . "/{$classname}.php");
});

class sender
{
    //todo
}
