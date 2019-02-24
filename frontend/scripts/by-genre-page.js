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
url += genre_id;

$.get(url, function(data, status) {
    var records = data.movies;
    records.forEach(function (record, i) {
        movies.push(record);
    })
});
