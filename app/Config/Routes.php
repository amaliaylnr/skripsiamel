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
// homepage view
$routes->get('/', 'HomepageController::index');
$routes->group('pengajuan', function($routes) {
    $routes->get('/', 'HomepageController::pengajuan');
    $routes->get('surat_pengantar', 'HomepageController::form_pengantar');
    $routes->post('form_pengantar_proses', 'HomepageController::form_pengantar_proses');
    
    $routes->get('surat_domisili', 'HomepageController::form_domisili');
    $routes->post('form_domisili_proses', 'HomepageController::form_domisili_proses');

    $routes->get('surat_keterangan_usaha', 'HomepageController::form_keterangan_usaha');
    $routes->post('form_keterangan_usaha_proses', 'HomepageController::form_keterangan_usaha_proses');

    $routes->get('surat_tidak_mampu', 'HomepageController::form_tidak_mampu');
    $routes->post('form_tidak_mampu_proses', 'HomepageController::form_tidak_mampu_proses');

    $routes->get('surat_kematian', 'HomepageController::form_kematian');
    $routes->post('form_kematian_proses', 'HomepageController::form_kematian_proses');

    $routes->get('surat_waris', 'HomepageController::form_waris');
    $routes->post('form_waris_proses', 'HomepageController::form_waris_proses');

});

$routes->group('berita', function($routes) {
    $routes->get('/', 'HomepageController::berita');
    $routes->get('baca-berita/(:segment)', 'HomepageController::berita_view/$1');

});

$routes->group('produk', function($routes) {
    $routes->get('/', 'HomepageController::produk');
    $routes->get('lihat-produk/(:segment)', 'HomepageController::produk_view/$1');

});

$routes->group('about', function($routes) {
    $routes->get('/', 'HomepageController::about');

});

// auth view
$routes->get('login', 'AuthController::index');
$routes->get('register', 'AuthController::register');
$routes->post('create_user','AuthController::create');
$routes->post('login_user','AuthController::login');
$routes->get('logout', 'AuthController::logout');


$routes->get('dashboard', 'DashboardController::index',['filter' => 'authGuard']);
$routes->group('dashboard', ['filter' => 'authGuard'], function($routes) {
    // $routes->get('/', 'DashboardController::index');
    $routes->get('produk', 'ProdukController::index');
    $routes->get('tambah_produk', 'ProdukController::new');
    $routes->post('tambah_produk_proses', 'ProdukController::create');
    $routes->get('produk/delete/(:segment)', 'ProdukController::delete/$1');
    $routes->get('produk/edit/(:segment)', 'ProdukController::edit/$1');
    $routes->post('edit_produk_proses/(:segment)', 'ProdukController::update/$1');
});

// route berita
$routes->group('dashboard', ['filter' => 'authGuard'], function($routes) {
    // $routes->get('/', 'DashboardController::index');
    $routes->get('berita', 'BeritaController::index');
    $routes->get('tambah_berita', 'BeritaController::new');
    $routes->post('tambah_berita_proses', 'BeritaController::create');
    $routes->get('berita/delete/(:segment)', 'BeritaController::delete/$1');
    $routes->get('berita/edit/(:segment)', 'BeritaController::edit/$1');
    $routes->post('edit_berita_proses/(:segment)', 'BeritaController::update/$1');
    $routes->get('berita/view/(:segment)','BeritaController::show/$1');

    // warga penduduk
    $routes->get('penduduk', 'PendudukController::index');
    $routes->get('tambah_penduduk', 'PendudukController::create');
    $routes->post('tambah_penduduk_proses', 'PendudukController::store');
    $routes->get('penduduk_edit/(:any)', 'PendudukController::edit/$1');
    $routes->post('penduduk_edit_proses/(:any)', 'PendudukController::update/$1');
    $routes->get('penduduk_delete/(:segment)', 'PendudukController::delete/$1');

    // warga laporan penyuratan
    $routes->get('laporan', 'LaporanController::index');
});

