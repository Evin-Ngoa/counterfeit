var domainUrl = 'http://localhost:3001/api';
var postCustomerURL = domainUrl + '/Customer';
var scanPoints = 2.0;
var reportPoints = 5.0;
var penaltyPoints = 20.0;
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
            $("#frmEditBook input[name=maxPoints]").val(data.book.maxPoints);
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
        success: function (data) {
            var BookID = data.book.id;
            $("#frmDeleteBook #delete-title").html("Delete Book (" + BookID + ")?");
            $("#frmDeleteBook input[name=book_id]").val(BookID);
            $('#deleteBookModal').modal('show');
        },
        error: function (data) {
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
            $("#frmEditOrder input[name=buyer]").val(data.order.buyer.email);
            $("#frmEditOrder input[name=seller]").val(data.order.seller.email);
            $("#frmEditOrder input[name=arrivalDateTime]").val(data.order.arrivalDateTime);
            $("#frmEditOrder input[name=payOnArrival]").val(data.order.payOnArrival);
            $("#frmEditOrder textarea[name=destinationAddress]").val(data.order.destinationAddress);
            $("#frmEditOrder input[name=unitPrice]").val(data.order.unitPrice);
            $("#frmEditOrder input[name=pricePoints]").val(data.order.pricePoints);
            $("#frmEditOrder input[name=discountPoints]").val(data.order.discountPoints);
            $("#frmEditOrder input[name=quantity]").val(data.order.quantity);
            $("#frmEditOrder input[name=lateArrivalPenaltyFactor]").val(data.order.lateArrivalPenaltyFactor);
            $("#frmEditOrder input[name=damagedPenaltyFactor]").val(data.order.damagedPenaltyFactor);
            $("#frmEditOrder input[name=lostPenaltyFactor]").val(data.order.lostPenaltyFactor);
            $("#frmEditOrder textarea[name=description]").val(data.order.description);
            $("#frmEditOrder input[name=createdAt]").val(data.order.createdAt);

            $('#editOrderModal').modal('show');
        },
        error: function (data) {
            console.log(data);
        }
    });
}

/**
 * Show edit form with the values
* @param {*} order_id 
*/
function orderDetailedView(order_id) {
    console.log("Clicked orderDetailedView form");
    var qrCodeEdit = '';
    $.ajax({
        type: 'GET',
        url: '/order/' + order_id + '/edit',
        success: function (data) {
            var buyerInfo = '';
            var sellerInfo = '';

            var discount = data.order.discountPoints;
            var points = data.order.discountPoints * 10;
            var totalPrice = (data.order.unitPrice * data.order.quantity) - discount;

            if (points > 0 && discount > 0) {
                var discountMsg = "Points Redeemed = " + points + ",<br> Total Discount = " + discount + ",<br> Total Amount = " + totalPrice;
            } else {
                var discountMsg = "<br> Total Amount = " + totalPrice;
            }


            $("#orderIdView").html(data.order.contractId);
            $("#orderStatusView").html(data.order.orderStatus);

            buyerInfo += data.order.buyer.email + ' , ' + data.order.buyer.firstName + ' ' + data.order.buyer.lastName;
            $("#buyerInfoView").html(buyerInfo);

            sellerInfo += data.order.seller.email + ' , ' + data.order.seller.firstName;
            $("#sellerInfoView").html(sellerInfo);

            $("#arrivalDateTimeView").html(data.order.arrivalDateTime);
            if (data.order.payOnArrival == true) {
                $("#payOnArrivalView").html("Yes");
            } else {
                $("#payOnArrivalView").html("No");
            }
            $("#unitPriceView").html(data.order.unitPrice);
            $("#discountView").html(discountMsg);
            $("#quantityView").html(data.order.quantity);
            $("#descriptionView").html(data.order.description);
            $("#destinationAddressView").html(data.order.destinationAddress);

            $('#orderViewModal').modal('show');
        },
        error: function (data) {
            console.log(data);
        }
    });
}

/**
 * Show edit form with the values
 * @param {*} shipment_id 
 */
function editShipmentForm(shipment_id) {
    console.log("Clicked Shipment Edit form");

    $.ajax({
        type: 'GET',
        url: '/shipment/' + shipment_id + '/edit',
        success: function (data) {

            // console.log("JSON +>" + JSON.stringify(data));
            // console.log("Buyer +>" + JSON.stringify(data.shipment.contract.buyer.email));

            $("#edit-shipment-error-bag").hide();

            $("#frmEditShipment input[name=contract]").val(data.shipment.contract.contractId);
            $("#frmEditShipment select[name=ShipmentStatus]").val(data.shipment.ShipmentStatus);
            $("#frmEditShipment select[name=itemStatus]").val(data.shipment.itemStatus);
            $("#frmEditShipment input[name=unitCount]").val(data.shipment.unitCount);
            $("#frmEditShipment input[name=shipmentId]").val(data.shipment.shipmentId);
            $("#frmEditShipment input[name=customerId]").val(data.shipment.contract.buyer.email);

            $('#editShipmentModal').modal('show');
        },
        error: function (data) {
            console.log(data);
        }
    });
}

