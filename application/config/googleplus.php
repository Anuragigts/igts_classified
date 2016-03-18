<?php
$config['googleplus']['application_name'] = ''; #Use must have to use same application name which you register with google. Using APIs & Auth->Consent Screen
$config['googleplus']['client_id'] = '';
$config['googleplus']['client_secret'] = '';
$config['googleplus']['redirect_uri'] = ''; #Add redirect url which you add in google console.
$config['googleplus']['api_key'] = ''; #Add Browser Key
$config['googleplus']['scopes'] = Array('https://www.googleapis.com/auth/plus.me', 'https://www.googleapis.com/auth/plus.login','https://www.googleapis.com/auth/plus.moments.write');
$config['googleplus']['actions'] = Array('http://schemas.google.com/AddActivity');
?>