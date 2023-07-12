<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// ROUTE HOME
$routes->get('/', 'HomeController::index');


// ROUTE AUTH
$routes->get('/login', 'AuthController::index'); // untuk login
$routes->get('/logout', 'AuthController::logout'); // untuk logout
$routes->post('/login/auth', 'AuthController::auth'); // untuk checking data login
// $routes->get('/register', 'RegisterController::index'); // untuk register data
// $routes->get('/register/VRegister', 'UserController::add'); // untuk register data
// $routes->post('/register/save', 'RegisterController::save'); // untuk menyimpan user baru

// ROUTE DASHBOARD
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);


// ROUTE SCANNER
$routes->get('/scanner_master', 'ScannerController::index', ['filter' => 'auth']);

    
// ROUTE USER
$routes->get('/user_master', 'UserController::index', ['filter' => 'auth']);
$routes->get('/user/edit_status/(:segment)/(:segment)', 'UserController::edit_status/$1/$2', ['filter' => 'auth']);
$routes->get('/user/add', 'UserController::add', ['filter' => 'auth']);
$routes->post('/user/save', 'UserController::save', ['filter' => 'auth']);
$routes->get('/user/edit/(:segment)', 'UserController::edit/$1', ['filter' => 'auth']);
$routes->post('/user/update', 'UserController::update', ['filter' => 'auth']);
$routes->get('/user/delete/(:segment)', 'UserController::delete/$1', ['filter' => 'auth']);
$routes->get('/user/reset_password/(:segment)', 'UserController::reset_password/$1', ['filter' => 'auth']);
$routes->get('/user/profil', 'UserController::profil', ['filter' => 'auth']);
$routes->post('/user/update_profil', 'UserController::update_profil', ['filter' => 'auth']);
$routes->get('/user/ubah_password', 'UserController::ubah_password', ['filter' => 'auth']);
$routes->post('/user/save_password_baru', 'UserController::save_password_baru', ['filter' => 'auth']);


$routes->get('/user', 'UserController::display');
$routes->get('/user/(:segment)', 'UserController::detail/$1', ['filter' => 'auth']);
$routes->post('/user/search', 'UserController::search');
$routes->get('/user/email_activation/(:segment)/(:segment)', 'UserController::kirim_email/$1/$2');
$routes->get('/aktivasi_akun/(:segment)', 'UserController::aktivasi_akun/$1');
$routes->get('/lupa_password/', 'UserController::lupa_password/');
$routes->get('/register_user/', 'UserController::register_user');
$routes->post('/user/register_user/save', 'UserController::save_register');



// ROUTES PEGAWAI
$routes->get('/pegawai_master', 'PegawaiController::index', ['filter' => 'auth']);
$routes->get('/pegawai/add', 'PegawaiController::add', ['filter' => 'auth']);
$routes->post('/pegawai/save', 'PegawaiController::save', ['filter' => 'auth']);
$routes->get('/pegawai/edit/(:segment)', 'PegawaiController::edit/$1', ['filter' => 'auth']);
$routes->post('/pegawai/update', 'PegawaiController::update', ['filter' => 'auth']);
$routes->get('/pegawai/delete/(:segment)', 'PegawaiController::delete/$1', ['filter' => 'auth']);


// ROUTES ABSEN
$routes->get('/absen_master', 'AbsenController::index', ['filter' => 'auth']);
$routes->get('/absen_master_pegawai', 'AbsenController::index', ['filter' => 'auth']);
$routes->get('/absen/absen_pegawai/(:segment)', 'AbsenController::absen_pegawai/$1', ['filter' => 'auth']);
$routes->post('/absen/absen_pegawai_manual', 'AbsenController::absen_pegawai_manual', ['filter' => 'auth']);




// ROUTE DASHBOARD
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);


// ROUTE JADWAL SHOLAT
$routes->get('/jadwal_solat', 'JadwalSolatController::index');






/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