/**
 * Show Review Form
 * @param {*} shipment_id 
 */
function reviewForm(shipment_id) {
    console.log("Clicked reviewForm form");

    $.ajax({
        type: 'GET',
        url: '/shipment/' + shipment_id + '/edit',
        success: function (data) {

            // console.log("JSON +>" + JSON.stringify(data));
            // console.log("Buyer +>" + JSON.stringify(data.shipment.contract.buyer.email));
            console.log("Shipment +>" + JSON.stringify(data.shipment.shipmentId));

            $("#add-review-error-bag").hide();

            $("#frmAddReview input[name=contract]").val(data.shipment.contract.contractId);
            // $("#frmAddReview select[name=ShipmentStatus]").val(data.shipment.ShipmentStatus);
            // $("#frmAddReview select[name=itemStatus]").val(data.shipment.itemStatus);
            // $("#frmAddReview input[name=unitCount]").val(data.shipment.unitCount);
            $("#frmAddReview input[name=shipment]").val(data.shipment.shipmentId);
            // $("#frmAddReview input[name=customerId]").val(data.shipment.contract.buyer.email);

            $('#addReviewModal').modal('show');
        },
        error: function (data) {
            console.log(data);
        }
    });
}

/**
 * Show Detailed View Of Shipment
 * @param {*} shipment_id 
 */
