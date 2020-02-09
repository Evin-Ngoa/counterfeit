
/**
 * Show edit form with the values
* @param {*} book_id 
*/
function editBookForm(book_id) {
    console.log("Clicked Edit form");
    var qrCodeEdit = '';
    $.ajax({
        type: 'GET',
        url: '/book/' + book_id + '/edit',
        success: function (data) {
            var BookID = data.book.id;
            console.log("Data Edit +>" + BookID);

            $("#edit-error-bag").hide();
            $("#id").val(BookID);
            $("#IdBook").text(BookID);
            // $("#frmEditBook input[name=id]").val(BookID);
            $("#frmEditBook input[name=type]").val(data.book.type);
            $("#frmEditBook input[name=author]").val(data.book.author);
            $("#frmEditBook input[name=edition]").val(data.book.edition);
            $("#frmEditBook textarea[name=description]").val(data.book.description);
            $("#frmEditBook input[name=initialOwner]").val(data.book.initialOwner);
            $("#frmEditBook input[name=sold]").val(data.book.sold);
            $("#frmEditBook input[name=price]").val(data.book.price);
            // $("#frmEditBook input[name=$class]").val(data.book.$class);

            $("#qrEditBox").html(qrCodeEdit);

            $('#editBookModal').modal('show');
        },
        error: function (data) {
            console.log(data);
        }
    });
}

/**
 * Get data
 * @param {*} book_id 
 */
function deleteBookForm(book_id) {
    $.ajax({
        type: 'GET',
        url: '/book/' + book_id,
        success: function(data) {
            var BookID = data.book.id;
            $("#frmDeleteBook #delete-title").html("Delete Book (" + BookID + ")?");
            $("#frmDeleteBook input[name=book_id]").val(BookID);
            $('#deleteBookModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
}

/**
 * Show edit form with the values
* @param {*} order_id 
*/
function editOrderForm(order_id) {
    console.log("Clicked Order Edit form");
    var qrCodeEdit = '';
    $.ajax({
        type: 'GET',
        url: '/order/' + order_id + '/edit',
        success: function (data) {
            var orderID = data.order.contractId;
            console.log("Data Edit +>" + orderID);

            $("#edit-error-bag").hide();
            $("#contractId").val(orderID);
            $("#IdOrder").text(orderID);
            // $("#frmEditOrder input[name=id]").val(BookID);
            $("#frmEditOrder input[name=buyer]").val(data.order.buyer);
            $("#frmEditOrder input[name=seller]").val(data.order.seller);
            $("#frmEditOrder input[name=arrivalDateTime]").val(data.order.arrivalDateTime);
            $("#frmEditOrder input[name=payOnArrival]").val(data.order.payOnArrival);
            $("#frmEditOrder textarea[name=destinationAddress]").val(data.order.destinationAddress);
            $("#frmEditOrder input[name=unitPrice]").val(data.order.unitPrice);
            $("#frmEditOrder input[name=quantity]").val(data.order.quantity);
            $("#frmEditOrder input[name=lateArrivalPenaltyFactor]").val(data.order.lateArrivalPenaltyFactor);
            $("#frmEditOrder input[name=damagedPenaltyFactor]").val(data.order.damagedPenaltyFactor);
            $("#frmEditOrder input[name=lostPenaltyFactor]").val(data.order.lostPenaltyFactor);

            $('#editOrderModal').modal('show');
        },
        error: function (data) {
            console.log(data);
        }
    });
}

/**
 * Delete Order
 * @param {*} order_id 
 */
function deleteOrderForm(order_id) {
    $.ajax({
        type: 'GET',
        url: '/order/' + order_id,
        success: function(data) {
            var OrderID = data.order.contractId;
            $("#frmDeleteOrder #delete-title").html("Delete Order (" + OrderID + ")?");
            $("#frmDeleteOrder input[name=order_id]").val(OrderID);
            $('#deleteOrderModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
}

/**
 * Show create shipment modal from order
 * @param {*} contractId 
 * @param {*} quantity 
 */
function createShipmentOrder(contractId, quantity){

    console.log("Clicked createShipmentOrder");

    $("#contract").val(contractId);
    $("#unitCount").val(quantity);

    $("#add-error-bag").hide();
    $('#addShipmentModal').modal('show');
}

$('.datetime').datetimepicker({
    // format: 'DD/MM/YYYY',
    format: 'YYYY-MM-DD',
    useCurrent: false, //Important! See issue #
    minDate:new Date(),
});
