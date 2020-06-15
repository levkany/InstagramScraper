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

      echo '<div class="box">
              <div class="title"> <h4>'. $profile->getFullName() .'</h4> </div>
              <div class="content">
                <div class="bio">Biography '. $profile->getBiography() .'</div>
                <div class="followers">Followers '. $profile->getFollowedByCount() .'</div>
                <div class="facebook">Facebook link '. $profile->getConnectedFbPage() .'</div>
                <div class="medias">Medias '. $profile->getMediaCount() .'</div>
              </div>
            </div>
            ';

      $counter = 0;
      foreach($profileMedias as $media){
        if($counter < $mediaMaxDisplay){
          $counter++;
          echo  '<div class="media">
                <a href="'. $media->getImageHighResolutionUrl() .'"><img src="'. $media->getImageHighResolutionUrl() .'"/></a>
                <p>Title '. $media->getCaption() .'</p>
                <p>Likes '. $media->getLikesCount() .'</p>
                <p>Comments '. $media->getCommentsCount() .'</p>
                <p>Subs AVG - '. (($media->getCommentsCount() + $media->getLikesCount()) / $profile->getFollowedByCount()) .'</p>
                </div>';
        }

        // Exit loop if we reached max media display
        else{
          break;
        }
      }
    }
  }
