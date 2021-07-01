<?php
require_once './app/Routes.php';

function autoload($class_name){
    if(file_exists('./app/classes/'.$class_name.'.php')){
        require_once './app/classes/'.$class_name.'.php';
    } else if(file_exists('./app/controllers/.'.$class_name.'php')){
        require_once './app/controllers/'.$class_name.'.php';

    }
};
spl_autoload_register('autoload');

// require_once 'autoload.php';