function shipmentDetailedView(shipment_id) {
    console.log("Clicked shipmentDetailedView");
    $("#view-detailed-shipment-error-bag").hide();

    $.ajax({
        type: 'GET',
        url: '/shipment/' + shipment_id + '/edit',
        success: function (data) {
            var stars = '';
            var books = '';

            // console.log("JSON +>" + JSON.stringify(data));
            // console.log("Buyer +>" + JSON.stringify(data.shipment.contract.buyer.email));
            console.log("Shipment +>" + JSON.stringify(data.shipment.shipmentId));

            $("#add-review-error-bag").hide();

            $("#shipmentIdView").html(data.shipment.shipmentId);
            $("#ShipmentStatusView").html(data.shipment.ShipmentStatus);
            $("#itemStatusView").html(data.shipment.itemStatus);
            for (var i = 0; i < data.shipment.feedbackScale; i++) {
                stars += '<i style="color:#ffd700;" class="typcn typcn-heart-full-outline"></i>';
            }
            $("#feedbackScaleView").html(stars);
            for (var j = 0; j < data.shipment.bookRegisterShipment.length; j++) {
                // Laat Loop ignore comma
                if ((data.shipment.bookRegisterShipment.length - 1) == j) {
                    books += data.shipment.bookRegisterShipment[j].book.id;
                } else {
                    books += data.shipment.bookRegisterShipment[j].book.id + ', ';
                }
            }
            $("#booksAddedView").html(books);
            $("#feedbackMessageView").html(data.shipment.feedbackMessage);
            $("#unitCountView").html(data.shipment.unitCount);
            $("#contractIdView").html(data.shipment.contract.contractId);
            $("#buyerView").html(data.shipment.contract.buyer.email);
            $("#sellerView").html(data.shipment.contract.seller.email);

            $('#shipmentViewModal').modal('show');
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
        success: function (data) {
            var OrderID = data.order.contractId;
            $("#frmDeleteOrder #delete-title").html("Delete Order (" + OrderID + ")?");
            $("#frmDeleteOrder input[name=order_id]").val(OrderID);
            $('#deleteOrderModal').modal('show');
        },
        error: function (data) {
            console.log(data);
        }
    });
}

/**
 * Show create shipment modal from order
 * @param {*} contractId 
 * @param {*} quantity 
 */
function createShipmentOrder(contractId, quantity) {

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
            $("#frmEditPublisher input[name=name]").val(data.publisher.firstName);
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
        success: function (data) {
            var PublisherID = data.publisher.email;
            $("#frmDeletePublisher #delete-title").html("Delete Publisher (" + PublisherID + ")?");
            $("#frmDeletePublisher input[name=email]").val(PublisherID);
            $('#deletePublisherModal').modal('show');
        },
        error: function (data) {
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
            $("#frmEditDistributor input[name=name]").val(data.distributor.firstName);
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
        success: function (data) {
            var DistributorID = data.distributor.email;
            $("#frmDeleteDistributor #delete-title").html("Delete Distributor (" + DistributorID + ")?");
            $("#frmDeleteDistributor input[name=email]").val(DistributorID);
            $('#deleteDistributorModal').modal('show');
        },
        error: function (data) {
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
            $("#frmEditCustomer input[name=name]").val(data.customer.firstName);
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
        success: function (data) {
            var CustomerID = data.customer.email;
            $("#frmDeleteCustomer #delete-title").html("Delete Customer (" + CustomerID + ")?");
            $("#frmDeleteCustomer input[name=email]").val(CustomerID);
            $('#deleteCustomerModal').modal('show');
        },
        error: function (data) {
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
    if (unitsOrdered > unitsAdded) {

        diff = unitsOrdered - unitsAdded;
        message = "You can't assign this Shipment to a distributor. Ensure You add more " + diff + " books in the shipment before getting access to select ditributor.";

        message = '<div class="alert alert-warning" >'
            + message
            + '</div>';

        console.log("Add more " + diff + " books in the shipment.");
        $("#add-ship-ownership-error-bag").hide();
        // Hide the selector distributor and action buttons till
        // conditions are met
        $("#selectDistributorDropdown").hide();
        $("#selectDistributorDropdownActions").hide();

        $("#selectorMsgId").html(message);
        $('#selectDistributorModal').modal('show');

    } else if (unitsOrdered < unitsAdded) {
        diff = unitsAdded - unitsOrdered;
        message = "You can't assign this Shipment to a distributor. You have registered more " + diff + " books.";
        message = '<div class="alert alert-warning" >'
            + message
            + '</div>';
        console.log("You have registered more " + diff + " books.");
        $("#add-ship-ownership-error-bag").hide();
        // Hide the selector distributor and action buttons till
        // conditions are met
        $("#selectDistributorDropdown").hide();
        $("#selectDistributorDropdownActions").hide();

        $("#selectorMsgId").html(message);
        $('#selectDistributorModal').modal('show');

    } else {
        // Show the selector distributor and action buttons till
        // conditions are met
        $("#selectDistributorDropdown").show();
        $("#selectDistributorDropdownActions").show();
        var selectOption = '';
        $.ajax({
            type: 'GET',
            url: domainUrl + '/Distributor/',
            success: function (data) {
                console.log("DATA ->" + JSON.stringify(data));

                // $("#selectDistributor").html(selectOption);
                // https://makitweb.com/loading-data-remotely-in-select2-with-ajax/
                var citizenship = document.getElementById("selectDistributor")
                for (var i = 0; i < data.length; i++) {
                    var option = document.createElement("OPTION"),
                        txt = document.createTextNode(data[i].firstName);
                    option.appendChild(txt);
                    option.setAttribute("value", data[i].email);
                    citizenship.insertBefore(option, citizenship.lastChild);

                    console.log("data[i].firstName) ==> " + data[i].firstName);
                    console.log("data[i].email) ==> " + data[i].email);
                }
            },
            error: function (data) {
                console.log(data);
            }
        });


        $("#add-ship-ownership-error-bag").hide();
        diff = unitsAdded - unitsOrdered;
        console.log("Equal can continue coding " + diff);

        // Books added correctly
        if (diff == 0 && unitsAdded > 0) {
            // No Message
            message = "";
        } else {
            // You haven't registered any
            message = "You have registered more " + diff + " books.";
        }

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
function setToken(detailsData) {
    console.log("Generating Token... ");

    var txtHeader = document.getElementById("txtHeader");
    var txtPayload = document.getElementById("txtPayload");
    var txtSecret = document.getElementById("txtSecret");

    var jsonData = {
        "token": "34334trgggtrhtytyu5u5"
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
function UnSetToken() {

    console.log("Unsetting Token... ");

    localStorage.removeItem('logged_in_user');

    deleteCookie('logged_in_user');

    window.location.assign('/auth/login');
}

//define a function to set cookies
function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); // days
        // date.setTime(date.getTime() + (hours*60*60*1000)); // hours
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
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

/**
 * Get the value from a hash symbol
 * @param {*} words 
 */
function getValueAfterHash(words) {
    var n = words.split("#");
    return n[n.length - 1];

}

$('.datetime').datetimepicker({
    // format: 'DD/MM/YYYY',
    format: 'YYYY-MM-DD',
    useCurrent: false, //Important! See issue #
    minDate: new Date(),
});

// Notification For Updates
$("#bn2").breakingNews({
    effect: "slide-v",
    autoplay: true,
    timer: 3000,
    color: "blue"
});

// Get current Date Time in GMT+0300 (East Africa Time)
function currentDateTime() {
    var dt = new Date();
    dt.setHours(dt.getHours() + 3);

    return dt;
}

/**
 * Function to confirm 
 * @param {*} reportID 
 * @param {*} BookID 
 * @param {*} ShipmentID 
 * @param {*} reportedByEmail 
 * @param {*} userRole 
 * @param {*} loggedInEmail 
 */
function updateTrueIsConfirmedReport(reportID, BookID, ShipmentID, reportedByEmail, userRole, loggedInEmail) {
    console.log("Clicked updateIsConfirmedReport in helper-api");

    var domainUrl = 'http://localhost:3001/api';
    var laravelDomainUrl = 'http://localhost:8000';

    var smsReportMessage = "Report Confirmed for " + reportedByEmail + ". You earned 5 points for helping fight counterfeit. Keep up the Fight!";

    var jsonDataSMS = {
        message: smsReportMessage
    };

    var smsURL = laravelDomainUrl + '/general/sms/send/';

    // 1. Update Report isconfirmed
    var jsonData = {
        report: "resource:org.evin.book.track.Report#" + reportID,
        isConfirmed: true,
        updatedAt: currentDateTime(),
        participantInvoking: "resource:org.evin.book.track." + userRole + "#" + loggedInEmail
    };

    // Email
    var sendEmailURL = "/general/email/send/";
    var jsonEmailData = {}
    jsonEmailData = {
        'message': smsReportMessage,
        'to': reportedByEmail,
        'subject': 'Book Counterfeit Report Confirmation'
    };
    console.log("updateIsConfirmedReport Data = " + JSON.stringify(jsonData));


    var getCustomerURL = postCustomerURL + "/" + reportedByEmail;

    var postCustomerScanPointsURL = domainUrl + '/updateCustomerPoints';

    var msgHTML = '';

    var confirmation = confirm("Are you sure you want to approve the report? You cannot undo after this.");

    if (confirmation) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: domainUrl + '/updateReportIsConfirmed',
            data: jsonData,
            dataType: 'json',
            beforeSend: function () {
                $("#loader").show();
                $("#add-error-report-bag").hide();
                $('#add-report-msgs').hide();
            },
            success: function (data) {

                // Get Customer Details
                $.ajax({
                    type: 'GET',
                    url: getCustomerURL,
                    beforeSend: function () {
                        //calls the loader id tag
                        $("#loader").show();
                    },
                    success: function (customerData) {
                        console.log("customerData +++> " + JSON.stringify(customerData));
                        console.log("customerData.accountBalance = " + customerData.accountBalance);
                        var postPoints = {
                            accountBalance: customerData.accountBalance + reportPoints,
                            customer: reportedByEmail,
                            updatedAt: currentDateTime(),
                            participantInvoking: "resource:org.evin.book.track." + userRole + "#" + loggedInEmail
                        };

                        // Add Points
                        $.ajax({
                            type: 'POST',
                            url: postCustomerScanPointsURL,
                            data: postPoints,
                            dataType: 'json',
                            beforeSend: function () {
                                //calls the loader id tag
                                $("#loader").show();
                            },
                            success: function (data) {

                                // SEND SMS 
                                $.ajax({
                                    type: 'POST',
                                    url: smsURL,
                                    data: jsonDataSMS,
                                    dataType: 'json',
                                    beforeSend: function () {
                                        $("#loader").show();
                                    },
                                    success: function (data) {


                                        console.log("smsURL -->" + data);

                                        msgHTML = '<div class="alert alert-primary" role="alert">' +
                                            'Report confirmed!' +
                                            '</div>';

                                        if (data.success) {

                                            $("#add-error-report-bag").hide();

                                            // $('#add-report-msgs').html(msgHTML);

                                        } else {

                                            msgHTML += '<div class="alert alert-danger" role="alert">' +
                                                'SMS Sending Failed!' +
                                                '</div>';

                                            // $('#add-report-msgs').html(msgHTML);
                                        }

                                        // window.location.reload();

                                        // SEND Email 
                                        $.ajax({
                                            type: 'POST',
                                            url: sendEmailURL,
                                            data: jsonEmailData,
                                            dataType: 'json',
                                            beforeSend: function () {
                                                $("#loader").show();
                                            },
                                            success: function (data) {
                                                $('#add-report-msgs').show();

                                                console.log("smsURL -->" + data);

                                                // msgHTML = '<div class="alert alert-primary" role="alert">' +
                                                //     'Report confirmed!' +
                                                //     '</div>';

                                                $("#loader").hide();

                                                if (data.success) {

                                                    $("#add-error-report-bag").hide();

                                                    $('#add-report-msgs').html(msgHTML);

                                                } else {

                                                    msgHTML += '<div class="alert alert-danger" role="alert">' +
                                                        'Email Sending Failed!' +
                                                        '</div>';

                                                    $('#add-report-msgs').html(msgHTML);
                                                }

                                                window.location.reload();

                                            },
                                            error: function (data) {
                                                var errors = $.parseJSON(data.responseText);
                                                var status = errors.error.statusCode;

                                                if (status == 422) {
                                                    console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                                    console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                                    $("#add-report-msgs").hide();

                                                    $('#add-report-errors').html('');
                                                    $.each(errors.error.details.messages, function (key, value) {
                                                        console.log('Error Value' + value + ' Key ' + key);
                                                        $('#add-report-errors').append('<li>' + key + ' ' + value + '</li>');
                                                    });

                                                } else {
                                                    console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                                                    $('#add-report-errors').html(errors.error.message);
                                                }
                                                // hide loader
                                                $("#loader").hide();

                                                $("#add-error-report-bag").show();
                                            }
                                        }); // END Email AJax

                                    },
                                    error: function (data) {
                                        var errors = $.parseJSON(data.responseText);
                                        var status = errors.error.statusCode;

                                        if (status == 422) {
                                            console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                            console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                            $("#add-report-msgs").hide();

                                            $('#add-report-errors').html('');
                                            $.each(errors.error.details.messages, function (key, value) {
                                                console.log('Error Value' + value + ' Key ' + key);
                                                $('#add-report-errors').append('<li>' + key + ' ' + value + '</li>');
                                            });

                                        } else {
                                            console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                                            $('#add-report-errors').html(errors.error.message);
                                        }
                                        // hide loader
                                        $("#loader").hide();

                                        $("#add-error-report-bag").show();
                                    }
                                }); // END Ajax
                            },
                            error: function (data) {
                                var errors = $.parseJSON(data.responseText);
                                var status = errors.error.statusCode;

                                if (status == 422) {
                                    console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                    console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                    $("#add-report-msgs").hide();

                                    $('#add-report-errors').html('');
                                    $.each(errors.error.details.messages, function (key, value) {
                                        console.log('Error Value' + value + ' Key ' + key);
                                        $('#add-report-errors').append('<li>' + key + ' ' + value + '</li>');
                                    });

                                } else {
                                    console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                                    $('#add-report-errors').html(errors.error.message);
                                }
                                // hide loader
                                $("#loader").hide();

                                $("#add-error-report-bag").show();
                            }
                        }); //end post points ajax

                    },
                    error: function (data) {
                        var errors = $.parseJSON(data.responseText);
                        var status = errors.error.statusCode;

                        if (status == 422) {
                            console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                            console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                            $("#add-report-msgs").hide();

                            $('#add-report-errors').html('');
                            $.each(errors.error.details.messages, function (key, value) {
                                console.log('Error Value' + value + ' Key ' + key);
                                $('#add-report-errors').append('<li>' + key + ' ' + value + '</li>');
                            });

                        } else {
                            console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                            $('#add-report-errors').html(errors.error.message);
                        }
                        // hide loader
                        $("#loader").hide();

                        $("#add-error-report-bag").show();
                    }
                }); //end Get Customer Details
            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                var status = errors.error.statusCode;

                if (status == 422) {
                    console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                    console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                    $("#add-report-msgs").hide();

                    $('#add-report-errors').html('');
                    $.each(errors.error.details.messages, function (key, value) {
                        console.log('Error Value' + value + ' Key ' + key);
                        $('#add-report-errors').append('<li>' + key + ' ' + value + '</li>');
                    });

                } else {
                    console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                    $('#add-report-errors').html(errors.error.message);
                }
                // hide loader
                $("#loader").hide();

                $("#add-error-report-bag").show();
            }
        });
    }
}

/**
 * Function to confirm 
 * @param {*} reportID 
 * @param {*} BookID 
 * @param {*} ShipmentID 
 * @param {*} reportedByEmail 
 * @param {*} userRole 
 * @param {*} loggedInEmail 
 */
function updateFalseIsConfirmedReport(reportID, BookID, ShipmentID, reportedByEmail, userRole, loggedInEmail) {
    console.log("Clicked updateFalseIsConfirmedReport in helper-api");

    var domainUrl = 'http://localhost:3001/api';
    var laravelDomainUrl = 'http://localhost:8000';

    var smsReportMessage = "Report Declined for " + reportedByEmail + ". You are penalized " + penaltyPoints + " points for providing inaccurate reports counterfeit.";

    var jsonDataSMS = {
        message: smsReportMessage
    };

    var smsURL = laravelDomainUrl + '/general/sms/send/';

    // 1. Update Report isconfirmed
    var jsonData = {
        report: "resource:org.evin.book.track.Report#" + reportID,
        isConfirmed: false,
        updatedAt: currentDateTime(),
        participantInvoking: "resource:org.evin.book.track." + userRole + "#" + loggedInEmail
    };

    // Email
    var sendEmailURL = "/general/email/send/";
    var jsonEmailData = {}
    jsonEmailData = {
        'message': smsReportMessage,
        'to': reportedByEmail,
        'subject': 'Book Counterfeit Report Confirmation'
    };

    console.log("updateFalseIsConfirmedReport Data = " + JSON.stringify(jsonData));


    var getCustomerURL = postCustomerURL + "/" + reportedByEmail;

    var postCustomerScanPointsURL = domainUrl + '/updateCustomerPoints';

    var msgHTML = '';

    var confirmation = confirm("Are you sure you want to decline the report? You cannot undo after this.");

    if (confirmation) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: domainUrl + '/updateReportIsConfirmed',
            data: jsonData,
            dataType: 'json',
            beforeSend: function () {
                $("#loader").show();
                $("#add-error-report-bag").hide();
                $('#add-report-msgs').hide();
            },
            success: function (data) {


                // Get Customer Details
                $.ajax({
                    type: 'GET',
                    url: getCustomerURL,
                    beforeSend: function () {
                        //calls the loader id tag
                        $("#loader").show();
                    },
                    success: function (customerData) {
                        console.log("customerData +++> " + JSON.stringify(customerData));
                        console.log("customerData.accountBalance = " + customerData.accountBalance);
                        var postPoints = {
                            accountBalance: customerData.accountBalance - penaltyPoints,
                            customer: reportedByEmail,
                            updatedAt: currentDateTime(),
                            participantInvoking: "resource:org.evin.book.track." + userRole + "#" + loggedInEmail
                        };

                        // Add Points
                        $.ajax({
                            type: 'POST',
                            url: postCustomerScanPointsURL,
                            data: postPoints,
                            dataType: 'json',
                            beforeSend: function () {
                                //calls the loader id tag
                                $("#loader").show();
                            },
                            success: function (data) {

                                // SEND SMS 
                                $.ajax({
                                    type: 'POST',
                                    url: smsURL,
                                    data: jsonDataSMS,
                                    dataType: 'json',
                                    beforeSend: function () {
                                        $("#loader").show();
                                    },
                                    success: function (data) {


                                        console.log("smsURL -->" + data);

                                        msgHTML = '<div class="alert alert-primary" role="alert">' +
                                            'Report declined!' +
                                            '</div>';

                                        if (data.success) {

                                            $("#add-error-report-bag").hide();

                                            // $('#add-report-msgs').html(msgHTML);

                                        } else {

                                            msgHTML += '<div class="alert alert-danger" role="alert">' +
                                                'SMS Sending Failed!' +
                                                '</div>';

                                            // $('#add-report-msgs').html(msgHTML);
                                        }

                                        // window.location.reload();

                                        // SEND Email 
                                        $.ajax({
                                            type: 'POST',
                                            url: sendEmailURL,
                                            data: jsonEmailData,
                                            dataType: 'json',
                                            beforeSend: function () {
                                                $("#loader").show();
                                            },
                                            success: function (data) {
                                                $('#add-report-msgs').show();

                                                console.log("smsURL -->" + data);

                                                // msgHTML = '<div class="alert alert-primary" role="alert">' +
                                                //     'Report confirmed!' +
                                                //     '</div>';

                                                $("#loader").hide();

                                                if (data.success) {

                                                    $("#add-error-report-bag").hide();

                                                    $('#add-report-msgs').html(msgHTML);

                                                } else {

                                                    msgHTML += '<div class="alert alert-danger" role="alert">' +
                                                        'Email Sending Failed!' +
                                                        '</div>';

                                                    $('#add-report-msgs').html(msgHTML);
                                                }

                                                window.location.reload();

                                            },
                                            error: function (data) {
                                                var errors = $.parseJSON(data.responseText);
                                                var status = errors.error.statusCode;

                                                if (status == 422) {
                                                    console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                                    console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                                    $("#add-report-msgs").hide();

                                                    $('#add-report-errors').html('');
                                                    $.each(errors.error.details.messages, function (key, value) {
                                                        console.log('Error Value' + value + ' Key ' + key);
                                                        $('#add-report-errors').append('<li>' + key + ' ' + value + '</li>');
                                                    });

                                                } else {
                                                    console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                                                    $('#add-report-errors').html(errors.error.message);
                                                }
                                                // hide loader
                                                $("#loader").hide();

                                                $("#add-error-report-bag").show();
                                            }
                                        }); // END Email AJax

                                    },
                                    error: function (data) {
                                        var errors = $.parseJSON(data.responseText);
                                        var status = errors.error.statusCode;

                                        if (status == 422) {
                                            console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                            console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                            $("#add-report-msgs").hide();

                                            $('#add-report-errors').html('');
                                            $.each(errors.error.details.messages, function (key, value) {
                                                console.log('Error Value' + value + ' Key ' + key);
                                                $('#add-report-errors').append('<li>' + key + ' ' + value + '</li>');
                                            });

                                        } else {
                                            console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                                            $('#add-report-errors').html(errors.error.message);
                                        }
                                        // hide loader
                                        $("#loader").hide();

                                        $("#add-error-report-bag").show();
                                    }
                                }); // END Ajax
                            },
                            error: function (data) {
                                var errors = $.parseJSON(data.responseText);
                                var status = errors.error.statusCode;

                                if (status == 422) {
                                    console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                    console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                    $("#add-report-msgs").hide();

                                    $('#add-report-errors').html('');
                                    $.each(errors.error.details.messages, function (key, value) {
                                        console.log('Error Value' + value + ' Key ' + key);
                                        $('#add-report-errors').append('<li>' + key + ' ' + value + '</li>');
                                    });

                                } else {
                                    console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                                    $('#add-report-errors').html(errors.error.message);
                                }
                                // hide loader
                                $("#loader").hide();

                                $("#add-error-report-bag").show();
                            }
                        }); //end post points ajax

                    },
                    error: function (data) {
                        var errors = $.parseJSON(data.responseText);
                        var status = errors.error.statusCode;

                        if (status == 422) {
                            console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                            console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                            $("#add-report-msgs").hide();

                            $('#add-report-errors').html('');
                            $.each(errors.error.details.messages, function (key, value) {
                                console.log('Error Value' + value + ' Key ' + key);
                                $('#add-report-errors').append('<li>' + key + ' ' + value + '</li>');
                            });

                        } else {
                            console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                            $('#add-report-errors').html(errors.error.message);
                        }
                        // hide loader
                        $("#loader").hide();

                        $("#add-error-report-bag").show();
                    }
                }); //end Get Customer Details

            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                var status = errors.error.statusCode;

                if (status == 422) {
                    console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                    console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                    $("#add-report-msgs").hide();

                    $('#add-report-errors').html('');
                    $.each(errors.error.details.messages, function (key, value) {
                        console.log('Error Value' + value + ' Key ' + key);
                        $('#add-report-errors').append('<li>' + key + ' ' + value + '</li>');
                    });

                } else {
                    console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                    $('#add-report-errors').html(errors.error.message);
                }
                // hide loader
                $("#loader").hide();

                $("#add-error-report-bag").show();
            }
        });
    }


}

/**
 * FUnction to purchase book
 * @param {*} purchaseRequestID 
 * @param {*} BookID 
 * @param {*} ShipmentID 
 * @param {*} customerEmail 
 */
function updatePurchaseRequest(purchaseRequestID, BookID, ShipmentID, customerEmail, userRole, loggedInEmail) {
    console.log("Clicked updatePurchaseRequest");

    var domainUrl = 'http://localhost:3001/api';
    var laravelDomainUrl = 'http://localhost:8000';

    var smsPurchaseMessage = "Purchase Completed for " + customerEmail + ". Thank you for using book counterfeit app";

    var jsonDataSMS = {
        message: smsPurchaseMessage
    };

    var smsURL = laravelDomainUrl + '/general/sms/send/';

    // 1. Update Purchase Request
    var jsonData = {
        purchaseRequest: "resource:org.evin.book.track.PurchaseRequest#" + purchaseRequestID,
        status: true,
        updatedAt: currentDateTime(),
        participantInvoking: "resource:org.evin.book.track." + userRole + "#" + loggedInEmail
    };

    // 2. Update Book as sold in its flag
    var jsonDataBook = {
        book: "resource:org.evin.book.track.Book#" + BookID,
        sold: true,
        updatedAt: currentDateTime(),
        participantInvoking: "resource:org.evin.book.track." + userRole + "#" + loggedInEmail
    };

    // 3. Update Final Owner in Supply Chain
    var jsonDataShipOwnership = {
        owner: "resource:org.evin.book.track.Customer#" + customerEmail,
        shipment: "resource:org.evin.book.track.Shipment#" + ShipmentID,
        updatedAt: currentDateTime(),
        participantInvoking: "resource:org.evin.book.track." + userRole + "#" + loggedInEmail
    };

    var msgHTML = '';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: domainUrl + '/updatePurchaseRequestStatus',
        data: jsonData,
        dataType: 'json',
        beforeSend: function () {
            $("#loader").show();
            $("#add-error-request-bag").hide();
            $('#add-request-msgs').hide();
        },
        success: function (data) {

            // Update Book sold
            $.ajax({
                type: 'POST',
                url: domainUrl + '/updateBookSold',
                data: jsonDataBook,
                dataType: 'json',
                beforeSend: function () {
                    $("#loader").show();
                    $("#add-error-request-bag").hide();
                    $('#add-request-msgs').hide();
                },
                success: function (data) {

                    // SEND SMS 
                    $.ajax({
                        type: 'POST',
                        url: smsURL,
                        data: jsonDataSMS,
                        dataType: 'json',
                        beforeSend: function () {
                            $("#loader").show();
                        },
                        success: function (data) {
                            $("#loader").hide();
                            console.log(data);
                            $("#add-error-request-bag").hide();
                            $('#add-request-msgs').show();
                            msgHTML = '<div class="alert alert-primary" role="alert">' +
                                'Request confirmed!' +
                                '</div>';

                            $('#add-request-msgs').html(msgHTML);

                            window.location.reload();

                        },
                        error: function (data) {
                            var errors = $.parseJSON(data.responseText);
                            var status = errors.error.statusCode;

                            if (status == 422) {
                                console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                $("#add-request-msgs").hide();

                                $('#add-request-errors').html('');
                                $.each(errors.error.details.messages, function (key, value) {
                                    console.log('Error Value' + value + ' Key ' + key);
                                    $('#add-request-errors').append('<li>' + key + ' ' + value + '</li>');
                                });

                            } else {
                                console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                                $('#add-request-errors').html(errors.error.message);
                            }
                            // hide loader
                            $("#loader").hide();

                            $("#add-error-request-bag").show();
                        }
                    }); // END Ajax
                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;

                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#add-request-msgs").hide();

                        $('#add-request-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#add-request-errors').append('<li>' + key + ' ' + value + '</li>');
                        });

                    } else {
                        console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                        $('#add-request-errors').html(errors.error.message);
                    }
                    // hide loader
                    $("#loader").hide();

                    $("#add-error-request-bag").show();
                }
            });
        },
        error: function (data) {
            var errors = $.parseJSON(data.responseText);
            var status = errors.error.statusCode;

            if (status == 422) {
                console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                $("#add-request-msgs").hide();

                $('#add-request-errors').html('');
                $.each(errors.error.details.messages, function (key, value) {
                    console.log('Error Value' + value + ' Key ' + key);
                    $('#add-request-errors').append('<li>' + key + ' ' + value + '</li>');
                });

            } else {
                console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                $('#add-request-errors').html(errors.error.message);
            }
            // hide loader
            $("#loader").hide();

            $("#add-error-request-bag").show();
        }
    });
}

