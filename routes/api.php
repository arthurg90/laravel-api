<?php

$router->group(["prefix" => "articles"], function ($router) {
  $router->post("", "Articles@create");
  $router->get("", "Articles@list");

  $router->get("{article}", "Articles@read");
  $router->put("{article}", "Articles@update");
  $router->delete("{article}", "Articles@delete");

  $router->post("{article}/comments", "Comments@create");
  $router->get("{article}/comments", "Comments@list");

});

$router->group(["prefix" => "tags"], function ($router) {
  $router->get("", "Tags@list");
  $router->get("{tag}/articles", "Tags@read");
});




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
