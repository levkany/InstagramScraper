<?php

  // include all the library related classes
  require 'vendor\autoload.php';

  // initiate a new instagram instance
  $instagram = new \InstagramScraper\Instagram();

  // get the query parameter passed using post method
  $fetch = $_POST['query'];

  // store all the accounts with the query name in profiles
  $profiles = $instagram->searchAccountsByUsername($fetch);

  // store all the profiles
  $result = '';

  // get every account's profile picture and echo it
  foreach($profiles as $profile){
    $result .= '<div class="profile">
                  <a href="#" title="'. $profile->getFullName() .'" data-user="'. $profile->getUsername() .'">
                    <div class="content">
                      <div class="overlay"></div>
                      <img style="display: none;" src="'. $profile->getProfilePicUrl() .'"/>
                    </div>
                    <h4>'. $profile->getUsername() .'</h4>
                  </a>
                </div>';
  }

  // echo all the profiles as a response
  echo $result;
