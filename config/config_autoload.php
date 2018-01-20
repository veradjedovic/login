<?php

define("Loaded",TRUE);

/**
 * 
 * @param $name
 */
function aload_controllers($name) {
    $parts = explode('\\', $name);
    if(file_exists(APP_PATH."app/controllers/" . end($parts) . ".php"))        
    require_once APP_PATH.'app/controllers/' . end($parts) . '.php';
}

/**
 * 
 * @param $name
 */
function aload_models($name) {
    $parts = explode('\\', $name);
    if(file_exists(APP_PATH.'app/models/'.end($parts).'.php'))        
    require_once APP_PATH.'app/models/'.end($parts).'.php'; 
}

spl_autoload_register("aload_controllers");
spl_autoload_register("aload_models");