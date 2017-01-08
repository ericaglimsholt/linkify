function modify_qty(val) {
    var qty = document.querySelector('.qty').value;
    var new_qty = parseInt(qty,10) + val;

    if (new_qty < 0) {
        new_qty = 0;
    }

    document.querySelector('.qty').value = new_qty;
    return new_qty;
}
