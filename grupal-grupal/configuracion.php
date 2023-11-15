<?php
  require_once 'vendor/autoload.php';

  $clientID = '858516737341-illgg8jd39qfl6td03niuiaa1a8e3m9s.apps.googleusercontent.com';
  $clientSecret = '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';
  $redirectUri = 'http://localhost/grupal/MenuPrincipal.php';
  //http://localhost/grupal/MenuPrincipal.php

  // create Client Request to access Google API
  $client = new Google_Client();
  $client->setClientId($clientID);
  $client->setClientSecret($clientSecret);
  $client->setRedirectUri($redirectUri);
  $client->addScope("email");
  $client->addScope("profile");
?>