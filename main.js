$(document).ready(function() {

  function getProfiles() {
    $.ajax({
      url: 'get_profiles.inc.php',
      type: 'post',
      data: {
        query: $('#query').val()
      },
      success: function(res) {

        $('#profiles').html(res);

        $('img').on('load', function() {
          $(this).fadeIn();
        });
      }
    });
  }


  $('#closeProfile').on('click', function() {
    $('#closeProfile').fadeOut();
    $('#activeProfile').fadeOut().html('');
    $('#profiles').fadeIn();
  });


  // check whether the previous value equals to the current value after x seconds
  function compareAndFetch() {
    var previousValue = $('#query').val();

    setTimeout(() => {
      var currentValue = $('#query').val();

      if (currentValue == previousValue && currentValue != '') {
        // Same input, expected fetch from scraper
        getProfiles();
      }
    }, 250);
  }

  $('#query').on('keyup', function() {
    compareAndFetch();
  });


  // when we click any profile image, it will send a request to fetch more detailed information about the user.
  $('#profiles').on('click', '.profile a', function() {
    $(this).parent().parent().fadeOut();
    $(this).parent().parent().parent().find('#activeProfile').fadeIn();

    // request more user details using ajax
    $.ajax({
      url: 'get_profile.inc.php',
      type: 'post',
      data: {
        username: $(this).attr('data-user')
      },

      success: function(res) {
        $('#activeProfile').html(res);
        $('#closeProfile').fadeIn();

        // Init the magnific popup for the dynamic images
        $('#activeProfile').magnificPopup({
          delegate: 'a', // child items selector, by clicking on it popup will open
          type: 'image',
          gallery: { enabled: true },
          mainClass: 'mfp-fade'
        });
      }
    });
  });
});
