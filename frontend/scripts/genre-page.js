genres = Array();
url = 'http://ewhiting.eastus.cloudapp.azure.com/midterm/Classes/Genre/read.php';
genre_service_url = 'http://ewhiting.eastus.cloudapp.azure.com/midterm/Classes/Genre/movie_by_genre.php/?genre=';
$.get(url, function(data, status) {
    var records = data.records;
    records.forEach(function(record, i) {
        var genre = new Genre(record);
        genres.push(record);
        var genre_url = genre_service_url + genre.id;
        document.getElementById(genre.name).innerText = genre.name;
        var link_id = genre.name + '-link';
        document.getElementById(link_id).setAttribute('href', genre_url);
        var img_id = genre.name + '-img';
        document.getElementById(img_id).src = genre.picture_path;
    })
});

class Genre {
    constructor(build_object) {
        this.id = build_object.id;
        this.name = build_object.name;
        this.picture_path = build_object.picture_path;
    }
}
document.getElementById("animation").innerText = genres[0]["name"];

function return_values(index, value) {
    return genres[index][value];
}