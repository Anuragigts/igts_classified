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


/*----------------E-Zone Category--------------------*/

/*Phones & Tablets*/
$route['used-phones-tablets'] = "phones_tablets_view";

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
$route['home-appliances-for-sale'] = "home_applications_view";

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
$route['used-secondhand-small-appliances'] = "small_applicaances_view";

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
$route['secondhand-laptop-computers-for-sale'] = "laptop_computers_view";

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
$route['phones-ipods-camera-accessories-sale'] = "accessories_view";

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
$route['body-care-stuff-for-sale'] = "personal_care_view";

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
$route['home-entertainment-items-sale'] = "home_entertainment_view";

$route['lcd-led-television-sale'] = "he_lcd_led_televisionsview";
$route['home-theatre-systems-sale'] = "he_home_theatre_systemsview";
$route['dvd-blue-ray-players-sale'] = "he_dvd_blueray_playersview";
$route['audio-systems-for-sale'] = "he_audio_systemsview";
$route['secondhand-gaming-for-sale'] = "he_gamingview";
$route['used-musical-instruments-sale'] = "he_musical_instrumentsview";
$route['used-secondhand-projectors-sale'] = "he_projectorsview";

/*Photography*/
$route['used-digital-camera-for-sale'] = "photography_view";

$route['digital-slr-cameras-sale'] = "p_digital_slr_camerasview";
$route['point-shoot-cameras-sale'] = "p_point_shoot_camerasview";
$route['digital-camcorders-for-sale'] = "p_camcordersview";


/* --------------------Motor Point Category --------------------*/
$route['cars-for-sale-london'] = "cars_view";
$route['bikes-scooters-for-sale'] = "bikes_scoters_view";
$route['motorhomes-caravans-for-sale'] = "motorhomes_caravans_view";
$route['vans-trucks-suvs-for-sale'] = "vans_trunks_svu_view";
$route['coaches-buses-for-sale'] = "coaches_busses_view";
$route['plant-machinery-for-sale'] = "plantmachinery_view";
$route['agricultural-farming-vehicles-for-sale'] = "farmingvehicles_view";
$route['used-boats-for-sale'] = "boats_view";

/*--------------------Clothing Life Styles Category--------------------*/

/*Women's*/
$route['flats'] = "women_view";

$route['women-designer-clothing'] = "women_clothingview";
$route['women-footware-shoes'] = "women_shoesview";
$route['women-accessories-sale'] = "women_accessoriesview";
$route['women-wedding-party-accessories'] = "women_weddingview";

/*Men*/
$route['flats'] = "men_view";

$route['men-designer-clothing-london'] = "men_clothingview";
$route['men-footware-shoes'] = "men_shoesview";
$route['men-party-accessories'] = "men_accessoriesview";
$route['men-wedding-accessories'] = "men_weddingview";

/*Boys*/
$route['flats'] = "boys_view";

$route['boy-clothing-for-sale'] = "boy_clothingview";
$route['boy-shoes-footware'] = "boy_shoesview";
$route['boy-party-accessories'] = "boy_accessoriesview";

/*Girls*/
$route['flats'] = "girls_view";

$route['girls-stylish-designer-clothing'] = "girl_clothingview";
$route['girls-shoes-footware'] = "girl_shoesview";
$route['girls-designer-accessories'] = "girl_accessoriesview";

/*Baby Boys*/
$route['flats'] = "baby_boy_view";

$route['newborn-baby-boys-clothing'] = "babyboy_clothingview";
$route['baby-boy-accessories'] = "babyboy_accessoriesview";

/*Baby Girls*/	
$route['flats'] = "baby_girl_view";

$route['baby-girl-clothing'] = "babygirl_clothingview";
$route['baby-girl-accessories'] = "babygirl_accessoriesview";


/*--------------------find a property--------------------*/
$route['flats-villas-apartment-property-for-sale'] = "residential_prop";
$route['commercial-property-for-sale'] = "residential_com";

/*--------------------Home & Kitchen Category--------------------*/

/*Kitchen Essentials*/
$route['used-kitchen-essential-stuff-sale'] = "kitchen_essentials_view";

$route['second-hand-used-kitchen-tools'] = "k_ess_kitchen_toolsview";
$route['used-kitchen-storage'] = "k_ess_kitchen_storageview";
$route['second-hand-cookware-sale-london'] = "k_ess_cookwareview";
$route['bakeware-for-sale'] = "k_ess_bakewareview";
$route['used-cooktops-burners-sale'] = "k_ess_cooktops_burnersview";
$route['barbeque-furniture-for-sale-london'] = "k_ess_barbeque_furnitureview";
$route['table-linen-for-sale'] = "k_ess_table_linenview";
$route['others-kitchen-essential-tools-sale'] = "k_ess_otherview";

