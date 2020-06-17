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
      $mediaMaxDisplay = 20;
      $printResult = '';
      $totalAVG = 0;
      $counter = 0;

      foreach($profileMedias as $media){
        if($counter < $mediaMaxDisplay){
          $counter++;
          $likesCount = $media->getLikesCount();
          $commentsCount = $media->getCommentsCount();
          $totalAVG += $likesCount + $commentsCount;
          $printResult .=  '<div class="profileMedia">
                <a href="'. $media->getImageHighResolutionUrl() .'">
                  <div class="overlay">
                    <div class="content">
                      <p><i class="fas fa-thumbs-up"></i>'. $likesCount .'</p>
                      <p><i class="fas fa-comments"></i>'. $commentsCount .'</p>
                      <p><i class="fas fa-fw fa-chart-area"></i>'. round(((($likesCount + $commentsCount) / $profile->getFollowedByCount()) * 100)) .'%</p>
                    </div>
                  </div>
                  <img src="'. $media->getImageHighResolutionUrl() .'"/>
                </a>
                </div>';
        }

        // Exit loop if we reached max media display
        else{
          break;
        }
      }

      $totalAVG = ($totalAVG / $counter / $profile->getFollowedByCount()) * 100;
      $totalAVG = round($totalAVG);
      echo '<div id="profileInfo" class="flex-item">
              <h2>Profile information</h2>
              <div class="main">
                <img src="'. $profile->getProfilePicUrl() .'"/>
                <div class="right">
                  <div class="title" title="the full name of the user">
                    <h4>
                      <b>Fullname</b>
                      '. $profile->getFullName() .'
                    </h4>
                  </div>
                  <div class="bio" title="Bio: '.$profile->getBiography().'">
                    <p>
                      <b>Biography</b> '. $profile->getBiography() .'...
                    </p>
                  </div>
                </div>
              </div>
              <div class="content">
                <div class="followers" title="number of followers of the user">
                  <i class="fas fa-fw fa-user-friends"></i>
                  <p><b>Followers</b> '. $profile->getFollowedByCount() .'</p></div>

                <div class="medias" title="number of photos and videos of the user">
                  <i class="fas fa-fw fa-images"></i>
                  <p><b>Medias</b> '. $profile->getMediaCount() .'</p></div>

                <div class="engagement" title="the percentage of the user\'s followers activity">
                  <i class="fas fa-fw fa-chart-area"></i>
                  <p><b>Engagement</b> '. $totalAVG .'%</p></div>
              </div>
            </div>
          <div id="profileStats" class="flex-item">
            <h5>Stats placeholder</h5>
          </div>
          <div id="profileGallery" class="flex-item">', $printResult, '</div>';
    }
  }
