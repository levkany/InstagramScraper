<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Instagram Scraper Integration</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <!-- Magnific Popup -->
    <script src="magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <link rel="stylesheet" href="magnific-popup/dist/magnific-popup.css"/>

    <!-- Main js -->
    <script src='main.js'></script>
    <link rel="stylesheet" href="style.css">

  </head>
  <body>
    <main>
      <section id='search'><hr/>
        <div class="content-wrapper">
          <label for="query">Instagram Query 1.0</label>
          <input type="text" id='query' placeholder="Search for username">
        </div>
      </section>

      <h2>Profiles <span id="closeProfile"><a href="#">Go back</a></span></h2>
      <section id='profiles'></section>

      <section id='activeProfile' style="display: none;">
      </section>
    </main>
  </body>
</html>
