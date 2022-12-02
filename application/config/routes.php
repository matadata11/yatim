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
|	https://codeigniter.com/userguide3/general/routing.html
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

// master Laporan
$route['master_laporan']                = 'admin/Master_laporan';
$route['export_pdf']                    = 'report/Data_siswa/pdf';
$route['export_excel']                  = 'report/Data_siswa/export_excel';

$route['verval_inputan']                = 'admin/Verval_inputan';
$route['cari-siswa']                	= 'admin/Verval_inputan/hasil';
$route['verifikasi']                	= 'admin/Master_siswa/verifikasi';

// master inputan siswa
$route['master_siswa']                  = 'admin/Master_siswa';
$route['add-inputan']                   = 'admin/Master_siswa/store';
$route['lock-inputan']                  = 'admin/Master_siswa/lock';
$route['locka-inputan']                 = 'admin/Master_siswa/locka';
$route['edit-inputan']                  = 'admin/Master_siswa/updated';
$route['import-inputan']                = 'admin/Master_siswa/import_excel';
$route['remove-inputan/(:num)']         = 'admin/Master_siswa/deleted';

$route['perbaharui']                    = 'admin/Perbaharui';
$route['edit-akun']                     = 'admin/Perbaharui/update';

// Route Master pengumuman
$route['pengumuman']            		= 'admin/pengumuman';
$route['add-pengumuman']              	= 'admin/pengumuman/created';
$route['edit-pengumuman']             	= 'admin/pengumuman/updated';
$route['hapus-pengumuman/(:num)']     	= 'admin/pengumuman/deleted';


// kab-kota
$route['kab']                 		    = 'admin/kab';
$route['add-kab']                       = 'admin/kab/store';
$route['edit-kab']                      = 'admin/kab/update';
$route['hapus-kab/(:num)']              = 'admin/kab/destroy';

// provinsi
$route['provinsi']                      = 'admin/Provinsi';
$route['add-provinsi']                  = 'admin/provinsi/store';
$route['edit-provinsi']                 = 'admin/provinsi/update';
$route['hapus-provinsi/(:num)']         = 'admin/provinsi/destroy';

// posko
$route['posko']                 		= 'admin/posko';
$route['add-posko']                   	= 'admin/posko/add';
$route['edit-posko']                  	= 'admin/posko/updated';
$route['hapus-posko/(:num)']          	= 'admin/posko/deleted';

$route['user']                  		= 'admin/user';
$route['add-user']                    	= 'admin/user/register';
$route['edit-user']                   	= 'admin/user/update';
$route['pages/import']                	= 'admin/user/import_excel';
$route['hapus-user/(:num)']           	= 'admin/user/deleted';

// route master instansi
$route['instansi']                      = 'admin/instansi';
$route['add-instansi']              	= 'admin/instansi/store';
$route['edit-instansi']             	= 'admin/instansi/update';
$route['hapus-instansi/(:num)']     	= 'admin/instansi/destroy';

// route Master pengaturan
$route['pengaturan']            		= 'admin/pengaturan';
$route['add-pengaturan']              	= 'admin/pengaturan/created';
$route['edit-pengaturan']             	= 'admin/pengaturan/updated';
$route['hapus-pengaturan/(:num)']     	= 'admin/pengaturan/deleted';


$route['checkdulu']            	        = 'auth/login/checklogin';
$route['checkgtk']            	        = 'auth/login/checkgtk';
$route['admin/keluaraja']            	= 'auth/login/logout';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
