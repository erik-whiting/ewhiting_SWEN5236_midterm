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
        var bo = JSON.parse(build_object);
        this.id = bo.id;
        this.name = bo.name;
        this.description = bo.description;
        this.from = bo.from;
        this.to = bo.to;
        this.rating = bo.rating;
        this.director = bo.director;
        this.votes = bo.votes;
        this.gross = bo.gross;
    }
}
