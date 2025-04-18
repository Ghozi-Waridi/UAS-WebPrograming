<?php
require_once __DIR__ . '/../../constants/router/Router.php';


use Uas_ProgWeb\features\article\controllers\ArticleController;
use Uas_ProgWeb\constants\router\Router;

Router::add('GET', '/', ArticleController::class, 'index');
