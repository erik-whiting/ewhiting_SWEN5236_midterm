var nav = document.getElementById("nav");
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
    var buildHTML = "<div class='container-fluid'>";
    buildHTML += "<div class='navbar-header'>Erik's SWEN 5236 Midterm</div>";
    buildHTML += "<ul class='nav navbar-nav'><li>Cart: " + navbar.cart_count + "</li></ul>";
    buildHTML += "</div>";
    nav.innerHTML = buildHTML;
}