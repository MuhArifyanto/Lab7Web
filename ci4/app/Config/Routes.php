<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// ROUTE UTAMA / UMUM (PUBLIC)
$routes->get('/', 'Artikel::index');           // Halaman depan
$routes->get('/artikel', 'Artikel::index');    // Daftar artikel
$routes->get('/about', 'Page::about');         // Halaman About
$routes->get('/contact', 'Page::contact');     // Halaman Contact
$routes->get('/faqs', 'Page::faqs');           // Halaman FAQ

// ROUTE AUTHENTIKASI USER
$routes->get('user/login', 'User::login');
$routes->post('user/login', 'User::login');
$routes->get('user/logout', 'User::logout');

// ROUTE ADMIN (DENGAN FILTER AUTH)
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('artikel', 'Artikel::admin_index'); // Admin dashboard artikel

    // Route khusus dan detail HARUS di atas (:segment)
    $routes->get('artikel/add', 'Artikel::add'); // Tambah artikel (GET)
    $routes->post('artikel/add', 'Artikel::add'); // Tambah artikel (POST)
    $routes->get('artikel/edit/(:segment)', 'Artikel::edit/$1'); // Edit artikel (GET)
    $routes->post('artikel/edit/(:segment)', 'Artikel::edit/$1'); // Edit artikel (POST)
    $routes->get('artikel/delete/(:segment)', 'Artikel::delete/$1'); // Hapus artikel
    $routes->get('artikel/artikel-kedua', 'Artikel::artikelKedua'); // Artikel khusus

    // Ini HARUS di paling bawah untuk menghindari konflik dengan add/edit/delete
    $routes->get('artikel/(:segment)', 'Artikel::view/$1'); // View berdasarkan slug
});
