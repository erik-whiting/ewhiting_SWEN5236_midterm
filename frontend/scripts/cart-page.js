var items = Array();
var receipt = Array();
var getCartItems = function() {
    var url = "http://ewhiting.eastus.cloudapp.azure.com/midterm/Classes/AppUser/get_cart.php/?user=1";
    $.get(url, function(data) {
        var receipt_json = new Receipt(data.receipt[0]);
        receipt.push(receipt_json);
        var items_json = data.items;
        items_json.forEach(function (item_json) {
            var item = new Item(item_json);
            items.push(item);
        });
        setCartContent(items);
        setReceipt(receipt[0]);
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

var setReceipt = function(receipt) {
    var receiptHtml = "<div class='cart-receipt'>";
    receiptHtml += "<div class='cart-subtotal'>Subtotal(Net Cost): $" + receipt.subtotal + "</div>";
    receiptHtml += "<div class='cart-tax'>Tax: +$" + receipt.tax + "</div>";
    receiptHtml += "<div class='cart-total'><b>Grand Total: $" + receipt.total + "</b></div>";
    receiptHtml += "</div>";
    receiptHtml += "<button id='checkoutBtn' type='button' class='btn btn-primary'>Checkout!</button>";
    var content = document.getElementById("content");
    content.innerHTML += receiptHtml;

}

$('#checkoutButton').click(function() {
    $.ajax({
        type: "GET",
        url: "http://ewhiting.eastus.cloudapp.azure.com/midterm/Classes/Cart/checkout.php/?user=1"
    }).done(function(msg) {
        getCartItems();
    });
});