$routes->group('surat', ['filter' => 'authGuard'], function($routes) {
    $routes->get('/', 'DashboardController::index');

    // surat pengantar
    $routes->get('s_pengantar', 'SPengantarController::index');
    $routes->get('tambah_s_pengantar', 'SPengantarController::new');
    $routes->post('tambah_s_pengantar_proses', 'SPengantarController::create');
    $routes->get('s_pengantar_edit/(:segment)', 'SPengantarController::edit/$1');
    $routes->post('s_pengantar_edit_proses/(:segment)', 'SPengantarController::update/$1');
    $routes->get('s_pengantar_delete/(:segment)', 'SPengantarController::delete/$1');
    $routes->get('s_pengantar/view/(:segment)','SPengantarController::show/$1');
    $routes->get('cetak_s_pengantar/(:segment)', 'SPengantarController::cetak_surat/$1');

    // surat domisili
    $routes->get('s_domisili', 'SDomisiliController::index');
    $routes->get('tambah_s_domisili', 'SDomisiliController::new');
    $routes->post('tambah_s_domisili_proses', 'SDomisiliController::create');
    $routes->get('s_domisili_edit/(:segment)', 'SDomisiliController::edit/$1');
    $routes->post('s_domisili_edit_proses/(:segment)', 'SDomisiliController::update/$1');
    $routes->get('s_domisili_delete/(:segment)', 'SDomisiliController::delete/$1');
    $routes->get('s_domisili/view/(:segment)','SDomisiliController::show/$1');
    $routes->get('cetak_s_ket_domisili/(:segment)', 'SDomisiliController::cetak_surat/$1');

    // surat keterangan
    $routes->get('s_keterangan_usaha', 'SKeteranganUsahaController::index');
    $routes->get('tambah_s_keterangan', 'SKeteranganUsahaController::new');
    $routes->post('tambah_s_keterangan_proses', 'SKeteranganUsahaController::create');
    $routes->get('s_keterangan_delete/(:segment)', 'SKeteranganUsahaController::delete/$1');
    $routes->get('s_keterangan_edit/(:segment)', 'SKeteranganUsahaController::edit/$1');
    $routes->post('s_keterangan_edit_proses/(:segment)', 'SKeteranganUsahaController::update/$1');
    $routes->get('s_keterangan/view/(:segment)','SKeteranganUsahaController::show/$1');
    $routes->get('cetak_s_ket_usaha/(:segment)', 'SKeteranganUsahaController::cetak_surat/$1');

    // surat tidak mampu
    $routes->get('s_tidak_mampu', 'STidakMampuController::index');
    $routes->get('tambah_s_tidak_mampu', 'STidakMampuController::new');
    $routes->post('tambah_s_tidak_mampu_proses', 'STidakMampuController::create');
    $routes->get('s_tidak_mampu_delete/(:segment)', 'STidakMampuController::delete/$1');
    $routes->get('s_tidak_mampu_edit/(:segment)', 'STidakMampuController::edit/$1');
    $routes->post('s_tidak_mampu_edit_proses/(:segment)', 'STidakMampuController::update/$1');
    $routes->get('s_tidak_mampu/view/(:segment)','STidakMampuController::show/$1');
    $routes->get('cetak_s_tm/(:segment)', 'STidakMampuController::cetak_surat/$1');

    // surat kematian
    $routes->get('s_kematian', 'SKematianController::index');
    $routes->get('tambah_s_kematian', 'SKematianController::new');
    $routes->post('tambah_s_kematian_proses', 'SKematianController::create');
    $routes->get('s_kematian_edit/(:segment)', 'SKematianController::edit/$1');
    $routes->post('s_kematian_edit_proses/(:segment)', 'SKematianController::update/$1');
    $routes->get('s_kematian_delete/(:segment)', 'SKematianController::delete/$1');
    $routes->get('s_kematian/view/(:segment)','SKematianController::show/$1');
    $routes->get('cetak_s_kematian/(:segment)', 'SKematianController::cetak_surat/$1');

    // surat ahli waris
    $routes->get('s_waris', 'SWarisController::index');
    $routes->get('tambah_s_waris', 'SWarisController::new');
    $routes->post('tambah_s_waris_proses', 'SWarisController::create');
    $routes->get('s_waris_edit/(:any)', 'SWarisController::edit/$1');
    $routes->post('s_waris_edit_proses/(:any)', 'SWarisController::update/$1');
    $routes->get('s_waris_delete/(:any)', 'SWarisController::delete/$1');
    $routes->get('s_waris/view/(:any)','SWarisController::show/$1');
    $routes->get('cetak_s_waris/(:segment)', 'SWarisController::cetak_surat/$1');

    


    // $routes->get('cetak_s_pengantar/(:segment)', 'SPengantarController::cetak/$1');
});

$routes->group('cetak', ['filter' => 'authGuard'], function($routes) {
    $routes->get('/', 'DomPdfController::index');
    $routes->get('generate', 'DomPdfController::generate');
});


$routes->get('superadmin', 'Home::index',['filter' => 'authGuard']);
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
