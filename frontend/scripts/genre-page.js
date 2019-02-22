genres = Array();
url = 'http://ewhiting.eastus.cloudapp.azure.com/midterm/Classes/Genre/read.php';
$.get(url, function(data, status) {
    var records = data.records;
    records.forEach(function(record, i) {
        var genre = new Genre(record);
        genres.push(record);
        document.getElementById(genre.name).innerText = genre.name;
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