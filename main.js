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

  // check whether the previous value equals to the current value after x seconds
  function compareAndFetch() {
    var previousValue = $('#query').val();

    setTimeout(() => {
      var currentValue = $('#query').val();

      if (currentValue == previousValue && currentValue != '') {
        // Same input, expected fetch from scraper
        getProfiles();
      }
    }, 1000);
  }

  $('#query').on('keyup', function() {
    compareAndFetch();
  });
});
