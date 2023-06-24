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















$routes->post('/kota', 'Home::index2');

// ROUTE AMALAN YAUMI
$routes->get('/amalan_yaumi', 'AmalanYaumiController::display');
$routes->get('/amalan_yaumi_master', 'AmalanYaumiController::index', ['filter' => 'auth']);
$routes->get('/amalan_yaumi/add', 'AmalanYaumiController::add', ['filter' => 'auth']);
$routes->post('/amalan_yaumi/save', 'AmalanYaumiController::save');
$routes->get('/amalan_yaumi/(:segment)', 'AmalanYaumiController::detail/$1', ['filter' => 'auth']);
$routes->get('/amalan_yaumi/edit/(:segment)', 'AmalanYaumiController::edit/$1', ['filter' => 'auth']);
$routes->get('/amalan_yaumi/edit_status/(:segment)/(:segment)', 'AmalanYaumiController::edit_status/$1/$2', ['filter' => 'auth']);
$routes->post('/amalan_yaumi/update', 'AmalanYaumiController::update');
$routes->get('/amalan_yaumi/delete/(:segment)', 'AmalanYaumiController::delete/$1', ['filter' => 'auth']);
$routes->post('/amalan_yaumi/search', 'AmalanYaumiController::search');


// ROUTE BERITA
$routes->get('/berita/listBerita', 'BeritaController::listBerita');
$routes->get('/detailBeritaPengunjung/(:segment)', 'BeritaController::detail_berita_depan/$1');
$routes->get('/detailBeritaPengunjung/(:segment)', 'BeritaController::detail_berita_depan/$1');
$routes->get('/berita/detail', 'BeritaController::detail_berita_depan');
$routes->get('/berita', 'BeritaController::display');
$routes->get('/berita_master', 'BeritaController::index', ['filter' => 'auth']);
$routes->get('/berita/add', 'BeritaController::add', ['filter' => 'auth']);
$routes->post('/berita/save', 'BeritaController::save');
$routes->get('/berita/(:segment)', 'BeritaController::detail/$1', ['filter' => 'auth']);
$routes->get('/berita/edit/(:segment)', 'BeritaController::edit/$1', ['filter' => 'auth']);
$routes->get('/berita/edit_status/(:segment)/(:segment)', 'BeritaController::edit_status/$1/$2', ['filter' => 'auth']);
$routes->post('/berita/update', 'BeritaController::update');
$routes->get('/berita/delete/(:segment)', 'BeritaController::delete/$1', ['filter' => 'auth']);
$routes->post('/berita/search', 'BeritaController::search');


// ROUTE DOA
$routes->get('/doa', 'DoaController::display');
$routes->get('/doa_master', 'DoaController::index', ['filter' => 'auth']);
$routes->get('/doa/add', 'DoaController::add', ['filter' => 'auth']);
$routes->get('/doa/add_detail/(:segment)', 'DoaController::add_detail/$1', ['filter' => 'auth']);
$routes->post('/doa/save', 'DoaController::save');
$routes->post('/doa/save_detail', 'DoaController::save_detail');
$routes->get('/doa/detail/(:segment)', 'DoaController::detail/$1', ['filter' => 'auth']);
$routes->get('/doa/edit/(:segment)', 'DoaController::edit/$1', ['filter' => 'auth']);
$routes->get('/doa/edit_detail/(:segment)/(:segment)', 'DoaController::edit_detail/$1/$2', ['filter' => 'auth']);
$routes->get('/doa/edit_status/(:segment)/(:segment)', 'DoaController::edit_status/$1/$2', ['filter' => 'auth']);
$routes->get('/doa/edit_status_detail/(:segment)/(:segment)/(:segment)', 'DoaController::edit_status_detail/$1/$2/$3', ['filter' => 'auth']);
$routes->post('/doa/update', 'DoaController::update');
$routes->post('/doa/update_detail', 'DoaController::update_detail');
$routes->get('/doa/delete/(:segment)', 'DoaController::delete/$1', ['filter' => 'auth']);
$routes->get('/doa/delete_detail/(:segment)/(:segment)', 'DoaController::delete_detail/$1/$2', ['filter' => 'auth']);
$routes->post('/doa/search', 'DoaController::search');


//ROUTE KATEGORI BERITA
$routes->get('/kategori_berita', 'KategoriBeritaController::display');
$routes->get('/kategori_berita_master', 'KategoriBeritaController::index', ['filter' => 'auth']);
$routes->get('/kategori_berita/add', 'KategoriBeritaController::add', ['filter' => 'auth']);
$routes->post('/kategori_berita/save', 'KategoriBeritaController::save');
$routes->get('/kategori_berita/(:segment)', 'KategoriBeritaController::detail/$1', ['filter' => 'auth']);
$routes->get('/kategori_berita/edit/(:segment)', 'KategoriBeritaController::edit/$1', ['filter' => 'auth']);
$routes->get('/kategori_berita/edit_status/(:segment)/(:segment)', 'KategoriBeritaController::edit_status/$1/$2', ['filter' => 'auth']);
$routes->post('/kategori_berita/update', 'KategoriBeritaController::update');
$routes->get('/kategori_berita/delete/(:segment)', 'KategoriBeritaController::delete/$1', ['filter' => 'auth']);
$routes->post('/kategori_berita/search', 'KategoriBeritaController::search');


