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
      $printResult = '';
      $totalAVG = 0;
      $counter = 0;

      foreach($profileMedias as $media){
        if($counter < $mediaMaxDisplay){
          $counter++;
          $likesCount = $media->getLikesCount();
          $commentsCount = $media->getCommentsCount();
          $totalAVG += $likesCount + $commentsCount;
          $printResult .=  '<div class="profile">
                <a href="'. $media->getImageHighResolutionUrl() .'"><img src="'. $media->getImageHighResolutionUrl() .'"/></a>
                <p>Title '. $media->getCaption() .'</p>
                <p>Likes '. $likesCount .'</p>
                <p>Comments '. $commentsCount .'</p>
                <p>Engagement - '. round(((($likesCount + $commentsCount) / $profile->getFollowedByCount()) * 100)) .'%</p>
                </div>';
        }

        // Exit loop if we reached max media display
        else{
          break;
        }
      }

      $totalAVG = ($totalAVG / $counter / $profile->getFollowedByCount()) * 100;
      $totalAVG = round($totalAVG);
      echo '<div class="profile">
              <div class="main">
                <img src="'. $profile->getProfilePicUrl() .'"/>
                <div class="title"> <h4>'. $profile->getFullName() .'</h4> </div>
              </div>
              <div class="content">
                <div class="bio">Biography '. $profile->getBiography() .'</div>
                <div class="followers">Followers '. $profile->getFollowedByCount() .'</div>
                <div class="facebook">Facebook link '. $profile->getConnectedFbPage() .'</div>
                <div class="medias">Medias '. $profile->getMediaCount() .'</div>
                <div class="engagement">Engagement '. $totalAVG .'%</div>
              </div>
            </div>', $printResult;
    }
  }
