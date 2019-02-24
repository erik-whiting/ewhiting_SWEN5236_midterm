var url = "http://ewhiting.eastus.cloudapp.azure.com/midterm/Classes/AppUser/get_cart.php/?user=1";

$.get(url, function(data) {
    var navContent = data.receipt;
    var navbar = new Navbar(navContent);
    setContent(navbar);
})

class Navbar {
    constructor(receipt) {
        this.total = receipt.total;
        this.cart_count = receipt.cart_count;
    }
}

var setContent = function(navbar) {
    var nav = document.getElementById("nav");
    var buildHTML = "<div class='container-fluid'>";
    buildHTML += "<div class='navbar-header'><a class=\"navbar-brand\" href=\"#\">Erik's SWEN 5236 Midterm</a></div>";
    buildHTML += "<ul class='nav navbar-nav'>" +
        "<li class='active'><a href='#'>Cart: " + navbar.cart_count + "</a></li></ul>";
    buildHTML += "</div>";
    nav.innerHTML = buildHTML;
}