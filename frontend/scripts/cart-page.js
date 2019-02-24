var items = Array();
var getCartItems = function() {
    var url = "http://ewhiting.eastus.cloudapp.azure.com/midterm/Classes/AppUser/get_cart.php/?user=1";
    $.get(url, function(data) {
        var receipt = data.receipt;
        var items = data.items;
        items.forEach(function (item_json) {
            var item = new Item(item_json);
            items.push(item);
        })
        setCartContent(items);
    })
}

class Item {
    constructor(item) {
        this.movie_name = item.movie;
        this.price = item.price;
    }
}

class Receipt {
    constructor(receipt) {
        this.subtotal = receipt.subtotal;
        this.cart_count = receipt.cart_count;
        this.tax = receipt.tax;
        this.total = receipt.total;
    }
}

var setCartContent = function(items) {
    var content = document.getElementById("content");
    var buildHTML = "";
    items.forEach(function (item) {
        buildHTML += "<div class='cart-item'>";
        buildHTML += item.movie_name + " " + item.price;
        buildHTML += "</div>";
    })
    content.innerHTML = buildHTML;
}