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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

/* Categories Names */
$route['default_controller'] = "classified";
$route['hot-deals'] = "deal_page";
$route['e-zone'] = "ezone_view";
$route['motor-point'] = "motor_view";
$route['clothing-lifestyles'] = "clothing_lifestyles_view";
$route['services'] = "services_view";
$route['find-a-property'] = "residential_view";
$route['home-kitchen'] = "home_kitchen_view";
$route['pet-deals'] = "pets_view";
$route['free-job-ads'] = "job_view";
$route['post-a-deal'] = "postad";
$route['home-page'] = "classified";

/* Motor Point Category */
$route['car-services'] = "cars_view";
$route['bikes-scooters-services'] = "bikes_scoters_view";
$route['motorhomes-caravans'] = "motorhomes_caravans_view";
$route['vans-trucks-suvs'] = "vans_trunks_svu_view";
$route['coaches-buses'] = "coaches_busses_view";
$route['plant-machinery'] = "plantmachinery_view";
$route['farming-vehicles'] = "farmingvehicles_view";
$route['boats-services'] = "boats_view";


/* Inner Pages Links */
$route['deals-status'] = "deals_status";
$route['deals-administrator'] = "deals_administrator";
$route['deals-administrator-box'] = "deals_administrator_box";
$route['how-it-works'] = "how_it_works";
$route['pickup-deals'] = "pickup_deals";
$route['my-wishes'] = "reserved_searches";
$route['update-profile'] = "update_profile";
$route['terms-conditions'] = "terms_conditions";
$route['contact-us'] = "contact_us";
$route['about-us'] = "about_us";
$route['privacy-policy'] = "privacy_policy";
$route['cookies-policy'] = "cookies_policy";
$route['forgot-password'] = "forgot_password";
$route['safety-tips'] = "assistance";


$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */