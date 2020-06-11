$(document).ready(function() {

  function getProfiles() {
    isRunning = true;

    $.ajax({
      url: 'get_profiles.inc.php',
      type: 'post',
      data: {
        query: $('#query').val()
      },
      success: function(res) {
        $('#profiles').html(res);
        $('#profiles img').fadeIn(500);
      }
    });
  }

  $('#query').on('keyup', function() {
    getProfiles();
  });
});
