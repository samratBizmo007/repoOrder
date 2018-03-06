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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Landing_home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['auth/login/verify_email/(:any)'] = "auth/login/verify_email/$1";
$route['project/view_project/(:any)'] = 'project/view_project/index/$1';
$route['project/ViewProject_biddinglist/(:any)'] = 'project/ViewProject_biddinglist/index/$1';
$route['job/job_listings/(:any)'] = 'job/job_listings/showAppliedCandidate/$1';
$route['jobseeker/jobseeker_lists/(:any)'] = 'jobseeker/jobseeker_lists/showjobDetails/$1';
$route['job/Applied_candidate_lists/download(:any)'] = 'job/Applied_candidate_lists/download/$1';
$route['project/project_listing/download(:any)'] = 'project/project_listing/download/$1';
$route['profile/Share_profile/share_profile_data(:any)'] = 'profile/Share_profile/share_profile_data/$1';
//$route['login/(:any)'] = 'login/index/$1';
//$route['auth/login/(:any)'] = "auth/login/login_auth/$1";
