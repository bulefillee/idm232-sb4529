<?php
  consoleMsg("env.php file LOADED!");

  $domain = $_SERVER['HTTP_HOST'];
  consoleMsg("Domain is: $domain");

  if ($domain == 'localhost:8888') {


  // Specific to the current environment you're on.
  $APP_CONFIG = [
    'environment' => 'local',
    'site_url' => 'http://localhost:8888/',
    'database_host' => 'localhost',
    'database_user' => 'root',
    'database_pass' => 'root',
    'database_name' => 'idm232',
  ];
}
  else {
    $APP_CONFIG = [
      'environment' => 'live',
      'site_url' => ' https://www.creativesbdesign.com/',
      'database_host' => 'mysql.creativesbdesign.com',
      'database_user' => 'suecookbook',
      'database_pass' => 'foQjuc-1wizje-daqkux',
      'database_name' => 'sb4529_idm232',
    ];

  }
  

?>