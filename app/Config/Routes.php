<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'League::index');

$routes->get('/league', 'League::index');
$routes->get('/league/add', 'League::add');
$routes->post('/league/add', 'League::save');
$routes->get('/league/(:num)', 'League::edit/$1');
$routes->post('/league/(:num)', 'League::update/$1');

$routes->get('/league-team/(:num)', 'LeagueTeam::index/$1');
$routes->get('/league-team/add/(:num)', 'LeagueTeam::add/$1');
$routes->post('/league-team/add/(:num)', 'LeagueTeam::save/$1');
$routes->get('/league-team/delete/(:num)/(:num)', 'LeagueTeam::delete/$1/$2');

$routes->get('/team', 'Team::index');
$routes->get('/team/add', 'Team::add');
$routes->post('/team/add', 'Team::save');
$routes->get('/team/(:num)', 'Team::edit/$1');
$routes->post('/team/(:num)', 'Team::update/$1');

$routes->get('/player', 'Player::index');
$routes->get('/player/add', 'Player::add');
$routes->post('/player/add', 'Player::save');
$routes->get('/player/(:num)', 'Player::edit/$1');
$routes->post('/player/(:num)', 'Player::update/$1');

$routes->get('/team-player/(:num)', 'TeamPlayer::index/$1');
$routes->get('/team-player/add/(:num)', 'TeamPlayer::add/$1');
$routes->post('/team-player/add/(:num)', 'TeamPlayer::save/$1');
$routes->get('/team-player/delete/(:num)/(:num)', 'TeamPlayer::delete/$1/$2');

