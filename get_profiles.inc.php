<?php

  // include all the library related classes
  require 'vendor\autoload.php';

  // initiate a new instagram instance
  $instagram = new \InstagramScraper\Instagram();

  // get the query parameter passed using post method
  $fetch = $_POST['query'];

  // store all the accounts with the query name in profiles
  $profiles = $instagram->searchAccountsByUsername($fetch);

  // get every account's profile picture and echo it
  foreach($profiles as $profile){
    echo '<img style="display: none;" src="'. $profile->getProfilePicUrl() .'"/>';
  }