/**
 * FUnction to purchase book
 * @param {*} purchaseRequestID 
 * @param {*} BookID 
 * @param {*} ShipmentID 
 * @param {*} customerEmail 
 */
function updatePurchaseRequestDeclined(purchaseRequestID, BookID, ShipmentID, customerEmail, userRole, loggedInEmail) {
    console.log("Clicked updatePurchaseRequestDeclined");

    var domainUrl = 'http://localhost:3001/api';
    var laravelDomainUrl = 'http://localhost:8000';

    var smsPurchaseMessage = "Purchase Declined for " + customerEmail + ". You have been warned not use purchase Request recklessly";

    var jsonDataSMS = {
        message: smsPurchaseMessage
    };

    var smsURL = laravelDomainUrl + '/general/sms/send/';

    // 1. Update Purchase Request
    var jsonData = {
        purchaseRequest: "resource:org.evin.book.track.PurchaseRequest#" + purchaseRequestID,
        status: false,
        updatedAt: currentDateTime(),
        participantInvoking: "resource:org.evin.book.track." + userRole + "#" + loggedInEmail
    };


    var msgHTML = '';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: domainUrl + '/updatePurchaseRequestStatus',
        data: jsonData,
        dataType: 'json',
        beforeSend: function () {
            $("#loader").show();
            $("#add-error-request-bag").hide();
            $('#add-request-msgs').hide();
        },
        success: function (data) {


            // SEND SMS 
            $.ajax({
                type: 'POST',
                url: smsURL,
                data: jsonDataSMS,
                dataType: 'json',
                beforeSend: function () {
                    $("#loader").show();
                },
                success: function (data) {
                    $("#loader").hide();
                    console.log(data);
                    $("#add-error-request-bag").hide();
                    $('#add-request-msgs').show();
                    msgHTML = '<div class="alert alert-success" role="alert">' +
                        'Request Declined!' +
                        '</div>';
        
                    $('#add-request-msgs').html(msgHTML);
        
                    window.location.reload();

                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;

                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#add-request-msgs").hide();

                        $('#add-request-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#add-request-errors').append('<li>' + key + ' ' + value + '</li>');
                        });

                    } else {
                        console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                        $('#add-request-errors').html(errors.error.message);
                    }
                    // hide loader
                    $("#loader").hide();

                    $("#add-error-request-bag").show();
                }
            }); // END Ajax
        },
        error: function (data) {
            var errors = $.parseJSON(data.responseText);
            var status = errors.error.statusCode;

            if (status == 422) {
                console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                $("#add-request-msgs").hide();

                $('#add-request-errors').html('');
                $.each(errors.error.details.messages, function (key, value) {
                    console.log('Error Value' + value + ' Key ' + key);
                    $('#add-request-errors').append('<li>' + key + ' ' + value + '</li>');
                });

            } else {
                console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                $('#add-request-errors').html(errors.error.message);
            }
            // hide loader
            $("#loader").hide();

            $("#add-error-request-bag").show();
        }
    });
}

