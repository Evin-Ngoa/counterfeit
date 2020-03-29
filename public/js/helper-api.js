
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
    $(".alert-danger").hide();

    $("#contract").val(contractId);
    $("#unitCount").val(quantity);


    $('#addShipmentModal').modal('show');
}

/**
 * Show edit form with the values
* @param {*} publisher_id 
*/
function editPublisherForm(publisher_id) {
    console.log("Clicked editPublisherForm form");
    var qrCodeEdit = '';
    $.ajax({
        type: 'GET',
        url: '/publisher/' + publisher_id + '/edit',
        success: function (data) {
            var PublisherID = data.publisher.memberId;
            console.log("Data Edit +>" + PublisherID);

            $("#edit-error-bag").hide();
            $("#id").val(PublisherID);
            $("#IdBook").text(PublisherID);

            $("#frmEditPublisher input[name=memberId]").val(data.publisher.memberId);
            $("#frmEditPublisher input[name=email]").val(data.publisher.email);
            $("#frmEditPublisher input[name=name]").val(data.publisher.name);
            $("#frmEditPublisher input[name=telephone]").val(data.publisher.telephone);
            $("#frmEditPublisher input[name=accountBalance]").val(data.publisher.accountBalance);
            $("#frmEditPublisher input[name=country]").val(data.publisher.address.country);
            $("#frmEditPublisher input[name=county]").val(data.publisher.address.county);
            $("#frmEditPublisher input[name=street]").val(data.publisher.address.street);

            $('#editPublisherModal').modal('show');
        },
        error: function (data) {
            console.log(data);
        }
    });
}

/**
 * Get data
 * @param {*} publisherEmail 
 */
