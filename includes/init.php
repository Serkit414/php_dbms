<?php 

/**
 * Initializatons
 * 
 * Register an autoloader, start or resume session
 */

spl_autoload_register(function ($class) {
    require dirname(__DIR__) . "/classes/{$class}.php";
});

session_start();