//ROUTE KATEGORI WAWASAN ISLAMI
$routes->get('/kategori_wawasan_islami', 'KategoriWawasanIslamiController::display');
$routes->get('/kategori_wawasan_islami_master', 'KategoriWawasanIslamiController::index', ['filter' => 'auth']);
$routes->get('/kategori_wawasan_islami/add', 'KategoriWawasanIslamiController::add', ['filter' => 'auth']);
$routes->post('/kategori_wawasan_islami/save', 'KategoriWawasanIslamiController::save');
$routes->get('/kategori_wawasan_islami/(:segment)', 'KategoriWawasanIslamiController::detail/$1', ['filter' => 'auth']);
$routes->get('/kategori_wawasan_islami/edit/(:segment)', 'KategoriWawasanIslamiController::edit/$1', ['filter' => 'auth']);
$routes->get('/kategori_wawasan_islami/edit_status/(:segment)/(:segment)', 'KategoriWawasanIslamiController::edit_status/$1/$2', ['filter' => 'auth']);
$routes->post('/kategori_wawasan_islami/update', 'KategoriWawasanIslamiController::update');
$routes->get('/kategori_wawasan_islami/delete/(:segment)', 'KategoriWawasanIslamiController::delete/$1', ['filter' => 'auth']);
$routes->post('/kategori_wawasan_islami/search', 'KategoriWawasanIslamiController::search');


//ROUTE KUTIPAN
$routes->get('/kutipan', 'KutipanController::display');
$routes->get('/kutipan_master', 'KutipanController::index', ['filter' => 'auth']);
$routes->get('/kutipan/add', 'KutipanController::add', ['filter' => 'auth']);
$routes->post('/kutipan/save', 'KutipanController::save');
$routes->get('/kutipan/(:segment)', 'KutipanController::detail/$1', ['filter' => 'auth']);
$routes->get('/kutipan/edit/(:segment)', 'KutipanController::edit/$1', ['filter' => 'auth']);
$routes->get('/kutipan/edit_status/(:segment)/(:segment)', 'KutipanController::edit_status/$1/$2', ['filter' => 'auth']);
$routes->post('/kutipan/update', 'KutipanController::update');
$routes->get('/kutipan/delete/(:segment)', 'KutipanController::delete/$1', ['filter' => 'auth']);
$routes->post('/kutipan/search', 'KutipanController::search');


//ROUTE NOTIFIKASI
$routes->get('/notifikasi', 'NotifikasiController::display');
$routes->get('/notifikasi/all', 'NotifikasiController::display');
$routes->get('/notifikasi_master', 'NotifikasiController::index', ['filter' => 'auth']);
$routes->get('/notifikasi/add', 'NotifikasiController::add', ['filter' => 'auth']);
$routes->get('/notifikasi/add_target/(:segment)', 'NotifikasiController::add_target/$1', ['filter' => 'auth']);
$routes->post('/notifikasi/save', 'NotifikasiController::save');
$routes->post('/notifikasi/save_target', 'NotifikasiController::save_target');
$routes->get('/notifikasi/detail/(:segment)', 'NotifikasiController::detail/$1', ['filter' => 'auth']);
$routes->get('/notifikasi/edit/(:segment)', 'NotifikasiController::edit/$1', ['filter' => 'auth']);
$routes->get('/notifikasi/edit_status/(:segment)/(:segment)', 'NotifikasiController::edit_status/$1/$2', ['filter' => 'auth']);
$routes->get('/notifikasi/read/(:segment)', 'NotifikasiController::read/$1', ['filter' => 'auth']);
$routes->post('/notifikasi/update', 'NotifikasiController::update');
$routes->get('/notifikasi/delete/(:segment)', 'NotifikasiController::delete/$1', ['filter' => 'auth']);
$routes->get('/notifikasi/delete_target/(:segment)', 'NotifikasiController::delete_target/$1', ['filter' => 'auth']);
$routes->post('/notifikasi/search', 'NotifikasiController::search');


