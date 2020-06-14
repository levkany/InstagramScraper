<?php
  // include all the library related classes
  require 'vendor\autoload.php';

  // initiate a new instagram instance
  $instagram = new \InstagramScraper\Instagram();


  if(!empty($_POST['username'])){
    $userToFetch = $_POST['username'];

    // fetch username profile
    $profile = $instagram->getAccount($userToFetch);

    // account is private, not much information can be scraped
    if($profile->isPrivate()){
      echo '<h3>Account is private <span style="color: darkslategray">- information is not available.</span></h3>';
    }

    // continue
    else{
      $profileID = $profile->getId();
      $profileMedias = $profile->getMedias();
      $mediaMaxDisplay = 10;

      $counter = 0;
      foreach($profileMedias as $media){
        if($counter < $mediaMaxDisplay){
          $counter++;
          echo '<div class="profileImage"><a href="'. $media->getImageHighResolutionUrl() .'"><img src="'. $media->getImageHighResolutionUrl() .'"/></a></div>';
        }

        // Exit loop if we reached max media display
        else{
          break;
        }
      }
    }
  }
