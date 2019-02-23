<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="frontend/css/style.css">
    <script src="frontend/scripts/genre-page.js"></script>

</head>
<body>

<div class="jumbotron">
    <div class="container text-center">
        <h1>Browse Popular Genres</h1>
    </div>
</div>

<?php
    include_once './Classes/Genre/read.php';
    $genres[] = getGenres();
    print_r($genres);
?>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <a id="Action-link">
            <div class="panel panel-primary">
                <div id="Action" class="panel-heading"></div>
                <div class="panel-body"><img id="Action-img" src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer"></div>
            </div>
            </a>
        </div>
        <div class="col-sm-4">
            <a id="Animation-link">
            <div class="panel panel-primary">
                <div id="Animation" class="panel-heading"></div>
                <div class="panel-body"><img id="Animation-img" src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer"></div>
            </div>
            </a>
        </div>
        <div class="col-sm-4">
            <a id="Comedy-link">
            <div class="panel panel-primary">
                <div id="Comedy" class="panel-heading"></div>
                <div class="panel-body"><img id="Comedy-img" src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer"></div>
            </div>
            </a>
        </div>
    </div>
</div><br>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <a id="Drama-link">
            <div class="panel panel-primary">
                <div id="Drama" class="panel-heading"></div>
                <div class="panel-body"><img id="Drama-img" src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer"></div>
            </div>
            </a>
        </div>
        <div class="col-sm-4">
            <a id="Horror-link">
            <div class="panel panel-primary">
                <div id="Horror" class="panel-heading"></div>
                <div class="panel-body"><img id="Horror-img" src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer"></div>
            </div>
            </a>
        </div>
        <div class="col-sm-4">
            <a id="Mystery-link">
            <div class="panel panel-primary">
                <div id="Mystery" class="panel-heading"></div>
                <div class="panel-body"><img id="Mystery-img" src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer"></div>
            </div>
            </a>
        </div>
    </div>
</div><br><br>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <a id="Romance-link">
            <div class="panel panel-primary">
                <div id="Romance" class="panel-heading"></div>
                <div class="panel-body"><img id="Romance-img" src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer"></div>
            </div>
            </a>
        </div>
        <div class="col-sm-4">
            <a id="Sci-Fi-link">
            <div class="panel panel-primary">
                <div id="Sci-Fi" class="panel-heading"></div>
                <div class="panel-body"><img id="Sci-Fi-img" src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer"></div>
            </div>
            </a>
        </div>
        <div class="col-sm-4">
            <a id="Superhero-link">
            <div class="panel panel-primary">
                <div id="Superhero" class="panel-heading"></div>
                <div class="panel-body"><img id="Superhero-img" src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer"></div>
            </div>
            </a>
        </div>
    </div>
</div><br><br>

</body>
</html>