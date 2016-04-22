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


/*E-Zone Category*/

/*Phones & Tablets*/
$route['used-phones-for-sale-london'] = "pt_mobile_phonesview";
$route['tablets-ipods-for-sale'] = "pt_tablets_ipadsview";
$route['sell-bluetooth-devices'] = "pt_bluetoothdevicesview";
$route['used-landline-phones-sale'] = "pt_landline_phonesview";
$route['used-adaptors-connectors-sale'] = "pt_adaptors_connectorsview";
$route['dock-keypads-sale-uk'] = "pt_docks_keypadsview";
$route['mobile-cases-sleeves-sale'] = "pt_cases_sleevesview";
$route['mobile-tv-screen-guards-sale'] = "pt_screen_guardsview";
$route['used-power-banks-sale'] = "pt_powerbanksview";
$route['wearable-devices-sale'] = "pt_wearable_devicesview";

/*Home Appliances*/
$route['used-air-conditioners-sale'] = "ha_air_conditionersview";
$route['secondhand-air-coolers-sale'] = "ha_air_coolersview";
$route['used-ceiling-fans-sale'] = "ha_fansview";
$route['used-secondhand-refigerators-sale'] = "ha_refrigeratorsview";
$route['washing-machines-for-sale'] = "ha_washing_machinesview";
$route['secondhand-electric-iron-sale'] = "ha_electric_ironview";
$route['vacuum-cleaners-sale-london'] = "ha_vacuum_cleanersview";
$route['secondhand-water-heaters-sale'] = "ha_water_heatersview";
$route['room-heaters-sale-london'] = "ha_room_heatersview";
$route['automatic-sewing-machine-sale'] = "ha_sewing_machineview";
$route['secondhand-dryers-for-sale'] = "ha_dryersview";
$route['emergency-light-for-sale'] = "ha_emergency_lightview";

/*Small Appliances*/
$route['microwave-ovens-otg-sale'] = "sa_microwave_ovensview";
$route['food-processors-sale-london'] = "sa_food_processorsview";
$route['used-grinder-juicers-sale'] = "sa_mixer_grinder_juicersview";
$route['cookers-steamers-for-sale'] = "sa_cookers_steamersview";
$route['used-toasters-sandwich-makers'] = "sa_toasters_sandwich_makersview";
$route['blenders-choppers-sale-london'] = "sa_blenders_choppersview";
$route['grills-tandooris-sale-london'] = "sa_grills_tandoorisview";
$route['coffee-makers-kettles-sale'] = "sa_coffee_tea_makers_kettles_view";
$route['fryers-snack-makers-sale'] = "sa_fryers_snack_makersview";
$route['used-water-purifiers-sale'] = "sa_water_purifiersview";
$route['used-dishwashers-for-sale'] = "sa_dishwashersview";
$route['secondhand-flour-mill-sale'] = "sa_flour_millview";

/*Laptop & Computers*/
$route['used-secondhand-laptop-sale'] = "lc_laptopsview";
$route['all-in-one-accesseories-sale'] = "lc_all_in_oneview";
$route['used-secondhand-printers-sale'] = "lc_printersview";
$route['secondhand-wi-fi-devices-sale'] = "lc_wifi_devicesview";
$route['external-hard-drive-sale'] = "lc_external_hard_drivesview";
$route['pen-drives-sale-london'] = "lc_pen_drivesview";
$route['keyboards-sale-london'] = "lc_keyboardsview";
$route['mouse-sale-london-wells'] = "lc_mouseview";
$route['headsets-sale-london-peterborough'] = "lc_headsetsview";
$route['cable-connectors-for-sale'] = "lc_cables_connectorsview";
$route['ink-toner-sale-london'] = "lc_ink_tonerview";
$route['softwares-sale-london-canterbury'] = "lc_softwaresview";

/*Accessories*/
$route['tablet-ipad-accessories-sale'] = "a_tablet_ipad_accessoriesview";
$route['iphone-accessories-for-sale'] = "a_iphone_accessoriesview";
$route['mobile-accessories-for-sale'] = "a_mobile_accessoriesview";
$route['computer-accessories-for-sale'] = "a_computer_accessoriesview";
$route['headphones-earphones-for-sale'] = "a_headphones_earphonesview";
$route['audio-video-accessories-sale'] = "a_audio_video_accessoriesview";
$route['camera-accessories-for-sale'] = "a_camera_accessoriesview";
$route['inverters-stablizers-power-sale'] = "a_inverters_stablizers_powerview";
$route['used-secondhand-battery-sale'] = "a_batteryview";

/*Personal Care*/
$route['online-shavers-sale'] = "pc_shaversview";
$route['sell-used-trimmers-sale'] = "pc_trimmersview";
$route['body-groomers-for-sale'] = "pc_body_groomersview";
$route['hair-dryers-for-sale'] = "pc_hair_dryersview";
$route['hair-stylers-for-sale'] = "pc_hair_stylersview";
$route['epilators-for-sale'] = "pc_epilatorsview";
$route['used-pedometers-for-sale'] = "pc_pedometers";
$route['monitors-for-sale'] = "pc_monitorsview";
$route['secondhand-massagers-for-sale'] = "pc_massagersview";

/*Home Entertainment*/
$route['lcd-led-television-sale'] = "he_lcd_led_televisionsview";
$route['home-theatre-systems-sale'] = "he_home_theatre_systemsview";
$route['dvd-blue-ray-players-sale'] = "he_dvd_blueray_playersview";
$route['audio-systems-for-sale'] = "he_audio_systemsview";
$route['secondhand-gaming-for-sale'] = "he_gamingview";
$route['used-musical-instruments-sale'] = "he_musical_instrumentsview";
$route['used-secondhand-projectors-sale'] = "he_projectorsview";

/*Photography*/
$route['digital-slr-cameras-sale'] = "p_digital_slr_camerasview";
$route['point-shoot-cameras-sale'] = "p_point_shoot_camerasview";
$route['digital-camcorders-for-sale'] = "p_camcordersview";


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

/*Big Animals*/
$route['cobs-horses-for-sale'] = "cobs_view";
$route['donkeys-for-sale'] = "donkeys_view";
$route['horses-ponies-sale-uk'] = "horses_view";
$route['ponies-for-sale-uk'] = "ponies_view";
$route['online-beef-cattles-sale'] = "beef_cattle_view";
$route['dairy-cattles-sale-uk'] = "dairy_cattle_view";

/*Small Animals*/
$route['pigs-for-sale'] = "pigs_view";
$route['sheeps-lambs-sale'] = "sheeps_view";
$route['goats-for-sale'] = "goats_view";
$route['poultry-chickens-for-sale'] = "poultry_view";
$route['pet-reptiles-sale'] = "reptiles_view";
$route['furry-pets-for-sale'] = "furry_pets_view";
$route['othes-small-pets-sale'] = "other_small_pets_view";

/*Pet Accessories*/
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