/*Home Essentials*/
$route['second-hand-home-furniture'] = "home_essentials_view";

$route['second-hand-bathroom-accessories-sale'] = "h_ess_bathroom_accessoriesview";
$route['used-bedroom-accessories-sale'] = "h_ess_bedroom_accessoriesview";
$route['carpets-flooring-for-sale'] = "h_ess_carpets_flooringview";
$route['cleaning-services-london'] = "h_ess_cleaning_servicesview";
$route['plumbing-electrician-services-london'] = "h_ess_plumb_elect_serviceview";
$route['windows-conservatories-for-sale'] = "h_ess_window_conservatoriesview";
$route['door-machinery-tools-sale'] = "h_ess_door_machinery_toolsview";
$route['garden-equipment'] = "h_ess_garden_equipmentview";
$route['furniture-garden-for-sale'] = "h_ess_furniture_gardenview";
$route['sheds-garden'] = "h_ess_sheds_gardenview";
$route['plants-garden'] = "h_ess_plant_gardenview";
$route['used-dining-room-furniture'] = "h_ess_dining_room_furview";
$route['living-room-furniture-sale'] = "h_ess_living_room_furview";
$route['kids-furniture-sale'] = "h_ess_furniture_kidsview";
$route['second-hand-outdoor-furniture-sale'] = "h_ess_outdoor_furview";
$route['study-office-room furniture-sale'] = "h_ess_study_off_room_furview";
$route['other-home-items-sale'] = "h_ess_otherview";

/*Decor*/
$route['wall-decor-sale'] = "decor_view";

$route['curtains-accessories-sale'] = "dec_curtains_acceview";
$route['candles-fragrances-sale'] = "dec_candles_fragrancesview";
$route['vases-flowers-sale-london'] = "dec_vases_flowersview";
$route['wall-decor-for-sale'] = "dec_wall_decorview";
$route['home-accent-sale'] = "dec_home_accentview";
$route['religion-spirituality-stuff-sale'] = "dec_religion_spiritualityview";
$route['photo-frames-albums-sale'] = "dec_photo_frames_albumview";
$route['rugs-carpets-sale-london-manchester'] = "dec_rugs_carpetview";
$route['cushions-throws-for-sale'] = "dec_cushion_throwview";
$route['table-lamps-ceiling-light-sale'] = "dec_table_lamp_ceiling_lightview";
$route['used-wall-outdoor-light'] = "dec_wall_outdoor_lightview";
$route['other-decor-accessories'] = "dec_othersview";



/*--------------------Pets Category--------------------*/
$route['dogs-puppies-for-sale'] = "dogs_view";
$route['cats-kitten-for-sale'] = "cats_view";
$route['fishes-for-sale'] = "fishes_view";
$route['birds-for-sale'] = "birds_view";
$route['pets-for-sale-london'] = "pets_for_sale_view";

/*Big Animals*/
$route['cobs-horses-for-sale'] = "cobs_view";
$route['donkeys-for-sale'] = "donkeys_view";
$route['horses-ponies-sale-uk'] = "horses_view";
$route['ponies-for-sale-uk'] = "ponies_view";
$route['online-beef-cattles-sale'] = "beef_cattle_view";
$route['dairy-cattles-sale-uk'] = "dairy_cattle_view";
$route['other-big-pets-sale'] = "other_big_pets_view";

/*Small Animals*/
$route['pigs-for-sale'] = "pigs_view";
$route['sheeps-lambs-sale'] = "sheeps_view";
$route['goats-for-sale'] = "goats_view";
$route['poultry-chickens-for-sale'] = "poultry_view";
$route['pet-reptiles-sale'] = "reptiles_view";
$route['furry-pets-for-sale'] = "furry_pets_view";
$route['other-small-pets-sale'] = "other_small_pets_view";

/*Pet Accessories*/
$route['pet-foods-sale'] = "pet_food_view";
$route['pets-toys-training'] = "pet_toys_training_view";
$route['clothing-accessories-sale'] = "pet_clothing_accessories_view";
$route['feeding-accessories-sale'] = "pet_feeding_accessories_view";
$route['beds-cages-crates-accessories-sale'] = "pet_beds_cages_crates_view";
$route['cleaning-odour-control-services'] = "pet_cleaning_odour_control_view";
$route['fish-tank-cabinet-for-sale'] = "pet_fish_tanks_cabinets_view";
$route['marine-aquarium-ponds-for-sale'] = "pet_marine_aquarium_ponds_view";
$route['aquarium-landscaping-for-sale'] = "pet_aquarium_landscaping_view";
$route['other-maintenance-stuff'] = "pet_other_maintenance_stuff_view";

