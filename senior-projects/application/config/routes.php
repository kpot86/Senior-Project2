<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|   example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|   http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|   $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|   $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['(?i)(about)'] = 'staticpagescontroller/about';
$route['(?i)(change-password)'] = 'usercontroller/display_change_password';
$route['(?i)(mobile-search)'] = 'searchcontroller/display_mobile_search';

$route['(?i)(notifications)'] = 'notificationscontroller/display_notifications';

$route['(?i)(search)'] = 'searchcontroller/search/';
$route['(?i)(search)/(:any)'] = 'searchcontroller/search/$2';

$route['(?i)(me)'] = 'usercontroller/current_user';
$route['(?i)(user)'] = 'usercontroller/current_user';
$route['(?i)(user)/linkedIn_initiate'] = 'usercontroller/linkedIn_initiate';
$route['(?i)(user)/linkedIn_callback'] = 'usercontroller/linkedIn_callback';
$route['(?i)(user)/linkedIn_sync'] = 'usercontroller/linkedIn_sync';
$route['(?i)(user)/linkedIn_cancel'] = 'usercontroller/linkedIn_cancel';
$route['(?i)(user)/update'] = 'usercontroller/update';
$route['(?i)(user)/(:any)'] = 'usercontroller/profile/$2';



$route['(?i)(past-projects)'] = 'projectcontroller/past_projects';
$route['(?i)(project)/(create)'] = 'projectcontroller/create_new_project';

//$route['(?i)(project)/(approval)/(:num)'] = 'projectcontroller/sent_for_approval/$3';

$route['(?i)(project)'] = 'projectcontroller/current_project';
$route['(?i)(project)/(:any)'] = 'projectcontroller/details/$2';
$route['(?i)(invite)/(:any)'] = 'projectcontroller/display_list_of_projects_to_invite_user/$2';


$route['(?i)(logout)'] = 'homecontroller/logout';

$route['(?i)(login)'] = 'logincontroller/index';
$route['(?i)(login)/(:any)'] = 'logincontroller/$2';

$route['(?i)(guest)'] = 'guestcontroller/index';
$route['(?i)(guest)/(:any)'] = 'guestcontroller/$2';

$route['(?i)(admin)'] = 'admincontroller/index';
//need a new route for the admin dashboard
$route['(?i)(admin)/(:any)'] = 'admincontroller/$2';

$route['(?i)(register)'] = 'registercontroller/index';
$route['(?i)(register)/(:any)'] = 'registercontroller/$2';

$route['(?i)(home)'] = 'homecontroller/index';
$route['(?i)(home)/(:any)'] = 'homecontroller/$2';

//this is the default controller
$route['default_controller'] = "homecontroller";
$route['404_override'] = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */