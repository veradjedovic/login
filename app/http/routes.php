<?php

//web routes
$collector->get('/', ['app\controllers\UserController','index']);
$collector->get('admin', ['app\controllers\UserController','index']);
$collector->any('admin-users', ['app\controllers\UserController','AllUsers']);
$collector->any('admin-insert', ['app\controllers\UserController','insert']);

//Authentification
$collector->get('login', ['app\controllers\AuthController','getlogin']);
$collector->post('login', ['app\controllers\AuthController','postlogin']);
$collector->get('logout', ['app\controllers\AuthController','getlogout']);


