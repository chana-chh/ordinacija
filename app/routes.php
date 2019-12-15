<?php

use App\Middlewares\AuthMiddleware;
use App\Middlewares\GuestMiddleware;
use App\Middlewares\TehnicarMiddleware;
use App\Middlewares\LekarMiddleware;
use App\Middlewares\VlasnikMiddleware;
use App\Middlewares\AdminMiddleware;

$app->get('/', '\App\Controllers\HomeController:getHome')->setName('pocetna');

$app->group('', function () {
    $this->get('/prijava', '\App\Controllers\AuthController:getPrijava')->setName('prijava');
    $this->post('/prijava', '\App\Controllers\AuthController:postPrijava');
})->add(new GuestMiddleware($container));

$app->group('', function () {
    $this->get('/odjava', '\App\Controllers\AuthController:getOdjava')->setName('odjava');
})->add(new AuthMiddleware($container));

// Autorizacija za razlicite korisnike (lekar, tehnicar, vlasnik, admin)
// TEHNICARI 100
$app->group('', function () {
    $this->get('/tehnicar', '\App\Controllers\TehnicarController:getPocetna')->setName('tehnicar.pocetna');
})->add(new TehnicarMiddleware($container));

// LEKARI 200
$app->group('', function () {
    $this->get('/lekar', '\App\Controllers\LekarController:getPocetna')->setName('lekar.pocetna');
})->add(new LekarMiddleware($container));

// VLASNICI 300
$app->group('', function () {
    $this->get('/vlasnik', '\App\Controllers\VlasnikController:getPocetna')->setName('vlasnik.pocetna');
})->add(new VlasnikMiddleware($container));

// ADMINISTRATORI 0
$app->group('', function () {
    $this->get('/admin/korisnik-lista', '\App\Controllers\KorisnikController:getKorisnikLista')->setName('admin.korisnik.lista');
})->add(new AdminMiddleware($container));
