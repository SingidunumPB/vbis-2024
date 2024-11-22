<?php

require_once __DIR__ . "/../vendor/autoload.php";

use app\controllers\AdminReportController;
use app\controllers\AuthController;
use app\controllers\HomeController;
use app\controllers\ProductController;
use app\controllers\ReservationController;
use app\controllers\ServiceController;
use app\controllers\UserController;
use app\controllers\UserReportController;
use app\controllers\UserServicesController;
use app\core\Application;

$app = new Application();

$app->router->get("/getUser", [UserController::class, 'readUser']);
$app->router->get("/", [HomeController::class, 'home']);

//Users
$app->router->get("/users", [UserController::class, 'readAll']);
$app->router->get("/updateUser", [UserController::class, 'updateUser']);
$app->router->get("/createUser", [UserController::class, 'createUser']);
$app->router->post("/processUpdateUser", [UserController::class, 'processUpdateUser']);
$app->router->post("/processCreateUser", [UserController::class, 'processCreate']);

//Products
$app->router->get("/products", [ProductController::class, 'products']);
$app->router->get("/updateProduct", [ProductController::class, 'update']);
$app->router->post("/processUpdateProduct", [ProductController::class, 'processUpdate']);

//Auth
$app->router->get("/registration", [AuthController::class, 'registration']);
$app->router->post("/processRegistration", [AuthController::class, 'processRegistration']);
$app->router->get("/login", [AuthController::class, 'login']);
$app->router->get("/processLogout", [AuthController::class, 'processLogout']);
$app->router->get("/accessDenied", [AuthController::class, 'accessDenied']);
$app->router->post("/processLogin", [AuthController::class, 'processLogin']);

//Services
$app->router->get("/services", [ServiceController::class, 'list']);
$app->router->get("/updateService", [ServiceController::class, 'update']);
$app->router->get("/createService", [ServiceController::class, 'create']);
$app->router->post("/processUpdateService", [ServiceController::class, 'processUpdate']);
$app->router->post("/processCreateService", [ServiceController::class, 'processCreate']);

//User services
$app->router->get("/servicesForUser", [UserServicesController::class, 'listForUsers']);
$app->router->post("/processReservation", [ReservationController::class, 'processReservation']);

//Reports
$app->router->get("/myReports", [UserReportController::class, 'myReports']);
$app->router->get("/getNumberOfReservationsPerMonth", [UserReportController::class, 'getNumberOfReservationsPerMonth']);
$app->router->get("/getPricePerMonth", [UserReportController::class, 'getPricePerMonth']);

//Admin reports
$app->router->get("/adminReports", [AdminReportController::class, 'adminReports']);
$app->router->get("/getPricePerUser", [AdminReportController::class, 'getPricePerUser']);

$app->run();