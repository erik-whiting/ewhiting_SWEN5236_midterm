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
        <p>Click "Add to Cart" to add a movie to your cart</p>
        <p>Click on "Your Cart" to see your receipt</p>
        <p>Click on "Erik's SWEN 5236 Midterm" to return to the home page</p>
    </div>

</div>
<div id="content">
</div>
<script>
    window.onload = function() {
        getMovies();
        setCart();
    }
</script>
</body>
</html>

