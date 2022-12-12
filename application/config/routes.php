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
$route['default_controller'] = 'homectrl';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* front */
$route['home'] = 'homectrl/index';
$route['advertise'] = 'homectrl/advertise';
$route['contact'] = 'homectrl/contact';
$route['post/(:any)'] = 'homectrl/post/$1';
$route['category/(:any)'] = 'homectrl/category/$1';
$route['tag/(:any)'] = 'homectrl/tag/$1';
$route['search'] = 'homectrl/search';

/* admin */
$route['admin'] = 'adminctrl/index';
$route['admin/contact'] = 'adminctrl/contact';
$route['admin/newsletter'] = 'adminctrl/newsletter';
$route['login'] = 'loginctrl/login';
$route['logout'] = 'loginctrl/logout';

/* user */
$route['admin/user'] = 'userctrl/index';
$route['admin/user/create'] = 'userctrl/create';
$route['admin/user/edit/(:any)'] = 'userctrl/edit/$1';
$route['admin/user/delete/(:any)'] = 'userctrl/delete/$1';

/* category */
$route['admin/category'] = 'catctrl/index';
$route['admin/category/create'] = 'catctrl/create';
$route['admin/category/edit/(:any)'] = 'catctrl/edit/$1';
$route['admin/category/delete/(:any)'] = 'catctrl/delete/$1';

/* tag */
$route['admin/tag'] = 'tagctrl/index';
$route['admin/tag/create'] = 'tagctrl/create';
$route['admin/tag/edit/(:any)'] = 'tagctrl/edit/$1';
$route['admin/tag/delete/(:any)'] = 'tagctrl/delete/$1';

/* media */
$route['admin/media'] = 'mediactrl/index';
$route['admin/media/create'] = 'mediactrl/create';
$route['admin/media/edit/(:any)'] = 'mediactrl/edit/$1';
$route['admin/media/delete/(:any)/(:any)'] = 'mediactrl/delete/$1/$2';

/* post */
$route['admin/post'] = 'postctrl/index';
$route['admin/post/create'] = 'postctrl/create';
$route['admin/post/edit/(:any)'] = 'postctrl/edit/$1';
$route['admin/post/delete/(:any)'] = 'postctrl/delete/$1';

/* advertisement */
$route['admin/ad'] = 'adctrl/index';
$route['admin/ad/edit/(:any)'] = 'adctrl/edit/$1';
$route['admin/ad/delete/(:any)/(:any)'] = 'adctrl/delete/$1/$2';

