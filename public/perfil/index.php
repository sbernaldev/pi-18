<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/images/favicon.ico">

    <title>QUOOTER</title>

    <!-- Bootstrap core CSS -->
    <?php require "../linkscss.php"; ?>
    <!-- Custom styles for this template -->
      <link rel="stylesheet" href="css/jquery.dataTables.min.css">
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/jquery.dataTables.min.js"></script>
      <script>
          $(document).ready(function() {
              $('#example').DataTable( {
                  "order": [[ 3, "desc" ]]
              } );
          } );
      </script>
  </head>
  <body>
    <?php require "../Menu.php"; ?>

    <main role="main" class="container">
      <?php require "./body.php"; ?>
    </main>

        <!-- Optional JavaScript -->

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <?php require "../Archivosjs.php"; ?>
  </body>
</html>
