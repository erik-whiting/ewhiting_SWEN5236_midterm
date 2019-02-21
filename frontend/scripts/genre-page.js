genres = Array();
url = 'http://ewhiting.eastus.cloudapp.azure.com/midterm/Classes/Genre/read.php';
$.get(url, function(data, status) {
    var records = data.records;
    records.forEach(function(record) {
        var genre = new Genre(record);
        genres.push(record);
    })
});

class Genre {
    constructor(build_object) {
        this.id = build_object.id;
        this.name = build_object.name;
        this.picture_path = build_object.picture_path;
    }
}
