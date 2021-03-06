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
        if (receipt.savings != null) {
            this.savings = receipt.savings;
        }
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
    if(receipt.savings != null) {
        receiptHtml += "<div class='cart-savings'><b>Savings: $" + receipt.savings + "</b></div>";
    }
    receiptHtml += "<button onclick='doCheckout()' type='button' class='btn btn-primary'>Checkout!</button>";
    receiptHtml += "<button onclick='setDiscountReceipt()' type='button' class='btn btn-success'>" +
        "Get 15 Percent Discount!</button>";
    var content = document.getElementById("content");
    content.innerHTML += receiptHtml;

}

var setDiscountReceipt = function() {
    var content = document.getElementById("content");
    content.innerHTML = "";
    var url = "http://ewhiting.eastus.cloudapp.azure.com/midterm/Classes/AppUser/get_cart_discount.php/";
    var params = "?user=1&discount=15";
    url = url + params;
    $.get(url, function(data) {
        var receipt_json = new Receipt(data.receipt[0]);
        receipt.push(receipt_json);
        var items_json = data.items;
        items_json.forEach(function (item_json) {
            var item = new Item(item_json);
            items.push(item);
        });
        setCartContent(items);
        setReceipt(receipt[1]);
    })
}

var doCheckout = function() {
    $.ajax({
        type: "GET",
        url: "http://ewhiting.eastus.cloudapp.azure.com/midterm/Classes/Cart/checkout.php/?user=1"
    }).done(function (msg) {
        getCartItems();
    });
    location.reload();
}
