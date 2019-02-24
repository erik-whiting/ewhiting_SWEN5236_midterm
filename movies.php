<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../frontend/css/style.css">
    <script type="text/javascript" src="../frontend/scripts/by-genre-page.js"></script>
    <script type="text/javascript" src="../frontend/scripts/cart.js"></script>

</head>
<body>
<nav id="nav" class="navbar navbar-inverse"></nav>
<div class="jumbotron">
    <div class="container text-center">
        <h1>Browse Popular Movies</h1>
    </div>

</div>
<div id="content">
    <script></script>
</div>
<script>
    window.onload = function() {
    setCart();
    getMovies();
    }
</script>
</body>
</html>

