<?php

session_start();

require_once("config/Route.php");
$route=new Route;
$route->getPage();
