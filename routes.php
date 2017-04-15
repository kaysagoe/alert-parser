<?php
$router->get(["" => "PageController@home"]);
$router->get(["api" => "PageController@api"]);
$router->get(["docs" => "PageController@docs"]);
$router->get(["user/home" => "UserController@home"]);
$router->get(["user/new" => "UserController@signup"]);
$router->get(["apikey/new" => "ApiKeyController@new"]);
$router->post(["demo" => "PageController@demo"]);
$router->post(["user/home" => "UserController@login"]);
$router->post(["user/new" => "UserController@process_signup"]);
$router->post(['apikey/new' => 'ApiKeyController@create']);