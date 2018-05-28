<?php require_once __DIR__ . "/../../vendor/autoload.php"; ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/images/favicon.ico">
    
    <title>PUBLICAR</title>

    <!-- Bootstrap core CSS -->
    <?php require "../linkscss.php"; ?>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="/css/footer.css">
    <!-- <link href="custom.css" rel="stylesheet"> -->
  </head>

  <body>

    <?php require "../Menu.php"; ?>

    <main role="main" class="container mb-3">
      <?php require "body.php"; ?>
    </main>

    <?php require "../footer.php"; ?>

    <!-- Optional JavaScript -->
    <script type="text/javascript" src="/js/Api/Cita/Crear.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php require "../Archivosjs.php"; ?>    
  </body>
</html>
