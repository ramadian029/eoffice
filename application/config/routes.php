<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Login';
$route['data-kelurahan'] = 'Data_kelurahan';
$route['data-arsip'] = 'Data_arsip';
$route['laporan-breakdown'] = 'Data_laporan';
$route['cetak-laporan/(:any)'] = 'Cetak_laporan/index/$1';
$route['data-pelayanan/(:any)'] = 'Data_pelayanan/layanan/$1';
$route['data-rekap/(:any)'] = 'Data_rekap/rekap/$1';
$route['tambah-data-pelayanan/(:any)'] = 'Data_pelayanan/form/$1';
$route['tambah-data-rekap/(:any)'] = 'Data_rekap/form/$1';
$route['data-jenis-infrastruktur'] = 'Jenis_infrastruktur';
$route['data-jenis-kondisi-infrastruktur'] = 'Jenis_kondisi';
$route['data-jenis-material'] = 'Jenis_material';
$route['manajemen-pengguna'] = 'Pengguna';
$route['kondisi-infrastruktur/(:any)'] = 'Data_infrastruktur/kondisi_infrastruktur/$1';
$route['tambah-kondisi-infrastruktur/(:any)'] = 'Data_infrastruktur/form/$1';
$route['edit-kondisi-infrastruktur/(:any/:any)'] = 'Data_infrastruktur/form/$1/$2';
$route['unggah-data-excel-kondisi-infrastruktur/(:any)'] = 'Data_infrastruktur/halaman_unggah_data_excel/$1';
$route['statistik-laporan'] = 'Grafik_untuk_website/grafik_untuk_website';
$route['laporan-kondisi-infrastruktur'] = 'Laporan';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
