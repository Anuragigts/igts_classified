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
$route['hot-deals-post-classifieds-ads'] = "deal_page";
$route['e-zone-phones-tablets-sale'] = "ezone_view";
$route['motor-point-used-cars-sale'] = "motor_view";
$route['clothes-for-sale-uk'] = "clothing_lifestyles_view";
$route['household-services-london-uk'] = "services_view";
$route['residential-commercial-property-for-sale'] = "residential_view";
$route['home-kitchen-services-uk'] = "home_kitchen_view";
$route['pet-for-sale-online'] = "pets_view";
$route['part-full-time-jobs-london'] = "job_view";
$route['post-a-deal'] = "postad";
$route['home-page'] = "classified";

/* Motor Point Category */
$route['cars-for-sale-london'] = "cars_view";
$route['bikes-scooters-for-sale'] = "bikes_scoters_view";
$route['motorhomes-caravans-for-sale'] = "motorhomes_caravans_view";
$route['vans-trucks-suvs-for-sale'] = "vans_trunks_svu_view";
$route['coaches-buses-for-sale'] = "coaches_busses_view";
$route['plant-machinery-for-sale'] = "plantmachinery_view";
$route['agricultural-farming-vehicles-for-sale'] = "farmingvehicles_view";
$route['used-boats-for-sale'] = "boats_view";

/*find a property*/
$route['flats-villas-apartment-property-for-sale'] = "residential_prop";
$route['commercial-property-for-sale'] = "residential_com";

/*Pets Category*/
$route['dogs-puppies-for-sale'] = "dogs_view";
$route['cats-kitten-for-sale'] = "cats_view";
$route['fishes-for-sale'] = "fishes_view";
$route['birds-for-sale'] = "birds_view";
$route['commercial'] = "pets_for_sale_view";

$route['cobs-horses-for-sale'] = "cobs_view";
$route['donkeys-for-sale'] = "donkeys_view";
$route['horses-ponies-sale-uk'] = "horses_view";
$route['ponies-for-sale-uk'] = "ponies_view";
$route['online-beef-cattles-sale'] = "beef_cattle_view";
$route['dairy-cattles-sale-uk'] = "dairy_cattle_view";

$route['pigs-for-sale'] = "pigs_view";
$route['sheeps-lambs-sale'] = "sheeps_view";
$route['goats-for-sale'] = "goats_view";
$route['poultry-chickens-for-sale'] = "poultry_view";
$route['pet-reptiles-sale'] = "reptiles_view";
$route['furry-pets-for-sale'] = "furry_pets_view";
$route['othes-small-pets-sale'] = "other_small_pets_view";

$route['pet-foods-sale'] = "pet_food_view";
$route['pets-toys -training'] = "pet_toys_training_view";
$route['clothing-accessories-sale'] = "pet_clothing_accessories_view";
$route['feeding-accessories-sale'] = "pet_feeding_accessories_view";
$route['beds-cages-crates-accessories-sale'] = "pet_beds_cages_crates_view";
$route['cleaning-odour -control-services'] = "pet_cleaning_odour_control_view";
$route['fish-tank-cabinet-for-sale'] = "pet_fish_tanks_cabinets_view";
$route['marine-aquarium-ponds-for-sale'] = "pet_marine_aquarium_ponds_view";
$route['aquarium-landscaping-for-sale'] = "pet_aquarium_landscaping_view";
$route['other-maintenance-stuff'] = "pet_other_maintenance_stuff_view";


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