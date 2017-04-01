<?php
    // Create Connection Class, Alert Class  
    // Change foreachs to map and add filtering
    require "./core/bootstrap.php";
    use App\Core\Router;
    
    $router = new Router();
    require "./routes.php";
    $router->direct(trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/"), $_SERVER["REQUEST_METHOD"]);
    
    
    

