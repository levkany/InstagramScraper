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

    <style media="screen">
      main{
        max-width: 50vw;
        margin: auto;
        text-align: center;
        padding: 16px;
      }

      label[for='query'], h2{
        display: block;
        color: #003300;
        padding: 16px;
        font-family: sans-serif;
        font-size: 2em;
      }

      h2 {
        padding-top: 16px;
      }

      hr{
        border: 1px solid lightgray;
        border-radius: 50%;
        margin-top: -32px;
      }

      #profiles, #activeProfile{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 30px;
      }

      section header{
        width: 100%;
      }

      input{
        border: none;
        font-family: sans-serif;
        font-size: 1.5em;
        border: 1px solid gray;
        padding: 6px;
        text-align: center;
        border-radius: 6px;
        background: #fffff7;
      }

      img{
        max-height: 120px;
        flex-basis: 10%;
        margin: 2px;
        border: 1px solid black;
      }

      #closeProfile{
        display: none;
      }
    </style>
  </head>
  <body>
    <main>
      <section id='search'>
        <label for="query">Search</label>
        <input type="text" id='query' placeholder="Search for username">
      </section>

      <h2>Profiles <span id="closeProfile"><a href="#">Go back</a></span></h2><hr/>
      <section id='profiles'></section>

      <section id='activeProfile' style="display: none;">
      </section>
    </main>
  </body>
</html>
