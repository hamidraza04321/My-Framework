<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title><?= explode('Stack trace:', $message)[0] ?></title>
    <style>
      @import url("https://fonts.googleapis.com/css?family=Fira+Code&display=swap");
      * {
        margin: 0;
        padding: 0;
        font-family: "Fira Code", monospace;
      }

      body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #ecf0f1;
      }

      .container {
        text-align: center;
        margin: auto;
        padding: 4em;
      }
      .container img {
        width: 256px;
        height: 225px;
      }
      .container h1 {
        margin-top: 1rem;
        font-size: 35px;
        text-align: center;
      }
      .container h1 span {
        font-size: 60px;
      }
      .container p {
        margin-top: 1rem;
      }
      .container p.info {
        margin-top: 4em;
        font-size: 12px;
      }
      .container p.info a {
        text-decoration: none;
        color: #5454ce;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <img src="https://i.imgur.com/qIufhof.png"/>
      <h1>
      <span>500</span><br/>
      Internal server error </h1>
      <p>
        <?= explode('Stack trace:', $message)[0] ?>
      </p>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>