<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('health', 'Health::index');
$routes->post('search', 'Home::search');
$routes->post('contact', 'Home::contact');
$routes->post('home/search', 'Home::search');
$routes->post('home/contact', 'Home::contact');

foreach (['program', 'startup', 'news', 'event', 'blog', 'gallery'] as $contentType) {
    $routes->get($contentType, 'Content::index/' . $contentType);
    $routes->get($contentType . '/selanjutnya/(:num)', 'Content::show/' . $contentType . '/$1');
}

$routes->get('user', 'Auth::registerForm');
$routes->post('user', 'Auth::register');
$routes->get('user/login', 'Auth::loginForm');
$routes->post('user/login', 'Auth::login');
$routes->post('user/aksi_login', 'Auth::login');
$routes->get('user/register', 'Auth::registerForm');
$routes->post('user/register', 'Auth::register');
$routes->get('user/logout', 'Auth::logout');
$routes->get('profile', 'Profile::index');
$routes->get('profile/detail', 'Profile::index');
$routes->post('profile', 'Profile::update');
$routes->post('profile/update/(:num)', 'Profile::update');
$routes->get('event_join', 'Auth::loginForm');
$routes->get('event_join/update/(:num)', 'Content::show/event/$1');
$routes->post('event_join/join/(:num)', 'Events::join/$1');
$routes->post('event_join/update/(:num)', 'Events::join/$1');

$routes->get('admin/login', 'Admin\Auth::loginForm');
$routes->post('admin/login', 'Admin\Auth::login');
$routes->post('admin/login/aksi_login', 'Admin\Auth::login');
$routes->get('admin/logout', 'Admin\Auth::logout');
$routes->get('admin/login/logout', 'Admin\Auth::logout');
$routes->get('admin', 'Admin\Dashboard::index');
$routes->get('admin/dashboard', 'Admin\Dashboard::index');
$routes->get('admin/content/(:segment)', 'Admin\Content::index/$1');
$routes->get('admin/content/(:segment)/new', 'Admin\Content::createForm/$1');
$routes->post('admin/content/(:segment)/create', 'Admin\Content::create/$1');
$routes->get('admin/content/(:segment)/(:num)/edit', 'Admin\Content::edit/$1/$2');
$routes->post('admin/content/(:segment)/(:num)/update', 'Admin\Content::update/$1/$2');
$routes->post('admin/content/(:segment)/(:num)/delete', 'Admin\Content::delete/$1/$2');

foreach (['program', 'startup', 'news', 'event', 'blog', 'gallery'] as $contentType) {
    $routes->get('admin/' . $contentType, 'Admin\Content::index/' . $contentType);
    $routes->get('admin/' . $contentType . '/create', 'Admin\Content::createForm/' . $contentType);
    $routes->post('admin/' . $contentType . '/create', 'Admin\Content::create/' . $contentType);
    $routes->get('admin/' . $contentType . '/update/(:num)', 'Admin\Content::edit/' . $contentType . '/$1');
    $routes->post('admin/' . $contentType . '/update/(:num)', 'Admin\Content::update/' . $contentType . '/$1');
    $routes->post('admin/' . $contentType . '/delete/(:num)', 'Admin\Content::delete/' . $contentType . '/$1');
}