function deletePublisherForm(publisherEmail) {
    $.ajax({
        type: 'GET',
        url: '/publisher/' + publisherEmail,
        success: function(data) {
            var PublisherID = data.publisher.email;
            $("#frmDeletePublisher #delete-title").html("Delete Publisher (" + PublisherID + ")?");
            $("#frmDeletePublisher input[name=email]").val(PublisherID);
            $('#deletePublisherModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
}

/**
 * Show edit form with the values
* @param {*} distributor_id 
*/
function editDistributorForm(distributor_id) {
    console.log("Clicked editPublisherForm form");
    var qrCodeEdit = '';
    $.ajax({
        type: 'GET',
        url: '/distributor/' + distributor_id + '/edit',
        success: function (data) {
            var PublisherID = data.distributor.memberId;
            console.log("Data Edit +>" + PublisherID);

            $("#edit-error-bag").hide();
            $("#id").val(PublisherID);
            $("#IdBook").text(PublisherID);

            $("#frmEditDistributor input[name=memberId]").val(data.distributor.memberId);
            $("#frmEditDistributor input[name=email]").val(data.distributor.email);
            $("#frmEditDistributor input[name=name]").val(data.distributor.name);
            $("#frmEditDistributor input[name=telephone]").val(data.distributor.telephone);
            $("#frmEditDistributor input[name=accountBalance]").val(data.distributor.accountBalance);
            $("#frmEditDistributor input[name=country]").val(data.distributor.address.country);
            $("#frmEditDistributor input[name=county]").val(data.distributor.address.county);
            $("#frmEditDistributor input[name=street]").val(data.distributor.address.street);

            $('#editDistributorModal').modal('show');
        },
        error: function (data) {
            console.log(data);
        }
    });
}

/**
 * Get data
 * @param {*} distributorEmail 
 */
function deleteDistributorForm(distributorEmail) {
    $.ajax({
        type: 'GET',
        url: '/distributor/' + distributorEmail,
        success: function(data) {
            var DistributorID = data.distributor.email;
            $("#frmDeleteDistributor #delete-title").html("Delete Distributor (" + DistributorID + ")?");
            $("#frmDeleteDistributor input[name=email]").val(DistributorID);
            $('#deleteDistributorModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
} 

/**
 * Show edit form with the values
* @param {*} customer_id 
*/
function editCustomerForm(customer_id) {
    console.log("Clicked editCustomerForm form");
    var qrCodeEdit = '';
    $.ajax({
        type: 'GET',
        url: '/customer/' + customer_id + '/edit',
        success: function (data) {
            var PublisherID = data.customer.memberId;
            console.log("Data Edit +>" + PublisherID);

            $("#edit-error-bag").hide();
            $("#id").val(PublisherID);
            $("#IdBook").text(PublisherID);

            $("#frmEditCustomer input[name=memberId]").val(data.customer.memberId);
            $("#frmEditCustomer input[name=email]").val(data.customer.email);
            $("#frmEditCustomer input[name=name]").val(data.customer.name);
            $("#frmEditCustomer input[name=telephone]").val(data.customer.telephone);
            $("#frmEditCustomer input[name=accountBalance]").val(data.customer.accountBalance);
            $("#frmEditCustomer input[name=country]").val(data.customer.address.country);
            $("#frmEditCustomer input[name=county]").val(data.customer.address.county);
            $("#frmEditCustomer input[name=street]").val(data.customer.address.street);

            $('#editCustomerModal').modal('show');
        },
        error: function (data) {
            console.log(data);
        }
    });
}

/**
 * //deleteCustomerForm
 * Get data
 * @param {*} customerEmail 
 */
function deleteCustomerForm(customerEmail) {
    $.ajax({
        type: 'GET',
        url: '/customer/' + customerEmail,
        success: function(data) {
            var CustomerID = data.customer.email;
            $("#frmDeleteCustomer #delete-title").html("Delete Customer (" + CustomerID + ")?");
            $("#frmDeleteCustomer input[name=email]").val(CustomerID);
            $('#deleteCustomerModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
} //deleteCustomerForm

/**
 * Register Book Form
 * @param {*} shipmentId 
 */
function openAddBookForm(shipmentId) {

    $('#registerBookShipmentModal').modal('show');

    console.log("shipmentId --> " + shipmentId);

    $('#shipment_id').html('<i class="os-icon os-icon-globe"></i> Add Book To Shipment ' + shipmentId);

    $('#shipment').val('resource:org.evin.book.track.Shipment#' + shipmentId);

} 

/**
 * 
 * @param {*} unitsOrdered 
 * @param {*} unitsAdded 
 */
function selectDistributorForm(unitsOrdered, unitsAdded, shipmentId) {
    var diff = 0;
    var message = '';
    $("#add-ship-ownership-error-bag").hide();
    // Set ID 
    $("#shipment_owner").val(shipmentId);

    $('#shipment_title').html('<i class="os-icon os-icon-truck"></i> Choose distributor for shipment ' + shipmentId);
    if(unitsOrdered > unitsAdded){

        diff = unitsOrdered - unitsAdded;
        message = "Add more "+ diff +" books in the shipment before being able to select ditributor.";

        message = '<div class="alert alert-warning" >'
                      + message               
                    +'</div>';

        console.log("Add more "+ diff +" books in the shipment.");
        $("#add-ship-ownership-error-bag").hide();
        $("#selectorMsgId").html(message);
        $('#selectDistributorModal').modal('show');

    }else if(unitsOrdered < unitsAdded){
        diff = unitsAdded - unitsOrdered;
        message = "You have registered more "+ diff +" books.";
        console.log("You have registered more "+ diff +" books.");
        $("#add-ship-ownership-error-bag").hide();
        $("#selectorMsgId").html(message);
        $('#selectDistributorModal').modal('show');

    }else{
        var selectOption = '';
        $.ajax({
            type: 'GET',
            url: 'http://localhost:3000/api/Distributor/',
            success: function(data) {
                console.log("DATA ->" + JSON.stringify(data));

                // $("#selectDistributor").html(selectOption);
                // https://makitweb.com/loading-data-remotely-in-select2-with-ajax/
                var citizenship = document.getElementById("selectDistributor")
                for (var i = 0; i < data.length; i++) {
                    var option = document.createElement("OPTION"),
                        txt = document.createTextNode(data[i].name);
                    option.appendChild(txt);
                    option.setAttribute("value", data[i].email);
                    citizenship.insertBefore(option, citizenship.lastChild);
                }
            },
            error: function(data) {
                console.log(data);
            }
        });

        console.log("Equal can continue coding " + diff);
        $("#add-ship-ownership-error-bag").hide();

        message = "You have registered more "+ diff +" books.";

        $("#selectorMsgId").html(message);
        $('#selectDistributorModal').modal('show');
    }

} 

function getBase64Encoded(rawStr) {
    var wordArray = CryptoJS.enc.Utf8.parse(rawStr);
    var result = CryptoJS.enc.Base64.stringify(wordArray);

    return result;
}

function getBase64Decoded(encStr) {
    var wordArray = CryptoJS.enc.Base64.parse(encStr);
    var result = wordArray.toString(CryptoJS.enc.Utf8);

    return result;
}

/**
 * Set Token Login
 */
function setToken(detailsData){
    console.log("Generating Token... ");

    var txtHeader = document.getElementById("txtHeader");
    var txtPayload = document.getElementById("txtPayload");
    var txtSecret = document.getElementById("txtSecret");

    var jsonData = {
        "token":"34334trgggtrhtytyu5u5"
    };

    // var jsonDataStringified = JSON.stringify(jsonData);
    var jsonDataStringified = JSON.stringify(detailsData);

    localStorage.setItem('logged_in_user', jsonDataStringified);

    //get your item from the localStorageand save it to the cookie
    var myItem = localStorage.getItem('logged_in_user');
    setCookie('logged_in_user', myItem, 7);

}

/**
 * Unseting token Logout
 */
function UnSetToken(){

    console.log("Unsetting Token... ");

    localStorage.removeItem('logged_in_user');

    deleteCookie('logged_in_user');

    window.location.assign('/auth/login');
}

//define a function to set cookies
function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000)); // days
        // date.setTime(date.getTime() + (hours*60*60*1000)); // hours
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
 }

 /*On logout deleteCookie*/
function deleteCookie(cname) {
    cookieValue = "LOGGED-OUT";
    document.cookie = cname + "=" + cookieValue + "; expires=Thu, 01 Jan 1970 00:00:00 GMT";
}

 function getRoleFromClass(words) {
    var n = words.split(".");
    return n[n.length - 1];

}

$('.datetime').datetimepicker({
    // format: 'DD/MM/YYYY',
    format: 'YYYY-MM-DD',
    useCurrent: false, //Important! See issue #
    minDate:new Date(),
});