//ROUTE RENCANA KEGIATAN
$routes->get('/rencana_kegiatan', 'RencanaKegiatanController::display');
$routes->get('/rencana_kegiatan_master', 'RencanaKegiatanController::index', ['filter' => 'auth']);
$routes->get('/rencana_kegiatan/add', 'RencanaKegiatanController::add', ['filter' => 'auth']);
$routes->get('/rencana_kegiatan/add_detail/(:segment)', 'RencanaKegiatanController::add_detail/$1', ['filter' => 'auth']);
$routes->post('/rencana_kegiatan/save', 'RencanaKegiatanController::save');
$routes->get('/rencana_kegiatan/(:segment)', 'RencanaKegiatanController::detail/$1', ['filter' => 'auth']);
$routes->get('/rencana_kegiatan/detail/(:segment)', 'RencanaKegiatanController::detail/$1', ['filter' => 'auth']);
$routes->get('/rencana_kegiatan/edit/(:segment)', 'RencanaKegiatanController::edit/$1', ['filter' => 'auth']);
$routes->get('/rencana_kegiatan/edit_detail/(:segment)/(:segment)', 'RencanaKegiatanController::edit_detail/$1/$2', ['filter' => 'auth']);
$routes->get('/rencana_kegiatan/edit_status/(:segment)/(:segment)', 'RencanaKegiatanController::edit_status/$1/$2', ['filter' => 'auth']);
$routes->get('/rencana_kegiatan/edit_status_detail/(:segment)/(:segment)/(:segment)', 'RencanaKegiatanController::edit_status_detail/$1/$2/$3', ['filter' => 'auth']);
$routes->post('/rencana_kegiatan/update', 'RencanaKegiatanController::update');
$routes->post('/rencana_kegiatan/update_detail', 'RencanaKegiatanController::update_detail');
$routes->get('/rencana_kegiatan/delete/(:segment)', 'RencanaKegiatanController::delete/$1', ['filter' => 'auth']);
$routes->get('/rencana_kegiatan/delete_detail/(:segment)/(:segment)', 'RencanaKegiatanController::delete_detail/$1/$2', ['filter' => 'auth']);
$routes->post('/rencana_kegiatan/search', 'RencanaKegiatanController::search');


// ROUTE REVIEW
$routes->get('/review_master', 'ReviewController::index', ['filter' => 'auth']);
$routes->get('/review/add', 'ReviewController::add', ['filter' => 'auth']);
$routes->post('/review/save', 'ReviewController::save');
$routes->get('/review/edit/(:segment)', 'ReviewController::edit/$1', ['filter' => 'auth']);
$routes->get('/review/edit_status/(:segment)/(:segment)', 'ReviewController::edit_status/$1/$2', ['filter' => 'auth']);
$routes->post('/review/update', 'ReviewController::update');
$routes->get('/review/delete/(:segment)', 'ReviewController::delete/$1', ['filter' => 'auth']);


// ROUTE SARAN
$routes->get('/saran_master', 'saranController::index', ['filter' => 'auth']);
$routes->post('/saran/save', 'saranController::save');
$routes->get('/saran/delete/(:segment)', 'saranController::delete/$1', ['filter' => 'auth']);


// ROUTE WAWASAN ISLAMI
$routes->get('/listWawasanIslami', 'WawasanIslamiController::listWawasan');
$routes->get('/detailWawasanPengunjung/(:segment)', 'WawasanIslamiController::detail_wawasan_depan/$1');
$routes->get('/detailWawasanPengunjung/(:segment)', 'WawasanIslamiController::detail_wawasan_depan/$1');
$routes->get('/wawasan_islami', 'WawasanIslamiController::display');
$routes->get('/wawasan_islami_master', 'WawasanIslamiController::index', ['filter' => 'auth']);
$routes->get('/wawasan_islami/add', 'WawasanIslamiController::add', ['filter' => 'auth']);
$routes->post('/wawasan_islami/save', 'WawasanIslamiController::save');
$routes->get('/wawasan_islami/(:segment)', 'WawasanIslamiController::detail/$1', ['filter' => 'auth']);
$routes->get('/wawasan_islami/edit/(:segment)', 'WawasanIslamiController::edit/$1', ['filter' => 'auth']);
$routes->get('/wawasan_islami/edit_status/(:segment)/(:segment)', 'WawasanIslamiController::edit_status/$1/$2', ['filter' => 'auth']);
$routes->post('/wawasan_islami/update', 'WawasanIslamiController::update');
$routes->get('/wawasan_islami/delete/(:segment)', 'WawasanIslamiController::delete/$1', ['filter' => 'auth']);
$routes->post('/wawasan_islami/search', 'WawasanIslamiController::search');


// ROUTE ONE SIGNAL
$routes->get('/onesignal', 'OneSignalController::index');
$routes->get('/onesignal/push/(:segment)/(:segment)/(:segment)', 'OneSignalController::send_message/$1/$2/$3');


// ROUTE LANDING PAGE
$routes->get('/welcome', 'welcome::index');


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