/* --------------------Jobs Category-------------------- */
$route['accounting-finance-jobs-london'] = "j_accounting_financeview";
$route['retail-banking-jobs-vacancy-london'] = "j_bankingview";
$route['news-media-jobs-london'] = "j_news_mediaview";
$route['it-telecom-jobs-london-manchester'] = "j_it_telecomview";
$route['hr-and-training-jobs-london'] = "j_human_resource_trainingview";
$route['company-pa-secretarial-jobs-london'] = "j_pa_secretarialview";
$route['front-desk-office-help-desk-jobs'] = "j_front_office_help_deskview";
$route['electronics-electrical-civil-engineering-jobs'] = "j_electronics_electrical_ngineeringview";
$route['marketing-finance-hr-management-jobs'] = "j_management_jobsview";
$route['power-engineering-jobs-london-birmingham'] = "j_power_engineeringview";
$route['miscelleneous-jobs-vacancy-birmingham-london'] = "j_miscelleneousview";

$route['real-state-construction-jobs'] = "j_constructionview";
$route['real-state-building-services-jobs'] = "j_building_servicesview";
$route['retails-marketing-sales-jobs'] = "j_retailview";
$route['computer-hardware-networking-jobs'] = "j_hardware_networkingview";
$route['office-administrative-jobs'] = "j_office_administrative_jobsview";
$route['architecture-jobs-london-birmingham'] = "j_architectureview";
$route['electrician-plumbing-jobs-birmingham'] = "j_electrician_plumbing_toolsview";
$route['logistics-supply-chain-management-jobs'] = "j_logistics_supply_chain_managementview";
$route['telesales-marketing-telecalling-jobs-london'] = "j_telesalesview";
$route['fresher-experience-graduate-Jobs-london'] = "j_graduate_jobsview";

$route['income-tex-banking-financial-jobs-london'] = "j_financial_servicesview";
$route['sales-marketing-jobs-vacancies-birmingham'] = "j_sales_marketingview";
$route['purchasing-supply-logistic-jobs-london-wells'] = "j_purchasing_supplyview";
$route['healthcare-old-age-care-services-jobs-london'] = "j_healthcare_old_agecareview";
$route['part-full-time-driving-jobs-london'] = "j_drivingview";
$route['outdoor-indoor-catering-jobs-london'] = "j_catering_jobsview";
$route['chemical-engineering-jobs-london-birmingham'] = "j_chemical_enggview";
$route['mechanical-engineering-london-birmingham-wells'] = "j_mechanical_enggview";
$route['dentist-jobs-services-london'] = "j_dentistsview";
$route['petroleum-chemical-engineering-jobs-london'] = "j_petroleum_enggview";
$route['hospitality-and-staff-nursing-jobs'] = "j_nursing_jobsview";

/*--------------------Services Category--------------------*/

/*Professional */
$route['educational-coaching-training-services-london'] = "s_coachings_trainingview";
$route['business-office-services-london'] = "s_business_servicesview";
$route['party-wedding-services-london'] = "s_party_wedding_servicesview";
$route['it-digital marketing services'] = "s_it_digital_marketing_serviceview";
$route['solicitor-services-london-manchester'] = "s_solicitor_servicesview";
$route['accounting-taxation-services-london'] = "s_accounting_taxation_servicesview";
$route['home-construction-renovation-services-london'] = "s_home_construction_ren_servicesview";
$route['doctors-hospital-services-london'] = "s_doctor_hospital_servicesview";
$route['nurse-care-services'] = "s_nurse_carer_servicesview";
$route['astrology-numerology-services-london'] = "s_astrology_num_servicesview";
$route['home-car-property-loan-insurance'] = "s_loan_insuranceview";
$route['funeral-services'] = "s_funeral_servicesview";
$route['health-fitness-services-london'] = "s_health_fitnessview";

/*Popular*/
$route['dry-cleaning-laundry-services-london'] = "s_dry_clean_laund_servicesview";
$route['household-services-london'] = "s_household_servicesview";
$route['travel-vacation-services-london'] = "s_travel_vacation_servicesview";
$route['massage-beauty-services-london'] = "s_massage_bbeauty_servicesview";
$route['community-services-london'] = "s_community_servicesview";
$route['entertainment-services'] = "s_entertainment_servicesview";
$route['motor-services'] = "s_motor_servicesview";
$route['logistics-transport-services'] = "s_logistics_tran_servicesview";
$route['restaurant-food services'] = "s_restaurant_food_servicesview";
$route['friendship-dating-services'] = "s_friend_dating_servicesview";
$route['nannies-services-london-manchester'] = "s_nannies_servicesview";
$route['embroidery-services-london'] = "s_embroidery_servicesview";
$route['others-popular-services-london'] = "s_other_popular_servicesview";



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