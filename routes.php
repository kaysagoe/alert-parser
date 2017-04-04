<?php
$router->get(["" => "PageController@home"]);
$router->get(["api" => "PageController@api"]);
$router->get(["docs" => "PageController@docs"]);
$router->post(["demo" => "PageController@demo"]);