/**
 * 
 * @param {*} reportID 
 */
function traceReportConfirmation(reportID) {

    console.log("Clicked traceReportConfirmation ID => " + reportID);

    var msgHTML = '';

    var getIsConfimedReportHistorianURL = domainUrl + "/queries/getIsConfimedReportHistorian?report=resource%3Aorg.evin.book.track.Report%23" + reportID;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // SEND SMS 
    $.ajax({
        type: 'GET',
        url: getIsConfimedReportHistorianURL,
        beforeSend: function () {
            $("#loader").show();
        },
        success: function (data) {
            $("#loader").hide();
            console.log(data);
            // $("#add-error-request-bag").hide();
            // $('#add-request-msgs').show();
            // msgHTML = '<div class="alert alert-primary" role="alert">' +
            //     'Request confirmed!' +
            //     '</div>';

            // $('#add-request-msgs').html(msgHTML);

            // window.location.reload();

        },
        error: function (data) {
            var errors = $.parseJSON(data.responseText);
            var status = errors.error.statusCode;

            if (status == 422) {
                console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                $("#add-report-msgs").hide();

                $('#add-report-errors').html('');
                $.each(errors.error.details.messages, function (key, value) {
                    console.log('Error Value' + value + ' Key ' + key);
                    $('#add-report-errors').append('<li>' + key + ' ' + value + '</li>');
                });

            } else {
                console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                $('#add-report-errors').html(errors.error.message);
            }
            // hide loader
            $("#loader").hide();

            $("#add-error-report-bag").show();
        }
    }); // END Ajax

}

