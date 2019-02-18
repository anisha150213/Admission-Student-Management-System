<?php
spl_autoload_register(function ($class){
    include_once "system/libs/".$class.".php";
});

include "app/config/config.php";

$mail = new Main();
