<?php
require_once __DIR__ . '/../../constants/router/Router.php';


use Uas_ProgWeb\features\article\controllers\ArticleController;
use Uas_ProgWeb\constants\router\Router;
use Uas_ProgWeb\features\Home\controllers\HomeController;
use Uas_ProgWeb\features\DetailArticle\controllers\DetailArticleController;
use Uas_ProgWeb\features\Profile\controllers\ProfileController;
use Uas_ProgWeb\features\Auth\controllers\AuthController;
use Uas_ProgWeb\features\Dasboard\controllers\DasboardController;
use Uas_ProgWeb\features\EditorArticle\controllers\EditorArticleController;


Router::add('GET', '/article', ArticleController::class, 'index');
Router::add('GET', '/', HomeController::class, 'index');
Router::add('POST', '/', HomeController::class, 'index');
Router::add('GET', '/detail/(\d+)', DetailArticleController::class, "index");
Router::add('GET', '/profile', ProfileController::class, 'index');
Router::add('POST', '/profile', ProfileController::class, 'store');
Router::add('POST', '/editing', ProfileController::class, 'uploadArtikel');
Router::add('GET', '/login', AuthController::class, 'showLoginForm');
Router::add('POST', '/login', AuthController::class, 'login');
Router::add('GET', '/logout', AuthController::class, 'logout');
Router::add('GET', '/singup', AuthController::class, 'showSingupForm');
Router::add('POST', '/singup', AuthController::class, 'singup');
Router::add('GET', '/editor', EditorArticleController::class, 'index');
Router::add('GET', '/dashboard', DasboardController::class, 'index');
Router::add('GET', '/dashboard/(\w+)', DasboardController::class, 'loadContent');
Router::add('POST', '/approveArticle', DasboardController::class, 'approveArticle');

