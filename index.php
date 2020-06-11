<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Instagram Scraper Integration</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src='main.js'></script>

    <style media="screen">
      main{
        max-width: 50vw;
        margin: auto;
        text-align: center;
        padding: 16px;
      }

      label[for='query']{
        display: block;
        color: #003300;
        padding: 16px;
        font-family: sans-serif;
        font-size: 2em;
      }

      #profiles{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
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
        border-radius: 5%;
      }
    </style>
  </head>
  <body>
    <main>
      <section id='search'>
        <label for="query">Search</label>
        <input type="text" id='query' placeholder="Search for username">
      </section>

      <section id='profiles'>

      </section>

      <section id='activeProfile'>

      </section>
    </main>
  </body>
</html>
