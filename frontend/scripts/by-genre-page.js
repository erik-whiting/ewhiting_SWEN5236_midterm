movies = Array();
url = 'http://ewhiting.eastus.cloudapp.azure.com/midterm/Classes/Genre/movie_by_genre.php/?genre=';

function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}

var genre_id = getUrlVars()["genre"];
url += 1;

$.get(url, function(data, status) {
    var records = data.movies;
    records.forEach(function (record, i) {
        var movie = new Movie(record);
        movies.push(movie);
    })
});

class Movie {
    constructor(build_object) {
        this.id = build_object.id;
        this.name = build_object.name;
        this.description = build_object.description;
        this.from = build_object.from;
        this.to = build_object.to;
        this.rating = build_object.rating;
        this.director = build_object.director;
        this.votes = build_object.votes;
        this.gross = build_object.gross;
    }
}
