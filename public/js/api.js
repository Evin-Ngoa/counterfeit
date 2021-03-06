var Api = function () {
    var scanPoints = 2.0;
    var reportPoints = 5.0;
    var penaltyPoints = 20.0;
    var conversion = 10.0;
    var maxAllowedPoints = 400;

    // http://localhost:3000/api/Book
    var systemEmail = 'order@bookcounterfeit.com';
    var domainUrl = 'http://localhost:3001/api';
    var postBookURL = domainUrl + '/Book';
    var laravelDomain = 'http://localhost:8000';
    var getVerifyBookURL = domainUrl + '/Book/';
    var postBookShipmentURL = domainUrl + '/BookRegisterShipment';
    var postOrderURL = domainUrl + '/OrderContract';
    var postShipmentURL = domainUrl + '/Shipment';
    var updateOrderStatusURL = domainUrl + '/updateOrderStatus';
    var shipOwnershipURL = domainUrl + '/ShipOwnership';
    var postPublisherURL = domainUrl + '/Publisher';
    var postDistributorURL = domainUrl + '/Distributor';
    var postCustomerURL = domainUrl + '/Customer';
    var postCustomerReviewURL = domainUrl + '/updateShipmentReview';
    var postReportviewURL = domainUrl + '/Report';
    var postCustomerScanPointsURL = domainUrl + '/updateCustomerPoints';
    var postPublisherScanPointsURL = domainUrl + '/updatePublisherPoints';
    var postBuyBookURL = domainUrl + '/PurchaseRequest';

    // var postBookURL = '/book';

    /**
     * Forms
     */
    // Book
    var bookForm = $("#book_form");
    var bookVerifyForm = $("#verify_form");
    var bookVerifyFormOthers = $("#verify_form_others");
    var bookShipmentForm = $("#frmregisterBookShipment");
    var frmEditBook = $("#frmEditBook");

    // Transaction
    var transactionForm = $("#transaction_form");

    // Order
    var frmAddOrder = $("#frmAddOrder");
    var frmEditOrder = $("#frmEditOrder");

    // Shipment
    var frmAddShipment = $("#frmAddShipment");
    var frmEditShipment = $("#frmEditShipment");

    // Publisher
    var frmAddPublisher = $("#frmAddPublisher");
    var frmEditPublisher = $("#frmEditPublisher");
    var frmDeletePublisher = $("#frmDeletePublisher");

    // Distributor
    var frmAddDistributor = $("#frmAddDistributor");
    var frmEditDistributor = $("#frmEditDistributor");
    var frmDeleteDistributor = $("#frmDeleteDistributor");

    // Customer
    var frmAddCustomer = $("#frmAddCustomer");
    var frmEditCustomer = $("#frmEditCustomer");
    var frmAddReview = $("#frmAddReview");

    // Profile
    var frmProfile = $("#frmProfile");

    // Report
    var frmReport = $("#frmReport");
    var frmReportOthers = $("#frmReportOthers");

    // Login
    var frmLogin = $("#frmLogin");

    var frmRegister = $("#frmRegister");

    // Buy Book
    var frmBuyBook = $("#frmBuyBook");

    var frmVerifyBookShop = $("#verify_bookshop");

    // Buttons
    var bookSbtBtn = $('#book_form .btn-add-book');
    var bookVerifySbtBtn = $('#verify_form .btn-verify-book');
    var bookVerifySbtBtnOthers = $('#verify_form_others .btn-verify-book-others');
    var bookShipmentSbtBtn = $('#frmregisterBookShipment .btn-add-book-shipment');
    var bookEditSbtBtn = $('#frmEditBook .btn-edit-book');
    var bookDeleteSbtBtn = $('#frmDeleteBook .btn-delete-book');
    var loginSbtBtn = $('#frmLogin .btn-login');
    var registerSbtBtn = $('#frmRegister .btn-register');

    var orderSbtBtn = $('#frmAddOrder .btn-add-order');
    var orderEditSbtBtn = $('#frmEditOrder .btn-edit-order');
    var orderDeleteSbtBtn = $('#frmDeleteOrder .btn-delete-order');

    var shipmentSbtBtn = $('#frmAddShipment .btn-add-shipment');
    var shipmentEditSbtBtn = $('#frmEditShipment .btn-edit-shipment');
    var shipmentSelectDistributorSbtBtn = $('#frmSelectDistributor .btn-add-ship-ownership');

    var publisherSbtBtn = $('#frmAddPublisher .btn-add-publisher');
    var publisherEditSbtBtn = $('#frmEditPublisher .btn-edit-publisher');
    var publisherDeleteSbtBtn = $('#frmDeletePublisher .btn-delete-publisher');

    var distributorSbtBtn = $('#frmAddDistributor .btn-add-distributor');
    var distributorEditSbtBtn = $('#frmEditDistributor .btn-edit-distributor');
    var distributorDeleteSbtBtn = $('#frmDeleteDistributor .btn-delete-distributor');

    var customerSbtBtn = $('#frmAddCustomer .btn-add-customer');
    var customerEditSbtBtn = $('#frmEditCustomer .btn-edit-customer');
    var customerDeleteSbtBtn = $('#frmDeleteCustomer .btn-delete-customer');

    var profileEditSbtBtn = $('#frmProfile .btn-profile');

    var reportPostSbtBtn = $('#frmReport .btn-report');
    var reportPostSbtBtnOthers = $('#frmReportOthers .btn-report-others');
    var buyBookPostSbtBtn = $('#frmBuyBook .btn-buy-book');

    var customerReviewSbtBtn = $('#frmAddReview .btn-add-review');

    var customerReviewSbtBtn = $('#frmAddReview .btn-add-review');

    var transactionHistorySbtBtn = $('#transaction_form .btn-transaction-history');

    var verifyBookShopSbtBtn = $('#verify_bookshop .btn-verify-bookshop');

    /**
     * Handle Booshop Verification
     */
    var handleBookShopVerification = function () {
        console.log("handleBookShopVerification");

        verifyBookShopSbtBtn.on('click', function () {
            var json = frmVerifyBookShop.serializeArray();

            var jsonData = {};

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            var bookshopID = jsonData["bookshop_id"];

            var getBookShopURL = domainUrl + "/queries/getCustomerEmailonMemberID?memberId=" + bookshopID;

            var msgBodyHTML = '';
            var msgHeaderHTML = '';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Updating Customer Point
            $.ajax({
                type: 'GET',
                url: getBookShopURL,
                dataType: 'json',
                beforeSend: function () {
                    //calls the loader id tag
                    $("#loader").show();
                },
                success: function (bookShopData) {
                    console.log("bookShopData => " + JSON.stringify(bookShopData));
                    console.log("bookShopData Size => " + bookShopData.length);

                    $("#loader").hide();

                    if (bookShopData.length > 0) {
                        msgHeaderHTML +=  '<tr>'
                        + '<td class="text-center">Customer ID </td>'
                        + '<td class="text-center">Name</td>'
                        + '<td class="text-center">Email</td>'
                        + '<td class="text-center">Address</td>'
                        + '</tr>';

                        msgBodyHTML += '<tr>'
                            + '<td>' + bookShopData[0].memberId + '</td>'
                            + '<td>' + bookShopData[0].firstName + '</td>'
                            + '<td>' + bookShopData[0].email + '</td>'
                            + '<td>' + bookShopData[0].address.street + ' ' + bookShopData[0].address.county + ', ' + bookShopData[0].address.country  + '</td>'
                            + '</tr>';
                    } else {
                        msgHeaderHTML +=  '<tr>'
                        + '<td class="text-center"> Warning </td>'
                        + '</tr>';

                        msgBodyHTML += '<tr>'
                            + '<td> The BookShop does not exist. Not a registered retail bookshop. Re-check the Bookshop ID or resist buying from the shop. </td>'
                            + '</tr>';
                    }

                    $("#bookshop_header").html(msgHeaderHTML);
                    $("#bookshop").html(msgBodyHTML);

                    $('#bookShopViewModal').modal('show');

                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;

                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#verify-bookshop-msgs").hide();

                        $('#verify-bookshop-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#verify-bookshop-errors').append('<li>' + key + ' ' + value + '</li>');
                        });

                    } else {
                        console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                        $('#verify-bookshop-errors').html(errors.error.message);
                    }
                    // hide loader
                    $("#loader").hide();

                    $("#verify-error-bag").show();
                }
            }); // END Ajax
        });
    };

    /**
     * Posting the book purchase form
     */
    var handleBuyBook = function () {
        console.log("handleBuyBook");

        $("#add-error-buy-book-bag").hide();
        var buyBookId = "P-" + randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

        buyBookPostSbtBtn.on('click', function () {
            var json = frmBuyBook.serializeArray();

            var jsonData = {};

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            var bookID = jsonData["book"];

            var book = "resource:org.evin.book.track.Book#" + bookID;
            var purchasedBy = "resource:org.evin.book.track.Customer#" + jsonData["purchasedBy"];
            var purchasedTo = "resource:org.evin.book.track.Customer#" + jsonData["purchasedTo"];

            var customerID = jsonData["purchasedBy"];
            var bookShopID = jsonData["purchasedTo"];

            // Add the points to here
            var PurchasedToPoints = jsonData["purchasedToPoints"];
            var indCustomerPoints = jsonData["indCustomerPoints"];
            var newPrice = jsonData["newPrice"];

            delete jsonData["purchasedToMemberId"];
            delete jsonData["purchasedToPoints"];
            delete jsonData["newPrice"];
            delete jsonData["indCustomerPoints"];

            console.log("PurchasedToPoints => " + PurchasedToPoints);
            console.log("newPrice => " + newPrice);
            // Add update time
            jsonData["createdAt"] = currentDateTime();
            // Append ID
            jsonData["id"] = buyBookId;
            jsonData["book"] = book;
            jsonData["purchasedBy"] = purchasedBy;
            jsonData["purchasedTo"] = purchasedTo;

            var bookPoints = jsonData["bookPoints"];

            delete jsonData["bookPoints"];

            if (jsonData["usedPoints"] == "1") {
                jsonData["usedPoints"] = true;
                // 0. Get Customer and bookshop points
                // 1. Minus For customer
                // 2. Add For bookshop


                // Add points to bookshop
                var totalBookShopPoints = parseInt(PurchasedToPoints) + parseInt(bookPoints);
                var totalCustomerPoints = parseInt(indCustomerPoints) - parseInt(bookPoints);

                console.log(PurchasedToPoints + " + " + bookPoints + " = totalCustomerPoints = " + totalBookShopPoints);
                console.log(indCustomerPoints + " - " + bookPoints + " = totalCustomerPoints = " + totalCustomerPoints);

                var customerPointsObj = {
                    accountBalance: totalCustomerPoints,
                    customer: customerID,
                    updatedAt: currentDateTime(),
                    participantInvoking: "resource:org.evin.book.track.Customer#" + customerID
                };
                var bookshopPointsObj = {
                    accountBalance: totalBookShopPoints,
                    customer: bookShopID,
                    updatedAt: currentDateTime(),
                    participantInvoking: "resource:org.evin.book.track.Customer#" + bookShopID
                };


                console.log("JSONDATA = " + JSON.stringify(jsonData));
                console.log("customerPointsObj = " + JSON.stringify(customerPointsObj));
                console.log("bookshopPointsObj = " + JSON.stringify(bookshopPointsObj));

                var msgHTML = "";

                var smsApprovalMessage = "Confirm Purchase Request for book " + bookID + " by " + customerID + ". Awaiting Approval!";

                var jsonDataSMS = {
                    message: smsApprovalMessage
                };

                console.log("bookID = " + bookID + " purchasedBy = " + customerID + " smsApprovalMessage = " + smsApprovalMessage);

                var smsURL = laravelDomain + '/general/sms/send/';

                delete jsonData["bookPoints"];

                // Error if customer has less points
                console.log("indCustomerPoints [" + indCustomerPoints + "] < bookPoints [" + bookPoints + "]");
                if (parseInt(indCustomerPoints) < parseInt(bookPoints)) {

                    // hide loader
                    $("#loader").hide();

                    var msgHTML = 'You dont have enough points to redeem.';

                    $('#add-buy-book-errors').html(msgHTML);

                    $("#add-error-buy-book-bag").show();

                } else {
                    $("#add-error-buy-book-bag").hide();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });


                    // Updating Customer Points
                    $.ajax({
                        type: 'POST',
                        url: postCustomerScanPointsURL,
                        data: customerPointsObj,
                        dataType: 'json',
                        beforeSend: function () {
                            //calls the loader id tag
                            $("#loader").show();
                        },
                        success: function (customerPointData) {

                            console.log("Success customerPointData = " + JSON.stringify(customerPointData));

                            // Updating BookStore Points
                            $.ajax({
                                type: 'POST',
                                url: postCustomerScanPointsURL,
                                data: bookshopPointsObj,
                                dataType: 'json',
                                beforeSend: function () {
                                    //calls the loader id tag
                                    $("#loader").show();
                                },
                                success: function (bookshopPointData) {
                                    $("#loader").hide();

                                    console.log("Success bookshopPointData = " + JSON.stringify(bookshopPointData));

                                    // send Purchase Request
                                    $.ajax({
                                        type: 'POST',
                                        url: postBuyBookURL,
                                        data: jsonData,
                                        dataType: 'json',
                                        beforeSend: function () {
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
                                                    // hide loader
                                                    $("#loader").hide();
                                                    console.log("Success +++> " + JSON.stringify(data));
                                                    $("#add-error-buy-book-bag").hide();
                                                    $("#add-buy-book-msgs").show();

                                                    msgHTML = '<div class="alert alert-primary" role="alert">'
                                                        + 'Request sent successfully. Await Approval from the store.'
                                                        + '</div>';

                                                    $('#add-buy-book-msgs').html(msgHTML);

                                                    // window.location.reload();

                                                },
                                                error: function (data) {
                                                    var errors = $.parseJSON(data.responseText);
                                                    var status = errors.error.statusCode;

                                                    if (status == 422) {
                                                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                                        $("#add-buy-book-msgs").hide();

                                                        $('#add-buy-book-errors').html('');
                                                        $.each(errors.error.details.messages, function (key, value) {
                                                            console.log('Error Value' + value + ' Key ' + key);
                                                            $('#add-buy-book-errors').append('<li>' + key + ' ' + value + '</li>');
                                                        });

                                                    } else {
                                                        console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                                                        $('#add-buy-book-errors').html(errors.error.message);
                                                    }
                                                    // hide loader
                                                    $("#loader").hide();

                                                    $("#add-error-buy-book-bag").show();
                                                }
                                            }); // END Ajax

                                        },
                                        error: function (data) {
                                            var errors = $.parseJSON(data.responseText);
                                            var status = errors.error.statusCode;

                                            if (status == 422) {
                                                console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                                console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                                $("#add-buy-book-msgs").hide();

                                                $('#add-buy-book-errors').html('');
                                                $.each(errors.error.details.messages, function (key, value) {
                                                    console.log('Error Value' + value + ' Key ' + key);
                                                    $('#add-buy-book-errors').append('<li>' + key + ' ' + value + '</li>');
                                                });

                                            } else {
                                                console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                                                $('#add-buy-book-errors').html(errors.error.message);
                                            }
                                            // hide loader
                                            $("#loader").hide();

                                            $("#add-error-buy-book-bag").show();
                                        }
                                    }); // END Ajax
                                },
                                error: function (data) {
                                    var errors = $.parseJSON(data.responseText);
                                    var status = errors.error.statusCode;

                                    if (status == 422) {
                                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                        $("#add-buy-book-msgs").hide();

                                        $('#add-buy-book-errors').html('');
                                        $.each(errors.error.details.messages, function (key, value) {
                                            console.log('Error Value' + value + ' Key ' + key);
                                            $('#add-buy-book-errors').append('<li>' + key + ' ' + value + '</li>');
                                        });

                                    } else {
                                        console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                                        $('#add-buy-book-errors').html(errors.error.message);
                                    }
                                    // hide loader
                                    $("#loader").hide();

                                    $("#add-error-buy-book-bag").show();
                                }
                            }); // END Ajax

                        },
                        error: function (data) {
                            var errors = $.parseJSON(data.responseText);
                            var status = errors.error.statusCode;

                            if (status == 422) {
                                console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                $("#add-buy-book-msgs").hide();

                                $('#add-buy-book-errors').html('');
                                $.each(errors.error.details.messages, function (key, value) {
                                    console.log('Error Value' + value + ' Key ' + key);
                                    $('#add-buy-book-errors').append('<li>' + key + ' ' + value + '</li>');
                                });

                            } else {
                                console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                                $('#add-buy-book-errors').html(errors.error.message);
                            }
                            // hide loader
                            $("#loader").hide();

                            $("#add-error-buy-book-bag").show();
                        }
                    }); // END Ajax
                } // end if if(indCustomerPoints < bookPoints){

            } else {

                var msgHTML = "";

                var smsApprovalMessage = "Confirm Purchase Request for book " + bookID + " by " + customerID + ". Awaiting Approval!";

                var jsonDataSMS = {
                    message: smsApprovalMessage
                };

                console.log("bookID = " + bookID + " purchasedBy = " + customerID + " smsApprovalMessage = " + smsApprovalMessage);

                var smsURL = laravelDomain + '/general/sms/send/';

                delete jsonData["bookPoints"];

                // console.log("EDIT JSON SENT => " + JSON.stringify(jsonData));

                console.log("JSONDATA2 false = " + JSON.stringify(jsonData));

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: postBuyBookURL,
                    data: jsonData,
                    dataType: 'json',
                    beforeSend: function () {
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
                                // hide loader
                                $("#loader").hide();
                                console.log("Success +++> " + JSON.stringify(data));
                                $("#add-error-buy-book-bag").hide();
                                $("#add-buy-book-msgs").show();

                                msgHTML = '<div class="alert alert-primary" role="alert">'
                                    + 'Request sent successfully. Await Approval from the store.'
                                    + '</div>';

                                $('#add-buy-book-msgs').html(msgHTML);

                                // window.location.reload();

                            },
                            error: function (data) {
                                var errors = $.parseJSON(data.responseText);
                                var status = errors.error.statusCode;

                                if (status == 422) {
                                    console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                    console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                    $("#add-buy-book-msgs").hide();

                                    $('#add-buy-book-errors').html('');
                                    $.each(errors.error.details.messages, function (key, value) {
                                        console.log('Error Value' + value + ' Key ' + key);
                                        $('#add-buy-book-errors').append('<li>' + key + ' ' + value + '</li>');
                                    });

                                } else {
                                    console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                                    $('#add-buy-book-errors').html(errors.error.message);
                                }
                                // hide loader
                                $("#loader").hide();

                                $("#add-error-buy-book-bag").show();
                            }
                        }); // END Ajax

                    },
                    error: function (data) {
                        var errors = $.parseJSON(data.responseText);
                        var status = errors.error.statusCode;

                        if (status == 422) {
                            console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                            console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                            $("#add-buy-book-msgs").hide();

                            $('#add-buy-book-errors').html('');
                            $.each(errors.error.details.messages, function (key, value) {
                                console.log('Error Value' + value + ' Key ' + key);
                                $('#add-buy-book-errors').append('<li>' + key + ' ' + value + '</li>');
                            });

                        } else {
                            console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                            $('#add-buy-book-errors').html(errors.error.message);
                        }
                        // hide loader
                        $("#loader").hide();

                        $("#add-error-buy-book-bag").show();
                    }
                }); // END Ajax



            } // end if (jsonData["usedPoints"] == "1")


        }); // END Onclick Submit

    };

    /**
     * 
     * https://stackoverflow.com/questions/20481141/jquery-change-json-data-in-cookie
     * updates cookie and sends accountBaalnce
     */
    var handlePostReport = function () {
        console.log("handlePostReview");
        $("#add-error-bag").hide();
        var reportId = "Re_" + randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

        reportPostSbtBtn.on('click', function () {
            var json = frmReport.serializeArray();
            var jsonData = {};

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });
            var loggedInUserEmail = jsonData["reportedBy"];
            var book = jsonData["book"];
            var reportedBy = "resource:org.evin.book.track.Customer#" + jsonData["reportedBy"];
            var reportedTo = jsonData["reportedTo"];
            var store = jsonData["store"];

            var getCustomerURL = postCustomerURL + "/" + loggedInUserEmail;

            var getCustomerEmailURL = domainUrl + "/queries/getCustomerEmailonMemberID?memberId=" + store;

            console.log("loggedInUserEmail ==> " + loggedInUserEmail);

            // Append ID
            jsonData["id"] = reportId;
            jsonData["book"] = "resource:org.evin.book.track.Book#" + book;
            jsonData["reportedBy"] = reportedBy;
            jsonData["reportedTo"] = "resource:org.evin.book.track.Publisher#" + reportedTo;
            // jsonData["store"] = "resource:org.evin.book.track.Customer#" + store;

            console.log("JSON SENT => " + JSON.stringify(jsonData));

            // Add  created time
            jsonData["createdAt"] = currentDateTime();

            var msgHTML = "";

            $("#add-error-report-bag").hide();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Get Customer Email Based on MemberID
            $.ajax({
                type: 'GET',
                url: getCustomerEmailURL,
                beforeSend: function () {
                    //calls the loader id tag
                    $("#loader").show();
                },
                success: function (customerEmailData) {
                    console.log("customerEmailData +++> " + JSON.stringify(customerEmailData[0]));

                    console.log("customerEmailData SIZE==  = " + customerEmailData.length);

                    console.log("Final jsonData => " + JSON.stringify(jsonData));

                    if (customerEmailData.length == 0) {
                        $("#loader").hide();

                        msgHTML = '<div class="alert alert-danger" role="alert">'
                            + 'The store ' + store + ' does not exist. Kindly re-check the code.'
                            + '</div>';

                        $('#add-review-msgs').html(msgHTML);

                    } else {

                        console.log("customerEmailData.email = " + customerEmailData[0].email);

                        var customerEmail = customerEmailData[0].email;

                        jsonData["store"] = "resource:org.evin.book.track.Customer#" + customerEmail;

                        // Report Book
                        $.ajax({
                            type: 'POST',
                            url: postReportviewURL,
                            data: jsonData,
                            dataType: 'json',
                            beforeSend: function () {
                                //calls the loader id tag
                                $("#loader").show();
                            },
                            success: function (data) {

                                $("#loader").hide();
                                console.log("Success +++> " + JSON.stringify(data));
                                $("#add-error-report-bag").hide();
                                $("#add-review-msgs").show();
                                msgHTML = '<div class="alert alert-primary" role="alert">'
                                    + 'Report Sent Successfuly. You will earn extra ' + reportPoints + ' points once verified by publisher. Thank you for helping in fighting counterfeit.'
                                    + '</div>';

                                $('#add-review-msgs').html(msgHTML);

                                // window.location.reload();

                            },
                            error: function (data) {
                                var errors = $.parseJSON(data.responseText);
                                var status = errors.error.statusCode;

                                if (status == 422) {
                                    console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                    console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                    $("#add-review-msgs").hide();

                                    $('#add-review-errors').html('');
                                    $.each(errors.error.details.messages, function (key, value) {
                                        console.log('Error Value' + value + ' Key ' + key);
                                        $('#add-review-errors').append('<li>' + key + ' ' + value + '</li>');
                                    });

                                } else {
                                    console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                                    $('#add-review-errors').html(errors.error.message);
                                }
                                // hide loader
                                $("#loader").hide();

                                // Show modal to display error showed
                                $("#add-error-report-bag").show();
                            }
                        });
                    }
                },
                error: function (data) {
                    $("#loader").hide();
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;

                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#add-book-msgs").hide();

                        $('#add-book-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#add-book-errors').append('<li>' + key + ' ' + value + '</li>');
                        });

                    } else {
                        console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                        $('#add-book-errors').html(errors.error.message);
                        // $('#add-book-errors').html('<li>WARNING!!! The Book is a possible counterfeit.</li>');
                    }
                    // hide loader
                    $("#loader").hide();

                    // Show modal to display error showed
                    $('#addBookModal').modal('show');
                    $("#add-error-bag").show();
                }
            }); //end Get Customer Email Based on MemberID

        });
    };

    /**
 * 
 * https://stackoverflow.com/questions/20481141/jquery-change-json-data-in-cookie
 * updates cookie and sends accountBaalnce
 */
    var handlePostReportOthers = function () {
        console.log("handlePostReportOthers");
        $("#add-error-bag").hide();
        var reportId = "Re_" + randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

        reportPostSbtBtnOthers.on('click', function () {
            var json = frmReportOthers.serializeArray();
            var jsonData = {};

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });
            var loggedInUserEmail = jsonData["reportedBy"];
            var book = jsonData["book"];
            var reportedBy = "resource:org.evin.book.track.Customer#" + jsonData["reportedBy"];
            var reportedTo = jsonData["reportedTo"];
            var store = jsonData["store"];

            var getCustomerEmailURL = domainUrl + "/queries/getCustomerEmailonMemberID?memberId=" + store;

            console.log("loggedInUserEmail ==> " + loggedInUserEmail);

            // Append ID
            jsonData["id"] = reportId;
            jsonData["book"] = "resource:org.evin.book.track.Book#" + book;
            jsonData["reportedBy"] = reportedBy;
            jsonData["reportedTo"] = "resource:org.evin.book.track.Publisher#" + reportedTo;
            // jsonData["store"] = "resource:org.evin.book.track.Customer#" + store;

            console.log("JSON SENT => " + JSON.stringify(jsonData));

            // Add  created time
            jsonData["createdAt"] = currentDateTime();

            var msgHTML = "";

            $("#add-error-report-bag").hide();

            // var customerDetailsURL = 

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Get Customer Email Based on MemberID
            $.ajax({
                type: 'GET',
                url: getCustomerEmailURL,
                beforeSend: function () {
                    //calls the loader id tag
                    $("#loader").show();
                },
                success: function (customerEmailData) {
                    console.log("customerEmailData +++> " + JSON.stringify(customerEmailData[0]));

                    console.log("customerEmailData SIZE==  = " + customerEmailData.length);

                    console.log("Final jsonData => " + JSON.stringify(jsonData));

                    if (customerEmailData.length == 0) {
                        $("#loader").hide();

                        msgHTML = '<div class="alert alert-danger" role="alert">'
                            + 'The store ' + store + ' does not exist. Kindly re-check the code.'
                            + '</div>';

                        $('#add-review-msgs').html(msgHTML);

                    } else {

                        console.log("customerEmailData.email = " + customerEmailData[0].email);

                        var customerEmail = customerEmailData[0].email;

                        jsonData["store"] = "resource:org.evin.book.track.Customer#" + customerEmail;


                        // Report Book
                        $.ajax({
                            type: 'POST',
                            url: postReportviewURL,
                            data: jsonData,
                            dataType: 'json',
                            beforeSend: function () {
                                //calls the loader id tag
                                $("#loader").show();
                            },
                            success: function (data) {

                                $("#loader").hide();
                                console.log("Success +++> " + JSON.stringify(data));
                                $("#add-error-report-bag").hide();
                                $("#add-review-msgs").show();
                                msgHTML = '<div class="alert alert-primary" role="alert">'
                                    + 'Report Sent Successfuly. You have earned extra ' + reportPoints + ' for helping in fighting counterfeit.'
                                    + '</div>';

                                $('#add-review-msgs').html(msgHTML);

                                // window.location.reload();

                            },
                            error: function (data) {
                                var errors = $.parseJSON(data.responseText);
                                var status = errors.error.statusCode;

                                if (status == 422) {
                                    console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                    console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                    $("#add-review-msgs").hide();

                                    $('#add-review-errors').html('');
                                    $.each(errors.error.details.messages, function (key, value) {
                                        console.log('Error Value' + value + ' Key ' + key);
                                        $('#add-review-errors').append('<li>' + key + ' ' + value + '</li>');
                                    });

                                } else {
                                    console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                                    $('#add-review-errors').html(errors.error.message);
                                }
                                // hide loader
                                $("#loader").hide();

                                // Show modal to display error showed
                                $("#add-error-report-bag").show();
                            }
                        });
                    }
                },
                error: function (data) {
                    $("#loader").hide();
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;

                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#add-book-msgs").hide();

                        $('#add-book-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#add-book-errors').append('<li>' + key + ' ' + value + '</li>');
                        });

                    } else {
                        console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                        $('#add-book-errors').html(errors.error.message);
                        // $('#add-book-errors').html('<li>WARNING!!! The Book is a possible counterfeit.</li>');
                    }
                    // hide loader
                    $("#loader").hide();

                    // Show modal to display error showed
                    $('#addBookModal').modal('show');
                    $("#add-error-bag").show();
                }
            }); //end Get Customer Email Based on MemberID

        });
    };

    var handlePostReview = function () {
        console.log("handlePostReview");
        $("#add-error-bag").hide();

        customerReviewSbtBtn.on('click', function () {
            var json = frmAddReview.serializeArray();
            var jsonData = {};

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            console.log("JSON SENT => " + JSON.stringify(jsonData));

            // var saveUrl = "./formdata?view=828:0&KF=" + userID + "&oper=edit";
            console.log("Progress Sent Data =>" + JSON.stringify(jsonData));

            var msgHTML = "";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // data:  JSON.stringify(jsonData),
            $.ajax({
                type: 'POST',
                url: postCustomerReviewURL,
                data: jsonData,
                dataType: 'json',
                beforeSend: function () {//calls the loader id tag
                    $("#frmAddReview .close").click();
                    $("#loader").show();
                },
                success: function (data) {
                    $("#loader").hide();
                    console.log("Success +++> " + JSON.stringify(data));
                    $("#add-review-error-bag").hide();
                    $("#add-review-msgs").show();
                    msgHTML = '<div class="alert alert-primary" role="alert">'
                        + 'Record Added Successfuly '
                        + '</div>';

                    $('#add-review-msgs').html(msgHTML);

                    $('#frmAddReview').trigger("reset");
                    $("#frmAddReview .close").click();
                    window.location.reload();
                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;

                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#add-review-msgs").hide();

                        $('#add-review-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#add-review-errors').append('<li>' + key + ' ' + value + '</li>');
                        });

                    } else {
                        console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                        $('#add-review-errors').html(errors.error.message);
                    }
                    // hide loader
                    $("#loader").hide();

                    // Show modal to display error showed
                    $('#addReviewModal').modal('show');
                    $("#add-review-error-bag").show();
                }
            });

        });
    };

    var handlePostBook = function () {
        console.log("handlePostBook");
        $("#add-error-bag").hide();
        var bookId = "BOOK_" + randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

        bookSbtBtn.on('click', function () {
            var json = bookForm.serializeArray();
            var jsonData = {};

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            // Append ID
            jsonData["id"] = bookId;

            console.log("JSON SENT => " + JSON.stringify(jsonData));

            // var saveUrl = "./formdata?view=828:0&KF=" + userID + "&oper=edit";
            console.log("Progress Sent Data =>" + JSON.stringify(jsonData));

            // Add  created time
            jsonData["createdAt"] = currentDateTime();

            var msgHTML = "";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // data:  JSON.stringify(jsonData),
            $.ajax({
                type: 'POST',
                url: postBookURL,
                data: jsonData,
                dataType: 'json',
                beforeSend: function () {//calls the loader id tag
                    $("#book_form .close").click();
                    $("#loader").show();
                },
                success: function (data) {
                    $("#loader").hide();
                    console.log("Success +++> " + JSON.stringify(data));
                    $("#add-error-bag").hide();
                    $("#add-book-msgs").show();
                    msgHTML = '<div class="alert alert-primary" role="alert">'
                        + 'Record Added Successfuly '
                        + '</div>';

                    $('#add-book-msgs').html(msgHTML);

                    $('#book_form').trigger("reset");
                    $("#book_form .close").click();
                    window.location.reload();
                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;

                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#add-book-msgs").hide();

                        $('#add-book-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#add-book-errors').append('<li>' + key + ' ' + value + '</li>');
                        });

                    } else {
                        console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                        $('#add-book-errors').html(errors.error.message);
                    }
                    // hide loader
                    $("#loader").hide();

                    // Show modal to display error showed
                    $('#addBookModal').modal('show');
                    $("#add-error-bag").show();
                }
            });

        });
    };

    var handleVerifyBookOthers = function () {
        console.log("handleVerifyBookOthers");
        $("#add-error-bag").hide();

        // Prevent submit by enter button
        bookVerifyFormOthers.on('keyup keypress', function (e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });

        bookVerifySbtBtnOthers.on('click', function () {
            var json = bookVerifyFormOthers.serializeArray();
            var jsonData = {};
            var loggedInUserEmail = $("#loggedInUser").val();
            var loggedInUser = "resource:org.evin.book.track.Customer#" + loggedInUserEmail;

            var getCustomerURL = postCustomerURL + "/" + loggedInUserEmail;

            console.log("LoggedInUserEmail => " + loggedInUserEmail);

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });


            // Append ID
            var bookID = jsonData["book_serial"];

            delete jsonData["loggedInUser"];

            console.log("JSON SENT => " + JSON.stringify(jsonData));


            var msgHTML = "";

            var getBookTrailUrl = getVerifyBookURL + bookID + '?filter={"where":{"id":"' + bookID + '"},"include":"resolve"}';

            console.log("SUBMIT URL = " + getBookTrailUrl);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // data:  JSON.stringify(jsonData),
            $.ajax({
                type: 'GET',
                url: getBookTrailUrl,
                beforeSend: function () {//calls the loader id tag
                    $("#book_form .close").click();
                    $("#loader").show();
                },
                success: function (data) {

                    $("#loader").hide();
                    console.log("Success +++> " + JSON.stringify(data));
                    console.log("data.id = " + data.id);

                    window.location.href = '/verify/book/' + data.id;
                },
                error: function (data) {
                    $("#loader").hide();
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;

                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#add-book-msgs").hide();

                        $('#add-book-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#add-book-errors').append('<li>' + key + ' ' + value + '</li>');
                        });

                    } else {
                        console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                        // $('#add-book-errors').html(errors.error.message);
                        $('#add-book-errors').html('<li>WARNING!!! The Book is a possible counterfeit.</li>');
                    }
                    // hide loader
                    $("#loader").hide();

                    // Show modal to display error showed
                    $('#addBookModal').modal('show');
                    $("#add-error-bag").show();
                }
            });

        });
    };

    var handleVerifyBook = function () {
        console.log("handleVerifyBook");
        $("#add-error-bag").hide();

        // Prevent submit by enter button
        bookVerifyForm.on('keyup keypress', function (e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });

        bookVerifySbtBtn.on('click', function () {
            var json = bookVerifyForm.serializeArray();
            var jsonData = {};
            var loggedInUserEmail = $("#loggedInUser").val();
            var loggedInUser = "resource:org.evin.book.track.Customer#" + loggedInUserEmail;

            var getCustomerURL = postCustomerURL + "/" + loggedInUserEmail;

            console.log("LoggedInUserEmail => " + loggedInUserEmail);

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });


            // Append ID
            var bookID = jsonData["book_serial"];

            delete jsonData["loggedInUser"];

            console.log("JSON SENT => " + JSON.stringify(jsonData));

            var loggedInEmail = jsonData["loggedInEmail"];
            var userRole = jsonData["userRole"];

            delete jsonData["loggedInEmail"];
            delete jsonData["userRole"];

            var msgHTML = "";

            var getBookTrailUrl = getVerifyBookURL + bookID + '?filter={"where":{"id":"' + bookID + '"},"include":"resolve"}';

            console.log("SUBMIT URL = " + getBookTrailUrl);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // data:  JSON.stringify(jsonData),
            $.ajax({
                type: 'GET',
                url: getBookTrailUrl,
                beforeSend: function () {//calls the loader id tag
                    $("#book_form .close").click();
                    $("#loader").show();
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
                                accountBalance: customerData.accountBalance + scanPoints,
                                customer: loggedInUser,
                                updatedAt: currentDateTime(),
                                participantInvoking: "resource:org.evin.book.track." + userRole + "#" + loggedInEmail
                            };

                            // Add Posting Points
                            $.ajax({
                                type: 'POST',
                                url: postCustomerScanPointsURL,
                                data: postPoints,
                                dataType: 'json',
                                beforeSend: function () {
                                    //calls the loader id tag
                                    $("#loader").show();
                                },
                                success: function (datas) {
                                    $("#loader").hide();
                                    console.log("Success +++> " + JSON.stringify(data));
                                    console.log("data.id = " + data.id);

                                    window.location.href = '/verify/book/' + data.id;
                                },
                                error: function (data) {
                                    $("#loader").hide();
                                    var errors = $.parseJSON(data.responseText);
                                    var status = errors.error.statusCode;

                                    if (status == 422) {
                                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                        $("#add-book-msgs").hide();

                                        $('#add-book-errors').html('');
                                        $.each(errors.error.details.messages, function (key, value) {
                                            console.log('Error Value' + value + ' Key ' + key);
                                            $('#add-book-errors').append('<li>' + key + ' ' + value + '</li>');
                                        });

                                    } else {
                                        console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                                        $('#add-book-errors').html(errors.error.message);
                                        // $('#add-book-errors').html('<li>WARNING!!! The Book is a possible counterfeit.</li>');
                                    }
                                    // hide loader
                                    $("#loader").hide();

                                    // Show modal to display error showed
                                    $('#addBookModal').modal('show');
                                    $("#add-error-bag").show();
                                }
                            }); //end post points ajax
                        },
                        error: function (data) {
                            $("#loader").hide();
                            var errors = $.parseJSON(data.responseText);
                            var status = errors.error.statusCode;

                            if (status == 422) {
                                console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                $("#add-book-msgs").hide();

                                $('#add-book-errors').html('');
                                $.each(errors.error.details.messages, function (key, value) {
                                    console.log('Error Value' + value + ' Key ' + key);
                                    $('#add-book-errors').append('<li>' + key + ' ' + value + '</li>');
                                });

                            } else {
                                console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                                $('#add-book-errors').html(errors.error.message);
                                // $('#add-book-errors').html('<li>WARNING!!! The Book is a possible counterfeit.</li>');
                            }
                            // hide loader
                            $("#loader").hide();

                            // Show modal to display error showed
                            $('#addBookModal').modal('show');
                            $("#add-error-bag").show();
                        }
                    }); //end Get Customer Details


                },
                error: function (data) {
                    $("#loader").hide();
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;

                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#add-book-msgs").hide();

                        $('#add-book-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#add-book-errors').append('<li>' + key + ' ' + value + '</li>');
                        });

                    } else {
                        console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                        // $('#add-book-errors').html(errors.error.message);
                        $('#add-book-errors').html('<li>WARNING!!! The Book is a possible counterfeit.</li>');
                    }
                    // hide loader
                    $("#loader").hide();

                    // Show modal to display error showed
                    $('#addBookModal').modal('show');
                    $("#add-error-bag").show();
                }
            });

        });
    };

    /**
     * Post Books in Shipment
     */
    var handlePostBookShipment = function () {
        console.log("handlePostBookShipment");
        $("#add-error-bag").hide();

        bookShipmentSbtBtn.on('click', function () {
            var json = bookShipmentForm.serializeArray();
            var jsonData = {};

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            var loggedInEmail = jsonData["loggedInEmail"];
            var userRole = jsonData["userRole"];

            delete jsonData["loggedInEmail"];
            delete jsonData["userRole"];

            jsonData["participantInvoking"] = "resource:org.evin.book.track." + userRole + "#" + loggedInEmail;

            console.log("JSON SENT => " + JSON.stringify(jsonData));

            var msgHTML = "";

            var checkBookAvailabilityURL = domainUrl + '/Book/' + jsonData["book"];
            var updateBookShipmentURL = domainUrl + '/updateBookShipment/';

            var updateBookShipmentData = {
                "$class": "org.evin.book.track.updateBookShipment",
                "book": "resource:org.evin.book.track.Book#" + jsonData["book"],
                "shipmentId": jsonData["shipment"],
                "updatedAt": currentDateTime(),
                "participantInvoking": "resource:org.evin.book.track." + userRole + "#" + loggedInEmail
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Check if book Exists
            $.ajax({
                type: 'GET',
                url: checkBookAvailabilityURL,
                dataType: 'json',
                beforeSend: function () {//calls the loader id tag
                    $("#frmregisterBookShipment .close").click();
                    $("#loader").show();
                },
                success: function (data) {
                    console.log("data below");
                    console.log(JSON.stringify(data));
                    //if book has shipment id then it has been registered
                    // so disallow saving prevent repetition

                    // check of data.shipment exists in the book
                    if (data.hasOwnProperty('shipment')) {
                        // CORRECT ME have default value 
                        // if the shipment default value id does not begin with SHIP_
                        // then the book has not been assigned thus can assign else
                        // already registered and can't be registered af=gain in 
                        // another shipment
                        if (checkShipmentID(data.shipment)) {
                            // hide loader
                            $("#loader").hide();

                            console.log("ALREADY REGISTERED BOOK >>!!!!!!! ");
                            $('#add-book-shipment-errors').html("Book Already Added To The Shipment.");

                            // Show modal to display error showed
                            $('#registerBookShipmentModal').modal('show');
                            $("#add-error-bag").show();
                        } else {
                            // Add Book To Shipment
                            $.ajax({
                                type: 'POST',
                                url: postBookShipmentURL,
                                data: jsonData,
                                dataType: 'json',
                                beforeSend: function () {//calls the loader id tag
                                    $("#frmregisterBookShipment .close").click();
                                    $("#loader").show();
                                },
                                success: function (data) {

                                    // UPDATE SHIPMENT ID IN BOOK FOR TRACKING PURPOSES
                                    $.ajax({
                                        type: 'POST',
                                        url: updateBookShipmentURL,
                                        data: updateBookShipmentData,
                                        dataType: 'json',
                                        beforeSend: function () {//calls the loader id tag
                                            $("#frmregisterBookShipment .close").click();
                                            $("#loader").show();
                                        },
                                        success: function (data) {
                                            $("#loader").hide();
                                            console.log("Success +++> " + JSON.stringify(data));
                                            $("#add-error-bag").hide();
                                            $("#add-book-shipment-msgs").show();
                                            msgHTML = '<div class="alert alert-primary" role="alert">'
                                                + 'Record Added Successfuly '
                                                + '</div>';

                                            $('#add-book-shipment-msgs').html(msgHTML);

                                            $('#frmregisterBookShipment').trigger("reset");
                                            $("#frmregisterBookShipment .close").click();
                                            window.location.reload();
                                        },
                                        error: function (data) {
                                            var errors = $.parseJSON(data.responseText);
                                            var status = errors.error.statusCode;

                                            if (status == 422) {
                                                console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                                console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                                $("#add-book-msgs").hide();

                                                $('#add-book-shipment-errors').html('');
                                                $.each(errors.error.details.messages, function (key, value) {
                                                    console.log('Error Value' + value + ' Key ' + key);
                                                    $('#add-book-shipment-errors').append('<li>' + key + ' ' + value + '</li>');
                                                });

                                            } else {
                                                console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                                                $('#add-book-shipment-errors').html(errors.error.message);
                                            }
                                            // hide loader
                                            $("#loader").hide();

                                            // Show modal to display error showed
                                            $('#registerBookShipmentModal').modal('show');
                                            $("#add-error-bag").show();
                                        }
                                    });  // End AJax updateBookShipmentURL
                                },
                                error: function (data) {
                                    var errors = $.parseJSON(data.responseText);
                                    var status = errors.error.statusCode;

                                    if (status == 422) {
                                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                        $("#add-book-msgs").hide();

                                        $('#add-book-shipment-errors').html('');
                                        $.each(errors.error.details.messages, function (key, value) {
                                            console.log('Error Value' + value + ' Key ' + key);
                                            $('#add-book-shipment-errors').append('<li>' + key + ' ' + value + '</li>');
                                        });

                                    } else {
                                        console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                                        $('#add-book-shipment-errors').html(errors.error.message);
                                    }
                                    // hide loader
                                    $("#loader").hide();

                                    // Show modal to display error showed
                                    $('#registerBookShipmentModal').modal('show');
                                    $("#add-error-bag").show();
                                }
                            });
                        }
                    } else {
                        // Add Book To Shipment
                        $.ajax({
                            type: 'POST',
                            url: postBookShipmentURL,
                            data: jsonData,
                            dataType: 'json',
                            beforeSend: function () {//calls the loader id tag
                                $("#frmregisterBookShipment .close").click();
                                $("#loader").show();
                            },
                            success: function (data) {

                                // UPDATE SHIPMENT ID IN BOOK FOR TRACKING PURPOSES
                                $.ajax({
                                    type: 'POST',
                                    url: updateBookShipmentURL,
                                    data: updateBookShipmentData,
                                    dataType: 'json',
                                    beforeSend: function () {//calls the loader id tag
                                        $("#frmregisterBookShipment .close").click();
                                        $("#loader").show();
                                    },
                                    success: function (data) {
                                        $("#loader").hide();
                                        console.log("Success +++> " + JSON.stringify(data));
                                        $("#add-error-bag").hide();
                                        $("#add-book-shipment-msgs").show();
                                        msgHTML = '<div class="alert alert-primary" role="alert">'
                                            + 'Record Added Successfuly '
                                            + '</div>';

                                        $('#add-book-shipment-msgs').html(msgHTML);

                                        $('#frmregisterBookShipment').trigger("reset");
                                        $("#frmregisterBookShipment .close").click();
                                        window.location.reload();
                                    },
                                    error: function (data) {
                                        var errors = $.parseJSON(data.responseText);
                                        var status = errors.error.statusCode;

                                        if (status == 422) {
                                            console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                            console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                            $("#add-book-msgs").hide();

                                            $('#add-book-shipment-errors').html('');
                                            $.each(errors.error.details.messages, function (key, value) {
                                                console.log('Error Value' + value + ' Key ' + key);
                                                $('#add-book-shipment-errors').append('<li>' + key + ' ' + value + '</li>');
                                            });

                                        } else {
                                            console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                                            $('#add-book-shipment-errors').html(errors.error.message);
                                        }
                                        // hide loader
                                        $("#loader").hide();

                                        // Show modal to display error showed
                                        $('#registerBookShipmentModal').modal('show');
                                        $("#add-error-bag").show();
                                    }
                                });  // End AJax updateBookShipmentURL
                            },
                            error: function (data) {
                                var errors = $.parseJSON(data.responseText);
                                var status = errors.error.statusCode;

                                if (status == 422) {
                                    console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                    console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                    $("#add-book-msgs").hide();

                                    $('#add-book-shipment-errors').html('');
                                    $.each(errors.error.details.messages, function (key, value) {
                                        console.log('Error Value' + value + ' Key ' + key);
                                        $('#add-book-shipment-errors').append('<li>' + key + ' ' + value + '</li>');
                                    });

                                } else {
                                    console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                                    $('#add-book-shipment-errors').html(errors.error.message);
                                }
                                // hide loader
                                $("#loader").hide();

                                // Show modal to display error showed
                                $('#registerBookShipmentModal').modal('show');
                                $("#add-error-bag").show();
                            }
                        });

                    }



                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;

                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#add-book-msgs").hide();

                        $('#add-book-shipment-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#add-book-shipment-errors').append('<li>' + key + ' ' + value + '</li>');
                        });

                    } else {
                        console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                        $('#add-book-shipment-errors').html(errors.error.message);
                    }
                    // hide loader
                    $("#loader").hide();

                    // Show modal to display error showed
                    $('#registerBookShipmentModal').modal('show');
                    $("#add-error-bag").show();
                }
            });

        });
    };

    /**
     * Function to generate random numbers for books
     * @param {*} length 
     * @param {*} chars 
     */
    function randomString(length, chars) {
        var result = '';
        for (var i = length; i > 0; --i) result += chars[Math.round(Math.random() * (chars.length - 1))];
        return result;
    }

    /**
     * Posting the book edit form
     */
    var handleEditBook = function () {
        console.log("handleEditBook");
        $("#edit-error-bag").hide();
        // var bookId = randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

        bookEditSbtBtn.on('click', function () {
            var json = frmEditBook.serializeArray();
            var BookId = $('#id').val();
            console.log('Book ID Edit ==> ' + BookId);
            var jsonData = {};

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            // Append ID
            // jsonData["id"] = bookId;

            console.log("EDIT JSON SENT => " + JSON.stringify(jsonData));
            console.log('Book ID Edit jsonData ==> ' + jsonData.id);

            // var saveUrl = "./formdata?view=828:0&KF=" + userID + "&oper=edit";
            console.log("Progress Sent Edit Data =>" + JSON.stringify(jsonData));
            var postEditBookURL = domainUrl + '/Book/' + BookId;

            // Add update time
            jsonData["updatedAt"] = currentDateTime();

            var msgHTML = "";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // data:  JSON.stringify(jsonData),
            $.ajax({
                type: 'PUT',
                url: postEditBookURL,
                data: jsonData,
                dataType: 'json',
                beforeSend: function () {//calls the loader id tag
                    $("#frmEditBook .close").click();
                    $("#loader").show();
                },
                success: function (data) {
                    // hide loader
                    $("#loader").hide();
                    console.log("Success +++> " + JSON.stringify(data));
                    $("#edit-error-bag").hide();
                    $("#edit-book-msgs").show();

                    msgHTML = '<div class="alert alert-primary" role="alert">'
                        + 'Record Added Successfuly '
                        + '</div>';

                    $('#edit-book-msgs').html(msgHTML);

                    $('#frmEditBook').trigger("reset");
                    $("#frmEditBook .close").click();
                    window.location.reload();
                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;

                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#edit-book-msgs").hide();

                        $('#edit-book-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#edit-book-errors').append('<li>' + key + ' ' + value + '</li>');
                        });

                    } else {
                        console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                        $('#edit-book-errors').html(errors.error.message);
                    }
                    // hide loader
                    $("#loader").hide();

                    // Show modal to display error showed
                    $('#editBookModal').modal('show');
                    $("#edit-error-bag").show();
                }
            }); // END Ajax

        }); // END OnClick Submit

    };

    /**
     * Posting the Delete Form
     */
    var handleDeleteBook = function () {
        console.log("handleDeleteBook");
        $("#edit-error-bag").hide();
        // var bookId = randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

        bookDeleteSbtBtn.on('click', function () {

            var json = frmEditBook.serializeArray();
            var BookId = $('#book_id').val();

            console.log("Delete Book ID => " + BookId);

            var postEditBookURL = domainUrl + '/Book/' + BookId;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // data:  JSON.stringify(jsonData),
            $.ajax({
                type: 'DELETE',
                url: postEditBookURL,
                dataType: 'json',
                beforeSend: function () {//calls the loader id tag
                    $("#frmDeleteBook .close").click();
                    $("#loader").show();
                },
                success: function (data) {
                    console.log("Success +++> " + JSON.stringify(data));
                    $("#loader").hide();
                    window.location.reload();
                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error));
                    console.log("Errors >>!!!!!!! " + JSON.stringify(data));

                }
            }); // END Ajax

        }); // END OnClick Submit

    };

    var handlePostOrder = function () {
        console.log("handlePostOrder");
        $("#add-order-error-bag").hide();
        var orderId = 'CON_' + randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

        orderSbtBtn.on('click', function () {
            var json = frmAddOrder.serializeArray();
            var jsonData = {};
            var seller = $("#seller").val();
            var buyer = $("#buyer").val();
            var name = $("#participantName").val();
            console.log("Seller - " + seller + " Buyer - " + buyer);


            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });
            var publisherID = jsonData["seller"];

            var buyerID = jsonData["buyer"];
            var p = jsonData["pricePoints"];
            if (p == "") {
                p = 0;
            }
            var points = parseFloat(p);

            var quantity = parseFloat(jsonData["quantity"]);

            // Append ID
            jsonData["contractId"] = orderId;

            //updating Seller
            jsonData["seller"] = "org.evin.book.track.Publisher#" + seller;

            //updating Buyer
            jsonData["buyer"] = "org.evin.book.track.Customer#" + buyer;

            // Set default status 
            jsonData["orderStatus"] = 'WAITING';

            // created AT
            jsonData["createdAt"] = currentDateTime();

            delete jsonData["participantName"];

            var quantity = parseInt(jsonData["quantity"]);
            var unitPrice = parseInt(jsonData["unitPrice"]);
            var total = quantity * unitPrice;
            var destinationAddress = jsonData["destinationAddress"];
            var createdAt = jsonData["createdAt"];

            console.log("Quantity = " + quantity + "UnitPrice = " + unitPrice + "Total = " + total);

            console.log("JSON SENT => " + JSON.stringify(jsonData));

            console.log("Progress Sent Data =>" + JSON.stringify(jsonData));

            var msgHTML = "";

            var checkPublisherExistsURL = domainUrl + '/Publisher/' + publisherID;
            var checkCustomerPointsURL = domainUrl + '/Customer/' + buyerID;

            // send mail
            var sendEmailURL = "/sendemail/send";

            var subject = "New Order";
            var emailMsg = "New Order Alert";
            var jsonEmailData = {}
            jsonEmailData = {
                'name': name,
                'message': emailMsg,
                'from': systemEmail,
                'to': buyer,
                'subject': subject,
                'destinationAddress': destinationAddress,
                'order': orderId,
                'quantity': quantity,
                'unitPrice': unitPrice,
                'total': total,
                'createdAt': createdAt
            };

            // send sms
            var sendSmsURL = "/send/sms";
            var jsonSMSData = {}
            jsonSMSData = {
                'order': orderId
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var checkCalc = points % 10;

            console.log("checkCalc ===> " + checkCalc);
            // Disable Ajax Momentarily

            // 1. Check Publisher check
            // 1. Check Customer Points
            // 2. Post Order
            // 3. Send SMS to Publisher
            // 4. Send Email to Customer

            // Check if its divisible by 
            if (points % 10 === 0) {

                maximumPoints = quantity * maxAllowedPoints;

                // Find total points per book
                points = quantity * points;

                console.log("maximumPoints => " + maximumPoints);

                console.log("Points => " + points);

                // If points < maximum disallow
                if (points <= maximumPoints) {

                    // hide error
                    $("#add-order-error-bag").hide();

                    // check if publisher exists
                    $.ajax({
                        type: 'GET',
                        url: checkPublisherExistsURL,
                        dataType: 'json',
                        beforeSend: function () {//calls the loader id tag
                            $("#frmAddOrder .close").click();
                            $("#loader").show();
                        },
                        success: function (publisherData) {

                            // $("#loader").hide();
                            console.log("Success Check Publisher +++> " + JSON.stringify(publisherData));

                            var publisherPoints = publisherData.accountBalance;

                            // check customer points
                            $.ajax({
                                type: 'GET',
                                url: checkCustomerPointsURL,
                                dataType: 'json',
                                beforeSend: function () {//calls the loader id tag
                                    $("#frmAddOrder .close").click();
                                    $("#loader").show();
                                },
                                success: function (customerData) {
                                    console.log(customerData.accountBalance);
                                    var customerPoints = customerData.accountBalance;
                                    // if customer points
                                    // 1. Update Customer Points subtract 
                                    // 2. Add Publisher Points
                                    // 3. Calculate Discount
                                    if (customerPoints >= points) {

                                        // Convert points into cash
                                        var calcDiscount = points / conversion;

                                        jsonData["discountPoints"] = calcDiscount;

                                        var savedDiscount = jsonData["discountPoints"];
                                        publisherPoints = publisherPoints + points;
                                        customerPoints = customerPoints - points;

                                        var customerPointsObj = {
                                            accountBalance: customerPoints,
                                            customer: buyerID,
                                            updatedAt: currentDateTime(),
                                            participantInvoking: "resource:org.evin.book.track.Customer#" + buyerID
                                        };
                                        var publisherPointsObj = {
                                            accountBalance: publisherPoints,
                                            publisher: publisherID,
                                            updatedAt: currentDateTime(),
                                            participantInvoking: "resource:org.evin.book.track.Publisher#" + publisherID
                                        };

                                        console.log("savedDiscount = " + savedDiscount + " publisherPoints = " + publisherPoints + " customerPoints = " + customerPoints);
                                        console.log("customerPointsObj = " + JSON.stringify(customerPointsObj));
                                        console.log("publisherPointsObj = " + JSON.stringify(publisherPointsObj));

                                        // Updating Customer Points
                                        $.ajax({
                                            type: 'POST',
                                            url: postCustomerScanPointsURL,
                                            data: customerPointsObj,
                                            dataType: 'json',
                                            beforeSend: function () {
                                                //calls the loader id tag
                                                $("#loader").show();
                                            },
                                            success: function (customerPointData) {
                                                console.log("Success customerPointData +++> " + JSON.stringify(customerPointData));

                                                // Updating Publisher Points
                                                $.ajax({
                                                    type: 'POST',
                                                    url: postPublisherScanPointsURL,
                                                    data: publisherPointsObj,
                                                    dataType: 'json',
                                                    beforeSend: function () {
                                                        //calls the loader id tag
                                                        $("#loader").show();
                                                    },
                                                    success: function (publisherPointData) {
                                                        $("#loader").hide();
                                                        console.log("Success +publisherPointData ++> " + JSON.stringify(publisherPointData));

                                                        // Post Order
                                                        $.ajax({
                                                            type: 'POST',
                                                            url: postOrderURL,
                                                            data: jsonData,
                                                            dataType: 'json',
                                                            beforeSend: function () {//calls the loader id tag
                                                                $("#frmAddOrder .close").click();
                                                                $("#loader").show();
                                                            },
                                                            success: function (data) {

                                                                $("#loader").hide();
                                                                console.log("Success +++> " + JSON.stringify(data));

                                                                console.log("Sending SMS");
                                                                // Send SMS
                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: sendSmsURL,
                                                                    data: jsonSMSData,
                                                                    dataType: 'json',
                                                                    beforeSend: function () {//calls the loader id tag
                                                                        $("#frmAddOrder .close").click();
                                                                        $("#loader").show();
                                                                    },
                                                                    success: function (data) {

                                                                        $("#loader").hide();
                                                                        console.log("Success +++> " + JSON.stringify(data));
                                                                        console.log("Data +++> " + data.data);

                                                                        // Send Email
                                                                        $.ajax({
                                                                            type: 'POST',
                                                                            url: sendEmailURL,
                                                                            data: jsonEmailData,
                                                                            dataType: 'json',
                                                                            beforeSend: function () {//calls the loader id tag
                                                                                $("#frmAddOrder .close").click();
                                                                                $("#loader").show();
                                                                            },
                                                                            success: function (data) {

                                                                                $("#loader").hide();
                                                                                console.log("Success +++> " + JSON.stringify(data));
                                                                                console.log("Data +++> " + data.data);

                                                                                if (data.success) {
                                                                                    $("#add-error-bag").hide();
                                                                                    $("#add-order-msgs").show();
                                                                                    msgHTML = '<div class="alert alert-primary" role="alert">'
                                                                                        + 'Record Added Successfuly '
                                                                                        + '</div>';

                                                                                    $('#add-order-msgs').html(msgHTML);

                                                                                    $('#frmAddOrder').trigger("reset");
                                                                                    $("#frmAddOrder .close").click();
                                                                                    window.location.reload();
                                                                                    // window.location.reload();
                                                                                } else {
                                                                                    // Error
                                                                                    $('#add-order-errors').html('An error occured!');
                                                                                    // Show modal to display error showed
                                                                                    $('#addOrderModal').modal('show');
                                                                                    $("#add-order-error-bag").show();
                                                                                }
                                                                            },
                                                                            error: function (data) {
                                                                                console.log("Error +++> " + JSON.stringify(data));
                                                                                var errors = $.parseJSON(data.responseText);
                                                                                var status = errors.error.statusCode;

                                                                                $('#add-order-errors').html('An error occured!');

                                                                                // hide loader
                                                                                $("#loader").hide();

                                                                                // Show modal to display error showed
                                                                                $('#addOrderModal').modal('show');
                                                                                $("#add-order-error-bag").show();
                                                                            }
                                                                        });

                                                                    },
                                                                    error: function (data) {
                                                                        console.log("Error +++> " + JSON.stringify(data));
                                                                        var errors = $.parseJSON(data.responseText);
                                                                        var status = errors.error.statusCode;

                                                                        $('#add-order-errors').html('An error occured!');

                                                                        // hide loader
                                                                        $("#loader").hide();

                                                                        // Show modal to display error showed
                                                                        $('#addOrderModal').modal('show');
                                                                        $("#add-order-error-bag").show();
                                                                    }
                                                                });
                                                                console.log("Sending Mail");


                                                            },
                                                            error: function (data) {

                                                                var errors = $.parseJSON(data.responseText);
                                                                var status = errors.error.statusCode;
                                                                // if (status == 500) {
                                                                if (status == 422) {
                                                                    console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                                                    console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                                                    $("#add-order-msgs").hide();

                                                                    $('#add-order-errors').html('');
                                                                    $.each(errors.error.details.messages, function (key, value) {
                                                                        console.log('Error Value' + value + ' Key ' + key);
                                                                        $('#add-order-errors').append('<li>' + key + ' ' + value + '</li>');
                                                                    });

                                                                } else {
                                                                    $('#add-order-errors').html(errors.error.message);
                                                                }
                                                                // hide loader
                                                                $("#loader").hide();

                                                                // Show modal to display error showed
                                                                $('#addOrderModal').modal('show');
                                                                $("#add-order-error-bag").show();
                                                            }
                                                        });
                                                    },
                                                    error: function (data) {

                                                        var errors = $.parseJSON(data.responseText);
                                                        var status = errors.error.statusCode;

                                                        if (status == 422) {
                                                            console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                                            console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                                            $("#add-order-msgs").hide();

                                                            $('#add-order-errors').html('');
                                                            $.each(errors.error.details.messages, function (key, value) {
                                                                console.log('Error Value' + value + ' Key ' + key);
                                                                $('#add-order-errors').append('<li>' + key + ' ' + value + '</li>');
                                                            });

                                                        } else {
                                                            $('#add-order-errors').html(errors.error.message);
                                                        }
                                                        // hide loader
                                                        $("#loader").hide();

                                                        // Show modal to display error showed
                                                        $('#addOrderModal').modal('show');
                                                        $("#add-order-error-bag").show();
                                                    }
                                                }); //end post points ajax
                                            },
                                            error: function (data) {

                                                var errors = $.parseJSON(data.responseText);
                                                var status = errors.error.statusCode;

                                                if (status == 422) {
                                                    console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                                    console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                                    $("#add-order-msgs").hide();

                                                    $('#add-order-errors').html('');
                                                    $.each(errors.error.details.messages, function (key, value) {
                                                        console.log('Error Value' + value + ' Key ' + key);
                                                        $('#add-order-errors').append('<li>' + key + ' ' + value + '</li>');
                                                    });

                                                } else {
                                                    $('#add-order-errors').html(errors.error.message);
                                                }
                                                // hide loader
                                                $("#loader").hide();

                                                // Show modal to display error showed
                                                $('#addOrderModal').modal('show');
                                                $("#add-order-error-bag").show();
                                            }
                                        }); //end post points ajax

                                    } else if (customerPoints < points) {
                                        var ErrorHtml = "<strong>Error! </strong> You don't have enough points to redeem  " + points + ". You have points " + customerPoints + ".";

                                        $('#add-order-errors').html(ErrorHtml);

                                        // Show modal to display error showed
                                        $('#addOrderModal').modal('show');
                                        $("#add-order-error-bag").show();
                                    } else {
                                        // Post Order
                                        $.ajax({
                                            type: 'POST',
                                            url: postOrderURL,
                                            data: jsonData,
                                            dataType: 'json',
                                            beforeSend: function () {//calls the loader id tag
                                                $("#frmAddOrder .close").click();
                                                $("#loader").show();
                                            },
                                            success: function (data) {

                                                $("#loader").hide();
                                                console.log("Success +++> " + JSON.stringify(data));

                                                console.log("Sending SMS");
                                                // Send SMS
                                                $.ajax({
                                                    type: 'POST',
                                                    url: sendSmsURL,
                                                    data: jsonSMSData,
                                                    dataType: 'json',
                                                    beforeSend: function () {//calls the loader id tag
                                                        $("#frmAddOrder .close").click();
                                                        $("#loader").show();
                                                    },
                                                    success: function (data) {

                                                        $("#loader").hide();
                                                        console.log("Success +++> " + JSON.stringify(data));
                                                        console.log("Data +++> " + data.data);

                                                        // Send Email
                                                        $.ajax({
                                                            type: 'POST',
                                                            url: sendEmailURL,
                                                            data: jsonEmailData,
                                                            dataType: 'json',
                                                            beforeSend: function () {//calls the loader id tag
                                                                $("#frmAddOrder .close").click();
                                                                $("#loader").show();
                                                            },
                                                            success: function (data) {

                                                                $("#loader").hide();
                                                                console.log("Success +++> " + JSON.stringify(data));
                                                                console.log("Data +++> " + data.data);

                                                                if (data.success) {
                                                                    $("#add-error-bag").hide();
                                                                    $("#add-order-msgs").show();
                                                                    msgHTML = '<div class="alert alert-primary" role="alert">'
                                                                        + 'Record Added Successfuly '
                                                                        + '</div>';

                                                                    $('#add-order-msgs').html(msgHTML);

                                                                    $('#frmAddOrder').trigger("reset");
                                                                    $("#frmAddOrder .close").click();
                                                                    window.location.reload();
                                                                    // window.location.reload();
                                                                } else {
                                                                    // Error
                                                                    $('#add-order-errors').html('An error occured!');
                                                                    // Show modal to display error showed
                                                                    $('#addOrderModal').modal('show');
                                                                    $("#add-order-error-bag").show();
                                                                }
                                                            },
                                                            error: function (data) {
                                                                console.log("Error +++> " + JSON.stringify(data));
                                                                var errors = $.parseJSON(data.responseText);
                                                                var status = errors.error.statusCode;

                                                                $('#add-order-errors').html('An error occured!');

                                                                // hide loader
                                                                $("#loader").hide();

                                                                // Show modal to display error showed
                                                                $('#addOrderModal').modal('show');
                                                                $("#add-order-error-bag").show();
                                                            }
                                                        });

                                                    },
                                                    error: function (data) {
                                                        console.log("Error +++> " + JSON.stringify(data));
                                                        var errors = $.parseJSON(data.responseText);
                                                        var status = errors.error.statusCode;

                                                        $('#add-order-errors').html('An error occured!');

                                                        // hide loader
                                                        $("#loader").hide();

                                                        // Show modal to display error showed
                                                        $('#addOrderModal').modal('show');
                                                        $("#add-order-error-bag").show();
                                                    }
                                                });
                                                console.log("Sending Mail");


                                            },
                                            error: function (data) {

                                                var errors = $.parseJSON(data.responseText);
                                                var status = errors.error.statusCode;
                                                // if (status == 500) {
                                                if (status == 422) {
                                                    console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                                    console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                                    $("#add-order-msgs").hide();

                                                    $('#add-order-errors').html('');
                                                    $.each(errors.error.details.messages, function (key, value) {
                                                        console.log('Error Value' + value + ' Key ' + key);
                                                        $('#add-order-errors').append('<li>' + key + ' ' + value + '</li>');
                                                    });

                                                } else {
                                                    $('#add-order-errors').html(errors.error.message);
                                                }
                                                // hide loader
                                                $("#loader").hide();

                                                // Show modal to display error showed
                                                $('#addOrderModal').modal('show');
                                                $("#add-order-error-bag").show();
                                            }
                                        });
                                    }

                                },
                                error: function (data) {
                                    var errors = $.parseJSON(data.responseText);
                                    var status = errors.error.statusCode;
                                    // if (status == 500) {
                                    if (status == 422) {
                                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                        $("#add-order-msgs").hide();

                                        $('#add-order-errors').html('');
                                        $.each(errors.error.details.messages, function (key, value) {
                                            console.log('Error Value' + value + ' Key ' + key);
                                            $('#add-order-errors').append('<li>' + key + ' ' + value + '</li>');
                                        });

                                    } else {
                                        $('#add-order-errors').html(errors.error.message);
                                    }
                                    // hide loader
                                    $("#loader").hide();

                                    // Show modal to display error showed
                                    $('#addOrderModal').modal('show');
                                    $("#add-order-error-bag").show();
                                }
                            }); // end chec user points

                        },
                        error: function (data) {

                            var errors = $.parseJSON(data.responseText);
                            var status = errors.error.statusCode;
                            // if (status == 500) {
                            if (status == 422) {
                                console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                $("#add-order-msgs").hide();

                                $('#add-order-errors').html('');
                                $.each(errors.error.details.messages, function (key, value) {
                                    console.log('Error Value' + value + ' Key ' + key);
                                    $('#add-order-errors').append('<li>' + key + ' ' + value + '</li>');
                                });

                            } else {
                                $('#add-order-errors').html(errors.error.message);
                            }
                            // hide loader
                            $("#loader").hide();

                            // Show modal to display error showed
                            $('#addOrderModal').modal('show');
                            $("#add-order-error-bag").show();
                        }
                    });

                } else {

                    var ErrorHtml = "<strong>Not Allowed! </strong> Maximum redeemable points (quantity) " + quantity + " X (Max Allowed Points per Book) " + maxAllowedPoints + " = " + maximumPoints;

                    $('#add-order-errors').html(ErrorHtml);

                    // Show modal to display error showed
                    $('#addOrderModal').modal('show');
                    $("#add-order-error-bag").show();

                }


            } else {

                var ErrorHtml = "<strong>Error! </strong> Use point values that are divisible by 5 and greater than 100.";

                $('#add-order-errors').html(ErrorHtml);

                // Show modal to display error showed
                $('#addOrderModal').modal('show');
                $("#add-order-error-bag").show();
            }


        });
    };

    /**
     * Posting the order edit form
     */
    var handleEditOrder = function () {
        console.log("handleEditOrder");
        $("#edit-error-bag").hide();
        // var bookId = randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

        orderEditSbtBtn.on('click', function () {
            var json = frmEditOrder.serializeArray();
            var OrderId = $('#contractId').val();
            console.log('Order ID Edit ==> ' + OrderId);
            var jsonData = {};
            var seller = $("#sellerEdit").val();
            var buyer = $("#buyer").val();

            console.log("Seller - " + seller + " Buyer - " + buyer);

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });
            var publisherID = jsonData["seller"];

            //updating Seller
            jsonData["seller"] = "org.evin.book.track.Publisher#" + seller;

            //updating Buyer
            jsonData["buyer"] = "org.evin.book.track.Customer#" + buyer;

            // Update time
            jsonData["updatedAt"] = currentDateTime();

            console.log("EDIT JSON SENT => " + JSON.stringify(jsonData));

            var putEditOrderURL = domainUrl + '/OrderContract/' + OrderId;

            var msgHTML = "";

            var checkPublisherExistsURL = domainUrl + '/Publisher/' + publisherID;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // check if publisher exists
            $.ajax({
                type: 'GET',
                url: checkPublisherExistsURL,
                dataType: 'json',
                beforeSend: function () {//calls the loader id tag
                    $("#frmAddOrder .close").click();
                    $("#loader").show();
                },
                success: function (data) {
                    // data:  JSON.stringify(jsonData),
                    $.ajax({
                        type: 'PUT',
                        url: putEditOrderURL,
                        data: jsonData,
                        dataType: 'json',
                        beforeSend: function () {//calls the loader id tag
                            $("#frmEditOrder .close").click();
                            $("#loader").show();
                        },
                        success: function (data) {
                            $("#loader").hide();

                            console.log("Success +++> " + JSON.stringify(data));
                            $("#edit-error-bag").hide();
                            $("#edit-order-msgs").show();

                            msgHTML = '<div class="alert alert-primary" role="alert">'
                                + 'Record Added Successfuly '
                                + '</div>';

                            $('#edit-order-msgs').html(msgHTML);

                            $('#frmEditOrder').trigger("reset");
                            $("#frmEditOrder .close").click();
                            window.location.reload();
                        },
                        error: function (data) {
                            var errors = $.parseJSON(data.responseText);
                            var status = errors.error.statusCode;
                            // if (status == 500) {
                            if (status == 422) {
                                console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                $("#edit-order-msgs").hide();

                                $('#edit-order-errors').html('');
                                $.each(errors.error.details.messages, function (key, value) {
                                    console.log('Error Value' + value + ' Key ' + key);
                                    $('#edit-order-errors').append('<li>' + key + ' ' + value + '</li>');
                                });

                            } else {
                                $('#edit-order-errors').html(errors.error.message);
                            }

                            $("#loader").hide();
                            $('#editOrderModal').modal('show');
                            $("#edit-error-bag").show();
                        }
                    }); // END Ajax edit

                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;
                    // if (status == 500) {
                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#edit-order-msgs").hide();

                        $('#edit-order-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#edit-order-errors').append('<li>' + key + ' ' + value + '</li>');
                        });

                    } else {
                        $('#edit-order-errors').html(errors.error.message);
                    }

                    $("#loader").hide();
                    $('#editOrderModal').modal('show');
                    $("#edit-error-bag").show();
                }
            });

        }); // END OnClick Submit

    };

    /**
     * Posting the Delete Form
     */
    var handleDeleteOrder = function () {
        console.log("handleDeleteOrder");
        $("#delete-error-bag").hide();

        orderDeleteSbtBtn.on('click', function () {

            var json = frmEditBook.serializeArray();
            var OrderId = $('#order_id').val();

            console.log("Delete Order ID => " + OrderId);

            var postDeleteOrderURL = domainUrl + '/OrderContract/' + OrderId;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // data:  JSON.stringify(jsonData),
            $.ajax({
                type: 'DELETE',
                url: postDeleteOrderURL,
                dataType: 'json',
                beforeSend: function () {//calls the loader id tag
                    $("#frmDeleteOrder .close").click();
                    $("#loader").show();
                },
                success: function (data) {
                    $("#loader").hide();
                    $("#delete-error-bag").hide();

                    console.log("Success +++> " + JSON.stringify(data));
                    $("#frmDeleteOrder .close").click();
                    window.location.reload();
                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;
                    // if (status == 500) {
                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#delete-order-msgs").hide();

                        $('#delete-order-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#delete-order-errors').append('<li>' + key + ' ' + value + '</li>');
                        });

                    } else {
                        $('#delete-order-errors').html(errors.error.message);
                    }
                    $("#loader").hide();
                    $('#deleteOrderModal').modal('show');
                    $("#delete-error-bag").show();

                }
            }); // END Ajax

        }); // END OnClick Submit

    };

    /**
     * Posting Shipment Form
     */
    var handlePostShipment = function () {
        console.log("handlePostShipment");
        $("#add-shipment-error-bag").hide();
        var shipmentId = 'SHIP_' + randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        // var owner = "org.evin.book.track.Publisher#publisher1@gmail.com";
        var owner = $("#owner").val();
        // var ShipmentStatus = $("#ShipmentStatus").val();

        // console.log("SHIPMENT STATUS" + ShipmentStatus);
        shipmentSbtBtn.on('click', function () {
            console.log("handlePostShipment shipmentSbtBtn.on");
            var json = frmAddShipment.serializeArray();
            var jsonData = {};

            // var getLocation = $('#location').val();
            // var initialOwner = $('#owner').val();

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            var loggedInEmail = jsonData["loggedInEmail"];
            var userRole = jsonData["userRole"];

            delete jsonData["loggedInEmail"];
            delete jsonData["userRole"];

            // Append ID
            jsonData["shipmentId"] = shipmentId;

            // Add createdAt time
            jsonData["createdAt"] = currentDateTime();

            // participantInvoking
            // jsonData["participantInvoking"] = "resource:org.evin.book.track." + userRole + "#" + loggedInEmail;

            // Set Default Status
            // jsonData["ShipmentStatus"] = ShipmentStatus;

            // Delete Owner Variable from JSON
            delete jsonData["owner"];


            var updateInitialShipOwnership = {
                "$class": "org.evin.book.track.ShipOwnership",
                "owner": owner,
                "shipment": "resource:org.evin.book.track.Shipment#" + shipmentId,
                "participantInvoking": "resource:org.evin.book.track." + userRole + "#" + loggedInEmail
            }

            console.log("JSON SENT => " + JSON.stringify(jsonData));

            console.log("Progress Sent Data =>" + JSON.stringify(jsonData));

            var msgHTML = "";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // data:  JSON.stringify(jsonData),
            $.ajax({
                type: 'POST',
                url: postShipmentURL,
                data: jsonData,
                dataType: 'json',
                beforeSend: function () {//calls the loader id tag
                    $("#frmAddShipment .close").click();
                    $("#loader").show();
                },
                success: function (data) {

                    console.log("Success +++> " + JSON.stringify(data));

                    var orderstatusData = {
                        "$class": "org.evin.book.track.updateOrderStatus",
                        "order": "resource:org.evin.book.track.OrderContract#" + jsonData.contract,
                        "orderStatus": "PROCESSED",
                        "updatedAt": currentDateTime(),
                        "participantInvoking": "resource:org.evin.book.track." + userRole + "#" + loggedInEmail
                    }

                    console.log('Json Sent orderstatusData => ' + JSON.stringify(orderstatusData));

                    // Update Shipment initial owners
                    $.ajax({
                        type: 'POST',
                        url: shipOwnershipURL,
                        data: updateInitialShipOwnership,
                        dataType: 'json',
                        success: function (data) {
                            console.log('Done');

                            // Update Order status as processed 
                            $.ajax({
                                type: 'POST',
                                url: updateOrderStatusURL,
                                data: orderstatusData,
                                dataType: 'json',
                                success: function (data) {
                                    $("#loader").hide();
                                    console.log("Success updateOrderStatusURL");

                                    $("#add-shipment-error-bag").hide();
                                    $("#add-shipment-msgs").show();
                                    msgHTML = '<div class="alert alert-primary" role="alert">'
                                        + 'Record Added Successfuly '
                                        + '</div>';

                                    $('#add-shipment-msgs').html(msgHTML);

                                    $('#frmAddShipment').trigger("reset");
                                    $("#frmAddShipment .close").click();
                                    window.location.reload();
                                },
                                error: function (data) {
                                    var errors = $.parseJSON(data.responseText);
                                    var status = errors.error.statusCode;
                                    $("#add-shipment-errors").show();
                                    // if (status == 500) {
                                    if (status == 422) {
                                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                        $("#add-shipment-msgs").hide();

                                        $('#add-shipment-errors').html('');
                                        $.each(errors.error.details.messages, function (key, value) {
                                            console.log('Error Value' + value + ' Key ' + key);
                                            $('#add-shipment-errors').append('<li>' + key + ' ' + value + '</li>');
                                        });

                                    } else {
                                        $('#add-shipment-errors').html(errors.error.message);
                                    }
                                    $("#loader").hide();
                                    $('#addShipmentModal').modal('show');
                                    $("#add-shipment-error-bag").show();
                                }
                            }); // end ajax 3

                        },
                        error: function (data) {
                            console.log(data);
                            if (status == 422) {
                                console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                $("#add-shipment-msgs").hide();

                                $('#add-shipment-errors').html('');
                                $.each(errors.error.details.messages, function (key, value) {
                                    console.log('Error Value' + value + ' Key ' + key);
                                    $('#add-shipment-errors').append('<li>' + key + ' ' + value + '</li>');
                                });

                            } else {
                                $('#add-shipment-errors').html(errors.error.message);
                            }
                            $("#loader").hide();
                            $('#addShipmentModal').modal('show');
                            $("#add-shipment-error-bag").show();
                        }
                    }); // end Ajax 2
                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;
                    $("#add-shipment-errors").show();
                    // if (status == 500) {
                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#add-shipment-msgs").hide();

                        $('#add-shipment-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#add-shipment-errors').append('<li>' + key + ' ' + value + '</li>');
                        });

                    } else {
                        $('#add-shipment-errors').html(errors.error.message);
                    }
                    $("#loader").hide();
                    $('#addShipmentModal').modal('show');
                    $("#add-shipment-error-bag").show();
                }
            });

        });
    };

    /**
     * Posting Edit Shipment Form
     */
    var handleEditShipment = function () {
        console.log("handleEditShipment");
        $("#add-shipment-error-bag").hide();
        // var shipmentId = 'SHIP_' + randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        // var owner = "org.evin.book.track.Publisher#publisher1@gmail.com";
        // var owner = $("#owner").val();
        // var ShipmentStatus = $("#ShipmentStatus").val();

        // console.log("SHIPMENT STATUS" + ShipmentStatus);
        shipmentEditSbtBtn.on('click', function () {
            console.log("handleEditShipment BUTTON");
            var json = frmEditShipment.serializeArray();
            var jsonData = {};

            // var getLocation = $('#location').val();
            // var initialOwner = $('#owner').val();

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            // Append ID
            jsonData["shipmentId"];

            // Add updated time
            jsonData["updatedAt"] = currentDateTime();

            var updatedAt = jsonData["updatedAt"];

            var loggedInEmail = jsonData["loggedInEmail"];
            var userRole = jsonData["userRole"];

            delete jsonData["loggedInEmail"];
            delete jsonData["userRole"];

            // Delete Owner Variable from JSON
            delete jsonData["owner"];
            var putEditShipmentURL = domainUrl + "/Shipment/" + jsonData["shipmentId"];

            var updateInitialShipOwnership = {
                "$class": "org.evin.book.track.ShipOwnership",
                "owner": owner,
                "shipment": "resource:org.evin.book.track.Shipment#" + shipmentId
            }

            var updateOrderStatusURL = domainUrl + "/updateOrderStatus";
            var updateOrderStatusData = {
                "$class": "org.evin.book.track.updateOrderStatus",
                "order": "resource:org.evin.book.track.OrderContract#" + jsonData["contract"],
                "orderStatus": "DELIVERED",
                "updatedAt": updatedAt,
                "participantInvoking": "resource:org.evin.book.track." + userRole + "#" + loggedInEmail
            }

            var updateShipmentStatusURL = domainUrl + "/updateShipmentStatus";

            var editShipmentDistributorData = {
                "shipment": "resource:org.evin.book.track.Shipment#" + jsonData["shipmentId"],
                "ShipmentStatus": jsonData["ShipmentStatus"],
                "updatedAt": updatedAt,
                "participantInvoking": "resource:org.evin.book.track." + userRole + "#" + loggedInEmail
            }

            var updateShipmentItemStatusURL = domainUrl + "/updateShipmentItemStatus";
            var editShipmentItemStatusData = {
                "shipment": "resource:org.evin.book.track.Shipment#" + jsonData["shipmentId"],
                "itemStatus": jsonData["itemStatus"],
                "updatedAt": updatedAt,
                "participantInvoking": "resource:org.evin.book.track." + userRole + "#" + loggedInEmail
            }

            var postCustomerOwnerURL = domainUrl + '/ShipOwnership';
            var postCustomerOwnerData = {
                "shipment": "resource:org.evin.book.track.Shipment#" + jsonData["shipmentId"],
                "owner": "resource:org.evin.book.track.Customer#" + jsonData["customerId"],
                "participantInvoking": "resource:org.evin.book.track." + userRole + "#" + loggedInEmail
            }

            console.log("JSON SENT => " + JSON.stringify(jsonData));

            console.log("editShipmentItemStatus Sent Data =>" + JSON.stringify(editShipmentItemStatusData));
            console.log("editShipmentDistributorData Sent Data =>" + JSON.stringify(editShipmentDistributorData));

            var msgHTML = "";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //Check if shipment is delivered
            if (jsonData["ShipmentStatus"] == "DELIVERED") {

                //
                // 1. Update ShipmentOwnership to customers by getting
                // 2. Update Shipment Status
                // 3. Update updateOrderStatus
                // 4. Update ItemStatus
                // 5. Frontend - lock distributor & publisher actions
                // 6. Frontend - Unlock review on customer actions to review

                // 1. Update ShipmentOwnership to customers by getting
                $.ajax({
                    type: 'POST',
                    url: postCustomerOwnerURL,
                    data: postCustomerOwnerData,
                    dataType: 'json',
                    beforeSend: function () {//calls the loader id tag
                        $("#frmEditShipment .close").click();
                        $("#loader").show();
                    },
                    success: function (data) {
                        // 2. Update Shipment Status
                        $.ajax({
                            type: 'POST',
                            url: updateShipmentStatusURL,
                            data: editShipmentDistributorData,
                            dataType: 'json',
                            beforeSend: function () {//calls the loader id tag
                                $("#frmEditShipment .close").click();
                                $("#loader").show();
                            },
                            success: function (data) {
                                console.log("Executed updateShipmentStatusURL successfully");
                                // 3. Update updateOrderStatus
                                $.ajax({
                                    type: 'POST',
                                    url: updateOrderStatusURL,
                                    data: updateOrderStatusData,
                                    dataType: 'json',
                                    beforeSend: function () {//calls the loader id tag
                                        $("#frmEditShipment .close").click();
                                        $("#loader").show();
                                    },
                                    success: function (data) {
                                        console.log("Executed updateOrderStatusURL successfully");
                                        // 4. Update ItemStatus
                                        $.ajax({
                                            type: 'POST',
                                            url: updateShipmentItemStatusURL,
                                            data: editShipmentItemStatusData,
                                            dataType: 'json',
                                            beforeSend: function () {//calls the loader id tag
                                                $("#frmEditShipment .close").click();
                                                $("#loader").show();
                                            },
                                            success: function (data) {
                                                console.log("Executed updateShipmentItemStatusURL successfully");
                                                $("#loader").hide();

                                                console.log("Success +++> " + JSON.stringify(data));
                                                $("#edit-shipment-error-bag").hide();
                                                $("#edit-shipment-msgs").show();

                                                msgHTML = '<div class="alert alert-primary" role="alert">'
                                                    + 'Record Added Successfuly '
                                                    + '</div>';

                                                $('#edit-shipment-msgs').html(msgHTML);

                                                $('#frmEditShipment').trigger("reset");
                                                $("#frmEditShipment .close").click();
                                                window.location.reload();


                                            },
                                            error: function (data) {
                                                var errors = $.parseJSON(data.responseText);
                                                var status = errors.error.statusCode;
                                                $("#edit-shipment-errors").show();
                                                // if (status == 500) {
                                                if (status == 422) {
                                                    console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                                    console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                                    $("#edit-shipment-msgs").hide();

                                                    $('#edit-shipment-errors').html('');
                                                    $.each(errors.error.details.messages, function (key, value) {
                                                        console.log('Error Value' + value + ' Key ' + key);
                                                        $('#edit-shipment-errors').append('<li>' + key + ' ' + value + '</li>');
                                                    });

                                                } else {
                                                    $('#edit-shipment-errors').html(errors.error.message);
                                                }
                                                $("#loader").hide();
                                                $('#editShipmentModal').modal('show');
                                                $("#edit-shipment-error-bag").show();
                                            }
                                        });
                                    },
                                    error: function (data) {
                                        var errors = $.parseJSON(data.responseText);
                                        var status = errors.error.statusCode;
                                        $("#edit-shipment-errors").show();
                                        // if (status == 500) {
                                        if (status == 422) {
                                            console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                            console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                            $("#edit-shipment-msgs").hide();

                                            $('#edit-shipment-errors').html('');
                                            $.each(errors.error.details.messages, function (key, value) {
                                                console.log('Error Value' + value + ' Key ' + key);
                                                $('#edit-shipment-errors').append('<li>' + key + ' ' + value + '</li>');
                                            });

                                        } else {
                                            $('#edit-shipment-errors').html(errors.error.message);
                                        }
                                        $("#loader").hide();
                                        $('#editShipmentModal').modal('show');
                                        $("#edit-shipment-error-bag").show();
                                    }
                                });

                            },
                            error: function (data) {
                                var errors = $.parseJSON(data.responseText);
                                var status = errors.error.statusCode;
                                $("#edit-shipment-errors").show();
                                // if (status == 500) {
                                if (status == 422) {
                                    console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                    console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                    $("#edit-shipment-msgs").hide();

                                    $('#edit-shipment-errors').html('');
                                    $.each(errors.error.details.messages, function (key, value) {
                                        console.log('Error Value' + value + ' Key ' + key);
                                        $('#edit-shipment-errors').append('<li>' + key + ' ' + value + '</li>');
                                    });

                                } else {
                                    $('#edit-shipment-errors').html(errors.error.message);
                                }
                                $("#loader").hide();
                                $('#editShipmentModal').modal('show');
                                $("#edit-shipment-error-bag").show();
                            }
                        });
                    },
                    error: function (data) {
                        var errors = $.parseJSON(data.responseText);
                        var status = errors.error.statusCode;
                        $("#edit-shipment-errors").show();
                        // if (status == 500) {
                        if (status == 422) {
                            console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                            console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                            $("#edit-shipment-msgs").hide();

                            $('#edit-shipment-errors').html('');
                            $.each(errors.error.details.messages, function (key, value) {
                                console.log('Error Value' + value + ' Key ' + key);
                                $('#edit-shipment-errors').append('<li>' + key + ' ' + value + '</li>');
                            });

                        } else {
                            $('#edit-shipment-errors').html(errors.error.message);
                        }
                        $("#loader").hide();
                        $('#editShipmentModal').modal('show');
                        $("#edit-shipment-error-bag").show();
                    }
                });

            } else {
                // data:  JSON.stringify(jsonData),
                $.ajax({
                    type: 'POST',
                    url: updateShipmentStatusURL,
                    data: editShipmentDistributorData,
                    dataType: 'json',
                    beforeSend: function () {//calls the loader id tag
                        $("#frmEditShipment .close").click();
                        $("#loader").show();
                    },
                    success: function (data) {
                        // Updating Item
                        $.ajax({
                            type: 'POST',
                            url: updateShipmentItemStatusURL,
                            data: editShipmentItemStatusData,
                            dataType: 'json',
                            beforeSend: function () {//calls the loader id tag
                                $("#frmEditShipment .close").click();
                                $("#loader").show();
                            },
                            success: function (data) {

                                $("#loader").hide();

                                console.log("Success +++> " + JSON.stringify(data));
                                $("#edit-shipment-error-bag").hide();
                                $("#edit-shipment-msgs").show();

                                msgHTML = '<div class="alert alert-primary" role="alert">'
                                    + 'Record Added Successfuly '
                                    + '</div>';

                                $('#edit-shipment-msgs').html(msgHTML);

                                $('#frmEditShipment').trigger("reset");
                                $("#frmEditShipment .close").click();
                                window.location.reload();


                            },
                            error: function (data) {
                                var errors = $.parseJSON(data.responseText);
                                var status = errors.error.statusCode;
                                $("#edit-shipment-errors").show();
                                // if (status == 500) {
                                if (status == 422) {
                                    console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                                    console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                                    $("#edit-shipment-msgs").hide();

                                    $('#edit-shipment-errors').html('');
                                    $.each(errors.error.details.messages, function (key, value) {
                                        console.log('Error Value' + value + ' Key ' + key);
                                        $('#edit-shipment-errors').append('<li>' + key + ' ' + value + '</li>');
                                    });

                                } else {
                                    $('#edit-shipment-errors').html(errors.error.message);
                                }
                                $("#loader").hide();
                                $('#editShipmentModal').modal('show');
                                $("#edit-shipment-error-bag").show();
                            }
                        });

                    },
                    error: function (data) {
                        var errors = $.parseJSON(data.responseText);
                        var status = errors.error.statusCode;
                        $("#edit-shipment-errors").show();
                        // if (status == 500) {
                        if (status == 422) {
                            console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                            console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                            $("#edit-shipment-msgs").hide();

                            $('#edit-shipment-errors').html('');
                            $.each(errors.error.details.messages, function (key, value) {
                                console.log('Error Value' + value + ' Key ' + key);
                                $('#edit-shipment-errors').append('<li>' + key + ' ' + value + '</li>');
                            });

                        } else {
                            $('#edit-shipment-errors').html(errors.error.message);
                        }
                        $("#loader").hide();
                        $('#editShipmentModal').modal('show');
                        $("#edit-shipment-error-bag").show();
                    }
                });

            }

        });
    };

    /**
     * Posting the Profile edit form
     */
    var handleEditProfile = function () {
        console.log("handleEditProfile");
        $("#add-error-profile-bag").hide();
        // var bookId = randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

        profileEditSbtBtn.on('click', function () {
            var json = frmProfile.serializeArray();
            // var memberId = $('#email').val();
            console.log('Publisher memberId Edit ==> ' + memberId);
            var jsonData = {};

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            var memberId = jsonData['email'];
            console.log("Progress Sent Edit Data =>" + JSON.stringify(jsonData));
            if (jsonData['role'] == 'Admin') {
                var profileEditURL = domainUrl + '/Admin/' + memberId;
            } else if (jsonData['role'] == 'Customer') {
                jsonData['firstName'] = jsonData['firstNameCustomer'];
                delete jsonData['firstNameCustomer'];
                var profileEditURL = domainUrl + '/Customer/' + memberId;
            } else if (jsonData['role'] == 'Publisher') {
                var profileEditURL = domainUrl + '/Publisher/' + memberId;
            } else if (jsonData['role'] == 'Distributor') {
                var profileEditURL = domainUrl + '/Distributor/' + memberId;
            }

            // Delete unwanted keys
            delete jsonData['county'];
            delete jsonData['country'];
            delete jsonData['street'];
            delete jsonData['role'];

            // Append Address
            jsonData["address"] = {
                "$class": "org.evin.book.track.Address",
                "county": $("#county").val(),
                "country": $("#country").val(),
                "street": $("#street").val(),
                "zip": "string"
            };

            console.log("EDIT JSON SENT => " + JSON.stringify(jsonData));
            console.log('Publisher ID Edit jsonData ==> ' + jsonData.id);

            console.log('URL => ' + profileEditURL);

            var msgHTML = "";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // data:  JSON.stringify(jsonData),
            $.ajax({
                type: 'PUT',
                url: profileEditURL,
                data: jsonData,
                dataType: 'json',
                beforeSend: function () {//calls the loader id tag
                    // $("#frmEditPublisher .close").click();
                    $("#loader").show();
                },
                success: function (data) {
                    $("#loader").hide();
                    console.log("Success +++> " + JSON.stringify(data));
                    $("#add-error-profile-bag").hide();

                    msgHTML = '<div class="alert alert-primary" role="alert">'
                        + 'Profile Edited Successfuly '
                        + '</div>';

                    $('#msgAlertProfile').html(msgHTML);

                    // $('#frmEditPublisher').trigger("reset");
                    // $("#frmEditPublisher .close").click();
                    // window.location.reload();
                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;
                    $('#msgAlertProfile').html("");
                    // if (status == 500) {
                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#edit-publisher-msgs").hide();

                        $('#add-profile-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#add-profile-errors').append('<li>' + key + ' ' + value + '</li>');
                        });

                    } else {
                        $('#add-profile-errors').html(errors.error.message);
                    }
                    $("#loader").hide();
                    // $('#editPublisherModal').modal('show');
                    $("#add-error-profile-bag").show();
                }
            }); // END Ajax

        }); // END OnClick Submit

    };

    var handlePostPublisher = function () {
        console.log("===================");
        console.log("handlePostPublisher");
        $("#add-error-bag").hide();
        var memberId = "P-" + randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

        publisherSbtBtn.on('click', function () {
            var json = frmAddPublisher.serializeArray();
            var jsonData = {};

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            // Append ID
            jsonData["memberId"] = memberId;

            // Append Address
            jsonData["address"] = {
                "$class": "org.evin.book.track.Address",
                "county": $("#county").val(),
                "country": $("#country").val(),
                "street": $("#street").val(),
                "zip": "string"
            };

            // Delete unwanted keys
            delete jsonData['county'];
            delete jsonData['country'];
            delete jsonData['street'];

            console.log("JSON SENT => " + JSON.stringify(jsonData));

            // var saveUrl = "./formdata?view=828:0&KF=" + userID + "&oper=edit";
            console.log("Progress Sent Data =>" + JSON.stringify(jsonData));

            var msgHTML = "";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // data:  JSON.stringify(jsonData),
            $.ajax({
                type: 'POST',
                url: postPublisherURL,
                data: jsonData,
                dataType: 'json',
                beforeSend: function () {//calls the loader id tag
                    $("#frmAddPublisher .close").click();
                    $("#loader").show();
                },
                success: function (data) {
                    $("#loader").hide();
                    console.log("Success +++> " + JSON.stringify(data));
                    $("#add-error-bag").hide();
                    $("#add-publisher-msgs").show();
                    msgHTML = '<div class="alert alert-primary" role="alert">'
                        + 'Record Added Successfuly '
                        + '</div>';
                    // msgHTML = '<div class="alert alert-primary" role="alert">'
                    // + JSON.stringify(data)
                    // + '</div>';
                    $('#add-publisher-msgs').html(msgHTML);

                    $('#frmAddPublisher').trigger("reset");
                    $("#frmAddPublisher .close").click();
                    window.location.reload();
                },
                error: function (data) {

                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;
                    // if (status == 500) {
                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#add-publisher-msgs").hide();

                        $('#add-publisher-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#add-publisher-errors').append('<li>' + key + ' ' + value + '</li>');
                        });

                    } else {
                        $('#add-publisher-errors').html(errors.error.message);
                    }
                    $("#loader").hide();
                    $('#addPublisherModal').modal('show');
                    $("#add-error-bag").show();
                }
            });

        });
    };

    /**
     * Posting the Publisher edit form
     */
    var handleEditPublisher = function () {
        console.log("handleEditPublisher");
        $("#edit-error-bag").hide();
        // var bookId = randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

        publisherEditSbtBtn.on('click', function () {
            var json = frmEditPublisher.serializeArray();
            // var memberId = $('#email').val();
            console.log('Publisher memberId Edit ==> ' + memberId);
            var jsonData = {};

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            // Append ID
            // jsonData["memberId"] = memberId;

            // Append Address
            jsonData["address"] = {
                "$class": "org.evin.book.track.Address",
                "county": $("#county").val(),
                "country": $("#country").val(),
                "street": $("#street").val(),
                "zip": "string"
            };

            // Delete unwanted keys
            delete jsonData['county'];
            delete jsonData['country'];
            delete jsonData['street'];
            var memberId = jsonData['email'];

            console.log("EDIT JSON SENT => " + JSON.stringify(jsonData));
            console.log('Publisher ID Edit jsonData ==> ' + jsonData.id);

            // var saveUrl = "./formdata?view=828:0&KF=" + userID + "&oper=edit";
            console.log("Progress Sent Edit Data =>" + JSON.stringify(jsonData));
            var postEditPublisherURL = domainUrl + '/Publisher/' + memberId;

            var msgHTML = "";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // data:  JSON.stringify(jsonData),
            $.ajax({
                type: 'PUT',
                url: postEditPublisherURL,
                data: jsonData,
                dataType: 'json',
                beforeSend: function () {//calls the loader id tag
                    $("#frmEditPublisher .close").click();
                    $("#loader").show();
                },
                success: function (data) {
                    $("#loader").hide();
                    console.log("Success +++> " + JSON.stringify(data));
                    $("#edit-error-bag").hide();
                    $("#edit-publisher-msgs").show();

                    msgHTML = '<div class="alert alert-primary" role="alert">'
                        + 'Record Added Successfuly '
                        + '</div>';

                    $('#edit-publisher-msgs').html(msgHTML);

                    $('#frmEditPublisher').trigger("reset");
                    $("#frmEditPublisher .close").click();
                    window.location.reload();
                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;
                    // if (status == 500) {
                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#edit-publisher-msgs").hide();

                        $('#edit-publisher-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#edit-publisher-errors').append('<li>' + key + ' ' + value + '</li>');
                        });

                    } else {
                        $('#edit-publisher-errors').html(errors.error.message);
                    }
                    $("#loader").hide();
                    $('#editPublisherModal').modal('show');
                    $("#edit-error-bag").show();
                }
            }); // END Ajax

        }); // END OnClick Submit

    };

    /**
     * Posting the Delete Publisher Form
     */
    var handleDeletePublisher = function () {
        console.log("handleDeletePublisher");
        $("#edit-error-bag").hide();
        // var bookId = randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

        publisherDeleteSbtBtn.on('click', function () {

            var publisherEmail = $('#publisher_email_del').val();

            console.log("Delete Publisher ID => " + publisherEmail);

            var postDeletePublisherURL = domainUrl + '/Publisher/' + publisherEmail;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // data:  JSON.stringify(jsonData),
            $.ajax({
                type: 'DELETE',
                url: postDeletePublisherURL,
                dataType: 'json',
                beforeSend: function () {//calls the loader id tag
                    $("#frmDeletePublisher .close").click();
                    $("#loader").show();
                },
                success: function (data) {
                    $("#loader").hide();
                    console.log("Success +++> " + JSON.stringify(data));
                    $("#frmDeletePublisher .close").click();
                    window.location.reload();
                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;
                    // if (status == 500) {
                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#delete-publisher-msgs").hide();

                        $('#delete-publisher-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#delete-publisher-errors').append('<li>' + key + ' ' + value + '</li>');
                        });
                    } else {
                        $('#delete-publisher-errors').html(errors.error.message);
                    }
                    $("#loader").hide();
                    $('#deletePublisherModal').modal('show');
                    $("#delete-error-bag").show();

                }
            }); // END Ajax

        }); // END OnClick Submit

    };

    /**
     * Posting the Distributor add form
     */
    var handlePostDistributor = function () {
        console.log("===================");
        console.log("handlePostDistributor");
        $("#add-error-bag").hide();
        var memberId = "D-" + randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

        distributorSbtBtn.on('click', function () {
            var json = frmAddDistributor.serializeArray();
            var jsonData = {};

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            // Append ID
            jsonData["memberId"] = memberId;

            // Append Address
            jsonData["address"] = {
                "$class": "org.evin.book.track.Address",
                "county": $("#county").val(),
                "country": $("#country").val(),
                "street": $("#street").val(),
                "zip": "string"
            };

            // Delete unwanted keys
            delete jsonData['county'];
            delete jsonData['country'];
            delete jsonData['street'];

            console.log("JSON SENT => " + JSON.stringify(jsonData));

            // var saveUrl = "./formdata?view=828:0&KF=" + userID + "&oper=edit";
            console.log("Progress Sent Data =>" + JSON.stringify(jsonData));

            var msgHTML = "";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // data:  JSON.stringify(jsonData),
            $.ajax({
                type: 'POST',
                url: postDistributorURL,
                data: jsonData,
                dataType: 'json',
                beforeSend: function () {//calls the loader id tag
                    $("#frmAddDistributor .close").click();
                    $("#loader").show();
                },
                success: function (data) {
                    $("#loader").hide();
                    console.log("Success +++> " + JSON.stringify(data));
                    $("#add-error-bag").hide();
                    $("#add-distributor-msgs").show();

                    msgHTML = '<div class="alert alert-primary" role="alert">'
                        + 'Record Added Successfuly '
                        + '</div>';

                    $('#add-distributor-msgs').html(msgHTML);

                    $('#frmAddDistributor').trigger("reset");
                    $("#frmAddDistributor .close").click();
                    window.location.reload();
                },
                error: function (data) {

                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;
                    // if (status == 500) {
                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#add-distributor-msgs").hide();

                        $('#add-distributor-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#add-distributor-errors').append('<li>' + key + ' ' + value + '</li>');
                        });

                    } else {
                        $('#add-distributor-errors').html(errors.error.message);
                    }
                    $("#loader").hide();
                    $('#addDistributorModal').modal('show');
                    $("#add-error-bag").show();
                }
            });

        });
    };

    /**
     * Posting the Distributor edit form
     */
    var handleEditDistributor = function () {
        console.log("handleEditDistributor");
        $("#edit-error-bag").hide();
        // var bookId = randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

        distributorEditSbtBtn.on('click', function () {
            var json = frmEditDistributor.serializeArray();
            // var memberId = $('#email').val();
            console.log('Distributor memberId Edit ==> ' + memberId);
            var jsonData = {};

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            // Append ID
            // jsonData["memberId"] = memberId;

            // Append Address
            jsonData["address"] = {
                "$class": "org.evin.book.track.Address",
                "county": $("#county").val(),
                "country": $("#country").val(),
                "street": $("#street").val(),
                "zip": "string"
            };

            // Delete unwanted keys
            delete jsonData['county'];
            delete jsonData['country'];
            delete jsonData['street'];
            var memberId = jsonData['email'];

            console.log("EDIT JSON SENT => " + JSON.stringify(jsonData));
            console.log('Distributor ID Edit jsonData ==> ' + jsonData.id);

            // var saveUrl = "./formdata?view=828:0&KF=" + userID + "&oper=edit";
            console.log("Progress Sent Edit Data =>" + JSON.stringify(jsonData));
            var postEditDistributorURL = domainUrl + '/Distributor/' + memberId;

            var msgHTML = "";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // data:  JSON.stringify(jsonData),
            $.ajax({
                type: 'PUT',
                url: postEditDistributorURL,
                data: jsonData,
                dataType: 'json',
                beforeSend: function () {//calls the loader id tag
                    $("#frmEditDistributor .close").click();
                    $("#loader").show();
                },
                success: function (data) {
                    $("#loader").hide();
                    console.log("Success +++> " + JSON.stringify(data));
                    $("#edit-error-bag").hide();
                    $("#edit-distributor-msgs").show();

                    msgHTML = '<div class="alert alert-primary" role="alert">'
                        + 'Record Added Successfuly '
                        + '</div>';

                    $('#edit-distributor-msgs').html(msgHTML);

                    $('#frmEditDistributor').trigger("reset");
                    $("#frmEditDistributor .close").click();
                    window.location.reload();
                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;
                    // if (status == 500) {
                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#edit-distributor-msgs").hide();

                        $('#edit-distributor-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#edit-distributor-errors').append('<li>' + key + ' ' + value + '</li>');
                        });

                    } else {
                        $('#edit-distributor-errors').html(errors.error.message);
                    }
                    $("#loader").hide();
                    $('#editDistributorModal').modal('show');
                    $("#edit-error-bag").show();
                }
            }); // END Ajax

        }); // END OnClick Submit

    };

    /**
     * Posting the Delete Publisher Form
     */
    var handleDeleteDistributor = function () {
        console.log("handleDeleteDistributor");
        $("#edit-error-bag").hide();
        // var bookId = randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

        distributorDeleteSbtBtn.on('click', function () {

            var distributorEmail = $('#distributor_email_del').val();

            console.log("Delete Distributor ID => " + distributorEmail);

            var postDeleteDistributorURL = domainUrl + '/Distributor/' + distributorEmail;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // data:  JSON.stringify(jsonData),
            $.ajax({
                type: 'DELETE',
                url: postDeleteDistributorURL,
                dataType: 'json',
                beforeSend: function () {//calls the loader id tag
                    $("#frmDeleteDistributor .close").click();
                    $("#loader").show();
                },
                success: function (data) {
                    $("#loader").hide();
                    console.log("Success +++> " + JSON.stringify(data));
                    $("#frmDeleteDistributor .close").click();
                    window.location.reload();
                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;
                    // if (status == 500) {
                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#delete-distributor-msgs").hide();

                        $('#delete-distributor-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#delete-distributor-errors').append('<li>' + key + ' ' + value + '</li>');
                        });
                    } else {
                        $('#delete-distributor-errors').html(errors.error.message);
                    }
                    $("#loader").hide();
                    $('#deleteDistributorModal').modal('show');
                    $("#delete-error-bag").show();

                }
            }); // END Ajax

        }); // END OnClick Submit

    };

    /**
     * Posting the Add Customer Form
     */
    var handlePostCustomer = function () {
        console.log("===================");
        console.log("handlePostCustomer");
        $("#add-error-bag").hide();
        var memberId = "C-" + randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

        customerSbtBtn.on('click', function () {
            var json = frmAddCustomer.serializeArray();
            var jsonData = {};

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            // Append ID
            jsonData["memberId"] = memberId;

            // Append Address
            jsonData["address"] = {
                "$class": "org.evin.book.track.Address",
                "county": $("#county").val(),
                "country": $("#country").val(),
                "street": $("#street").val(),
                "zip": "string"
            };

            // Delete unwanted keys
            delete jsonData['county'];
            delete jsonData['country'];
            delete jsonData['street'];

            console.log("JSON SENT => " + JSON.stringify(jsonData));

            // var saveUrl = "./formdata?view=828:0&KF=" + userID + "&oper=edit";
            console.log("Progress Sent Data =>" + JSON.stringify(jsonData));

            var msgHTML = "";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // data:  JSON.stringify(jsonData),
            $.ajax({
                type: 'POST',
                url: postCustomerURL,
                data: jsonData,
                dataType: 'json',
                beforeSend: function () {//calls the loader id tag
                    $("#frmAddCustomer .close").click();
                    $("#loader").show();
                },
                success: function (data) {
                    $("#loader").hide();
                    console.log("Success +++> " + JSON.stringify(data));
                    $("#add-error-bag").hide();
                    $("#add-customer-msgs").show();
                    msgHTML = '<div class="alert alert-primary" role="alert">'
                        + 'Record Added Successfuly '
                        + '</div>';
                    // msgHTML = '<div class="alert alert-primary" role="alert">'
                    // + JSON.stringify(data)
                    // + '</div>';
                    $('#add-customer-msgs').html(msgHTML);

                    $('#frmAddCustomer').trigger("reset");
                    $("#frmAddCustomer .close").click();
                    window.location.reload();
                },
                error: function (data) {

                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;
                    // if (status == 500) {
                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#add-customer-msgs").hide();

                        $('#add-customer-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#add-customer-errors').append('<li>' + key + ' ' + value + '</li>');
                        });

                    } else {
                        $('#add-customer-errors').html(errors.error.message);
                    }
                    $("#loader").hide();
                    $('#addCustomerModal').modal('show');
                    $("#add-error-bag").show();
                }
            });

        });
    };

    /**
  * Posting the Customer edit form
  */
    var handleEditCustomer = function () {
        console.log("handleEditCustomer");
        $("#edit-error-bag").hide();
        // var bookId = randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

        customerEditSbtBtn.on('click', function () {
            var json = frmEditCustomer.serializeArray();
            // var memberId = $('#email').val();
            console.log('Customer memberId Edit ==> ' + memberId);
            var jsonData = {};

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            // Append ID
            // jsonData["memberId"] = memberId;

            // Append Address
            jsonData["address"] = {
                "$class": "org.evin.book.track.Address",
                "county": $("#county").val(),
                "country": $("#country").val(),
                "street": $("#street").val(),
                "zip": "string"
            };

            // Delete unwanted keys
            delete jsonData['county'];
            delete jsonData['country'];
            delete jsonData['street'];

            var memberId = jsonData['email'];

            console.log("EDIT JSON SENT => " + JSON.stringify(jsonData));
            console.log('Customer ID Edit jsonData ==> ' + jsonData.id);

            // var saveUrl = "./formdata?view=828:0&KF=" + userID + "&oper=edit";
            console.log("Progress Sent Edit Data =>" + JSON.stringify(jsonData));
            var postEditCustomerURL = domainUrl + '/Customer/' + memberId;

            var msgHTML = "";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // data:  JSON.stringify(jsonData),
            $.ajax({
                type: 'PUT',
                url: postEditCustomerURL,
                data: jsonData,
                dataType: 'json',
                beforeSend: function () {//calls the loader id tag
                    $("#frmEditCustomer .close").click();
                    $("#loader").show();
                },
                success: function (data) {
                    $("#loader").hide();
                    console.log("Success +++> " + JSON.stringify(data));
                    $("#edit-error-bag").hide();
                    $("#edit-customer-msgs").show();

                    msgHTML = '<div class="alert alert-primary" role="alert">'
                        + 'Record Added Successfuly '
                        + '</div>';

                    $('#edit-customer-msgs').html(msgHTML);

                    $('#frmEditCustomer').trigger("reset");
                    $("#frmEditCustomer .close").click();
                    window.location.reload();
                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;
                    // if (status == 500) {
                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#edit-customer-msgs").hide();

                        $('#edit-customer-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#edit-customer-errors').append('<li>' + key + ' ' + value + '</li>');
                        });

                    } else {
                        $('#edit-customer-errors').html(errors.error.message);
                    }

                    $("#loader").hide();
                    $('#editCustomerModal').modal('show');
                    $("#edit-error-bag").show();
                }
            }); // END Ajax

        }); // END OnClick Submit

    };

    /**
    * Posting the Delete Customer Form
    */
    var handleDeleteCustomer = function () {
        console.log("handleDeleteCustomer");
        $("#edit-error-bag").hide();
        // var bookId = randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

        customerDeleteSbtBtn.on('click', function () {

            var customerEmail = $('#customer_email_del').val();

            console.log("Delete Customer ID => " + customerEmail);

            var postDeleteCustomerURL = domainUrl + '/Customer/' + customerEmail;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // data:  JSON.stringify(jsonData),
            $.ajax({
                type: 'DELETE',
                url: postDeleteCustomerURL,
                dataType: 'json',
                beforeSend: function () {//calls the loader id tag
                    $("#frmDeleteCustomer .close").click();
                    $("#loader").show();
                },
                success: function (data) {
                    $("#loader").hide();
                    console.log("Success +++> " + JSON.stringify(data));
                    $("#frmDeleteCustomer .close").click();
                    window.location.reload();
                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;
                    // if (status == 500) {
                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#delete-customer-msgs").hide();

                        $('#delete-customer-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#delete-customer-errors').append('<li>' + key + ' ' + value + '</li>');
                        });
                    } else {
                        $('#delete-customer-errors').html(errors.error.message);
                    }
                    $("#loader").hide();
                    $('#deleteCustomerModal').modal('show');
                    $("#delete-error-bag").show();

                }
            }); // END Ajax

        }); // END OnClick Submit

    };

    /**
     * Function to save 
     * 
     */
    var handlePostSelectDistributor = function () {
        console.log("handlePostSelectDistributor");
        $("#add-ship-ownership-error-bag").hide();
        // var bookId = randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

        shipmentSelectDistributorSbtBtn.on('click', function () {

            var shipment = $('#shipment_owner').val();
            var owner = $('#selectDistributor').val();
            var loggedInEmail = $('#loggedInEmail').val();
            var userRole = $('#userRole').val();

            var shipmentClass = "resource:org.evin.book.track.Shipment#" + shipment;
            var ownerClass = "resource:org.evin.book.track.Distributor#" + owner;

            var json = frmAddCustomer.serializeArray();
            var jsonData = {};

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            // Append ID
            jsonData["shipment"] = shipmentClass;
            jsonData["owner"] = ownerClass;
            jsonData["participantInvoking"] = "resource:org.evin.book.track." + userRole + "#" + loggedInEmail;


            console.log("Save New Owner ID => " + shipment + " " + owner);

            var postSelectDistributorURL = domainUrl + '/ShipOwnership';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // data:  JSON.stringify(jsonData),
            $.ajax({
                type: 'POST',
                url: postSelectDistributorURL,
                data: jsonData,
                dataType: 'json',
                beforeSend: function () {//calls the loader id tag
                    $("#frmSelectDistributor .close").click();
                    $("#loader").show();
                },
                success: function (data) {
                    $("#loader").hide();
                    console.log("Success +++> " + JSON.stringify(data));
                    $("#frmSelectDistributor .close").click();
                    window.location.reload();
                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;
                    // if (status == 500) {
                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#add-ship-ownership-msgs").hide();

                        $('#add-ship-ownership-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#add-ship-ownership-errors').append('<li>' + key + ' ' + value + '</li>');
                        });
                    } else {
                        $('#add-ship-ownership-errors').html(errors.error.message);
                    }
                    $("#loader").hide();
                    $('#selectDistributorModal').modal('show');
                    $("#add-ship-ownership-error-bag").show();

                }
            }); // END Ajax

        }); // END OnClick Submit

    };

    /**
     * Function to redirect
     * @param {*} UrlLink 
     */
    function redirectTo(UrlLink) {
        window.setTimeout(function () {
            // Move to a new location or you can do something else
            // window.location.href = "/book";
            window.location.href = UrlLink;
        }, 3000);
    }

    /**
     * Function to Log in User
     */
    var handlePostLogin = function () {
        console.log("handlePostLogin");
        $("#add-error-bag").hide();
        var msgHTML = '';

        loginSbtBtn.on('click', function () {
            var json = frmLogin.serializeArray();
            var jsonData = {};

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            console.log("LOGIN JSON SENT => " + JSON.stringify(jsonData));

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if (jsonData["participant"] == "Customer") {
                customerLoginUrl = domainUrl + "/Customer/" + jsonData["email"];

                // delete participant object
                delete jsonData["participant"];

                console.log("CUSTOMER LOGIN");

                $.ajax({
                    type: 'GET',
                    url: customerLoginUrl,
                    data: jsonData,
                    dataType: 'json',
                    beforeSend: function () {
                        // calls the loader id tag
                        // $("#book_form .close").click();
                        // $("#loader").show();
                    },
                    success: function (data) {
                        // $("#loader").hide();

                        // Setting token
                        setToken(data);

                        console.log("Success +++> " + JSON.stringify(data));
                        $("#add-error-login-bag").hide();

                        if (data.secret == jsonData["secret"]) {
                            msgHTML = '<div class="alert alert-primary" role="alert">'
                                + ' Login Successfuly. You will be redirected to Dashboard'
                                + '</div>';

                            $('#msgAlert').html(msgHTML);

                            redirectTo('/dashboard');
                        } else {
                            msgHTML = '<div class="alert alert-danger" role="alert">'
                                + 'Invalid Email / Password'
                                + '</div>';

                            $('#msgAlert').html(msgHTML);

                            redirectTo('/auth/login');
                        }
                    },
                    error: function (data) {
                        var errors = $.parseJSON(data.responseText);
                        var status = errors.error.statusCode;

                        if (status == 422) {
                            console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                            console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));

                            $('#add-login-errors').html('');
                            msgHTML = '<div class="alert alert-danger" role="alert">'
                                + '<ul>';
                            $.each(errors.error.details.messages, function (key, value) {
                                console.log('Error Value' + value + ' Key ' + key);
                                msgHTML += '<li>' + key + ' ' + value + '</li>';
                                // $('#add-login-errors').append('<li>' + key + ' ' + value + '</li>');
                            });
                            msgHTML += '</ul>'
                                + '</div>';

                            $('#msgAlert').html(msgHTML)

                        } else {
                            // console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                            msgHTML = '<div class="alert alert-danger" role="alert">'
                                + 'Invalid Email / Password'
                                + '</div>';

                            $('#msgAlert').html(msgHTML);
                        }
                    }
                });
            } else if (jsonData["participant"] == "Distributor") {

                console.log("DISTRIBUTOR LOGIN");

                distributorLoginUrl = domainUrl + "/Distributor/" + jsonData["email"];

                // delete participant object
                delete jsonData["participant"];

                $.ajax({
                    type: 'GET',
                    url: distributorLoginUrl,
                    data: jsonData,
                    dataType: 'json',
                    beforeSend: function () {
                        // calls the loader id tag
                        // $("#book_form .close").click();
                        // $("#loader").show();
                    },
                    success: function (data) {
                        // $("#loader").hide();

                        // Setting token
                        setToken(data);

                        console.log("Success +++> " + JSON.stringify(data));
                        $("#add-error-login-bag").hide();

                        if (data.secret == jsonData["secret"]) {
                            msgHTML = '<div class="alert alert-primary" role="alert">'
                                + ' Login Successfuly. You will be redirected to Dashboard'
                                + '</div>';

                            $('#msgAlert').html(msgHTML);

                            redirectTo('/dashboard');
                        } else {
                            msgHTML = '<div class="alert alert-danger" role="alert">'
                                + 'Invalid Email / Password'
                                + '</div>';

                            $('#msgAlert').html(msgHTML);

                            redirectTo('/auth/login');
                        }
                    },
                    error: function (data) {
                        var errors = $.parseJSON(data.responseText);
                        var status = errors.error.statusCode;

                        if (status == 422) {
                            console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                            console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));

                            $('#add-login-errors').html('');
                            msgHTML = '<div class="alert alert-danger" role="alert">'
                                + '<ul>';
                            $.each(errors.error.details.messages, function (key, value) {
                                console.log('Error Value' + value + ' Key ' + key);
                                msgHTML += '<li>' + key + ' ' + value + '</li>';
                                // $('#add-login-errors').append('<li>' + key + ' ' + value + '</li>');
                            });
                            msgHTML += '</ul>'
                                + '</div>';

                            $('#msgAlert').html(msgHTML)

                        } else {
                            // console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                            msgHTML = '<div class="alert alert-danger" role="alert">'
                                + 'Invalid Email / Password'
                                + '</div>';

                            $('#msgAlert').html(msgHTML);
                        }
                    }
                });

            } else if (jsonData["participant"] == "Publisher") {
                // Publisher
                console.log("PUBLISHER LOGIN");

                publisherLoginUrl = domainUrl + "/Publisher/" + jsonData["email"];

                // delete participant object
                delete jsonData["participant"];

                $.ajax({
                    type: 'GET',
                    url: publisherLoginUrl,
                    data: jsonData,
                    dataType: 'json',
                    beforeSend: function () {
                        // calls the loader id tag
                        // $("#book_form .close").click();
                        // $("#loader").show();
                    },
                    success: function (data) {
                        // $("#loader").hide();

                        // Setting token
                        setToken(data);

                        console.log("Success +++> " + JSON.stringify(data));
                        $("#add-error-login-bag").hide();

                        if (data.secret == jsonData["secret"]) {
                            msgHTML = '<div class="alert alert-primary" role="alert">'
                                + ' Login Successfuly. You will be redirected to Dashboard'
                                + '</div>';

                            $('#msgAlert').html(msgHTML);

                            redirectTo('/dashboard');
                        } else {
                            msgHTML = '<div class="alert alert-danger" role="alert">'
                                + 'Invalid Email / Password'
                                + '</div>';

                            $('#msgAlert').html(msgHTML);

                            redirectTo('/auth/login');
                        }
                    },
                    error: function (data) {
                        var errors = $.parseJSON(data.responseText);
                        var status = errors.error.statusCode;

                        if (status == 422) {
                            console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                            console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));

                            $('#add-login-errors').html('');
                            msgHTML = '<div class="alert alert-danger" role="alert">'
                                + '<ul>';
                            $.each(errors.error.details.messages, function (key, value) {
                                console.log('Error Value' + value + ' Key ' + key);
                                msgHTML += '<li>' + key + ' ' + value + '</li>';
                                // $('#add-login-errors').append('<li>' + key + ' ' + value + '</li>');
                            });
                            msgHTML += '</ul>'
                                + '</div>';

                            $('#msgAlert').html(msgHTML)

                        } else {
                            // console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                            msgHTML = '<div class="alert alert-danger" role="alert">'
                                + 'Invalid Email / Password'
                                + '</div>';

                            $('#msgAlert').html(msgHTML);
                        }
                    }
                });
            } else {
                // Admin
                console.log("ADMIN LOGIN");

                adminLoginUrl = domainUrl + "/Admin/" + jsonData["email"];

                // delete participant object
                delete jsonData["participant"];

                $.ajax({
                    type: 'GET',
                    url: adminLoginUrl,
                    data: jsonData,
                    dataType: 'json',
                    beforeSend: function () {
                        // calls the loader id tag
                        // $("#book_form .close").click();
                        // $("#loader").show();
                    },
                    success: function (data) {
                        // $("#loader").hide();

                        // Setting token
                        setToken(data);

                        console.log("Success +++> " + JSON.stringify(data));
                        $("#add-error-login-bag").hide();

                        if (data.secret == jsonData["secret"]) {
                            msgHTML = '<div class="alert alert-primary" role="alert">'
                                + ' Login Successfuly. You will be redirected to Dashboard'
                                + '</div>';

                            $('#msgAlert').html(msgHTML);

                            redirectTo('/dashboard');
                        } else {
                            msgHTML = '<div class="alert alert-danger" role="alert">'
                                + 'Invalid Email / Password'
                                + '</div>';

                            $('#msgAlert').html(msgHTML);

                            redirectTo('/auth/book-counterfeit-admin');
                        }
                    },
                    error: function (data) {
                        var errors = $.parseJSON(data.responseText);
                        var status = errors.error.statusCode;

                        if (status == 422) {
                            console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                            console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));

                            $('#add-login-errors').html('');
                            msgHTML = '<div class="alert alert-danger" role="alert">'
                                + '<ul>';
                            $.each(errors.error.details.messages, function (key, value) {
                                console.log('Error Value' + value + ' Key ' + key);
                                msgHTML += '<li>' + key + ' ' + value + '</li>';
                                // $('#add-login-errors').append('<li>' + key + ' ' + value + '</li>');
                            });
                            msgHTML += '</ul>'
                                + '</div>';

                            $('#msgAlert').html(msgHTML)

                        } else {
                            // console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                            msgHTML = '<div class="alert alert-danger" role="alert">'
                                + 'Invalid Email / Password'
                                + '</div>';

                            $('#msgAlert').html(msgHTML);
                        }
                    }
                });
            }

        });
    };

    var handlePostRegistration = function () {
        console.log("handlePostRegistration");
        $("#add-error-bag").hide();
        var memberID = randomString(5, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        var msgHTML = '';

        registerSbtBtn.on('click', function () {
            var json = frmRegister.serializeArray();
            var jsonData = {};

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if (jsonData["participant"] == "Customer") {
                //remove business name
                // jsonData["firstName"] = jsonData["firstNameCustomer"];
                if (jsonData["isRetailer"] == "0") {
                    jsonData["firstName"] = jsonData["firstNameCustomer"];
                    delete jsonData["firstNameCustomer"];
                }
                delete jsonData["firstNameCustomer"];
                delete jsonData["participant"];
                jsonData["memberId"] = "C-" + memberID;

                $.ajax({
                    type: 'POST',
                    url: postCustomerURL,
                    data: jsonData,
                    dataType: 'json',
                    beforeSend: function () {//calls the loader id tag
                        // $("#book_form .close").click();
                        // $("#loader").show();
                    },
                    success: function (data) {
                        // $("#loader").hide();
                        console.log("Success +++> " + JSON.stringify(data));
                        $("#add-error-reg-bag").hide();

                        msgHTML = '<div class="alert alert-primary" role="alert">'
                            + data.firstName + ' Added Successfuly. You will be redirected to Login momentarily'
                            + '</div>';

                        $('#msgAlert').html(msgHTML);

                        window.setTimeout(function () {
                            // Move to a new location or you can do something else
                            window.location.href = "/auth/login";
                        }, 5000);
                    },
                    error: function (data) {
                        var errors = $.parseJSON(data.responseText);
                        var status = errors.error.statusCode;

                        if (status == 422) {
                            console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                            console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));

                            $('#add-reg-errors').html('');
                            $.each(errors.error.details.messages, function (key, value) {
                                console.log('Error Value' + value + ' Key ' + key);
                                $('#add-reg-errors').append('<li>' + key + ' ' + value + '</li>');
                            });

                        } else {
                            console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                            $('#add-reg-errors').html(errors.error.message);
                        }
                        // hide loader
                        // $("#loader").hide();

                        // Show modal to display error showed
                        // $('#addBookModal').modal('show');
                        $("#add-error-reg-bag").show();
                    }
                });
            } else if (jsonData["participant"] == "Distributor") {
                // remove individual name
                // delete jsonData["firstName"];
                //remove business name
                // delete jsonData["name"];
                delete jsonData["firstNameCustomer"];
                delete jsonData["lastName"];
                delete jsonData["participant"];

                jsonData["memberId"] = "D-" + memberID;

                $.ajax({
                    type: 'POST',
                    url: postDistributorURL,
                    data: jsonData,
                    dataType: 'json',
                    beforeSend: function () {//calls the loader id tag
                        // $("#book_form .close").click();
                        // $("#loader").show();
                    },
                    success: function (data) {
                        // $("#loader").hide();
                        console.log("Success +++> " + JSON.stringify(data));
                        $("#add-error-reg-bag").hide();

                        msgHTML = '<div class="alert alert-primary" role="alert">'
                            + data.firstName + ' Added Successfuly. You will be redirected to Login momentarily'
                            + '</div>';

                        $('#msgAlert').html(msgHTML);

                        window.setTimeout(function () {
                            // Move to a new location or you can do something else
                            window.location.href = "/auth/login";
                        }, 5000);
                    },
                    error: function (data) {
                        var errors = $.parseJSON(data.responseText);
                        var status = errors.error.statusCode;

                        if (status == 422) {
                            console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                            console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));

                            $('#add-reg-errors').html('');
                            $.each(errors.error.details.messages, function (key, value) {
                                console.log('Error Value' + value + ' Key ' + key);
                                $('#add-reg-errors').append('<li>' + key + ' ' + value + '</li>');
                            });

                        } else {
                            console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                            $('#add-reg-errors').html(errors.error.message);
                        }
                        // hide loader
                        // $("#loader").hide();

                        // Show modal to display error showed
                        // $('#addBookModal').modal('show');
                        $("#add-error-reg-bag").show();
                    }
                });
            } else {
                // Publisher

                // remove individual name
                // delete jsonData["firstName"];
                //remove business name
                // delete jsonData["name"];
                delete jsonData["firstNameCustomer"];
                delete jsonData["lastName"];
                delete jsonData["participant"];

                jsonData["memberId"] = "P-" + memberID;

                $.ajax({
                    type: 'POST',
                    url: postPublisherURL,
                    data: jsonData,
                    dataType: 'json',
                    beforeSend: function () {//calls the loader id tag
                        // $("#book_form .close").click();
                        // $("#loader").show();
                    },
                    success: function (data) {
                        // $("#loader").hide();
                        console.log("Success +++> " + JSON.stringify(data));
                        $("#add-error-reg-bag").hide();

                        msgHTML = '<div class="alert alert-primary" role="alert">'
                            + data.firstName + ' Added Successfuly. You will be redirected to Login momentarily'
                            + '</div>';

                        $('#msgAlert').html(msgHTML);

                        window.setTimeout(function () {
                            // Move to a new location or you can do something else
                            window.location.href = "/auth/login";
                        }, 5000);
                    },
                    error: function (data) {
                        var errors = $.parseJSON(data.responseText);
                        var status = errors.error.statusCode;

                        if (status == 422) {
                            console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                            console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));

                            $('#add-reg-errors').html('');
                            $.each(errors.error.details.messages, function (key, value) {
                                console.log('Error Value' + value + ' Key ' + key);
                                $('#add-reg-errors').append('<li>' + key + ' ' + value + '</li>');
                            });

                        } else {
                            console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                            $('#add-reg-errors').html(errors.error.message);
                        }
                        // hide loader
                        // $("#loader").hide();

                        // Show modal to display error showed
                        // $('#addBookModal').modal('show');
                        $("#add-error-reg-bag").show();
                    }
                });
            }

            // Append ID
            // jsonData["id"] = bookId;

            console.log("REGISTER JSON SENT => " + JSON.stringify(jsonData));

            // Setting token
            // setToken();

            // var authToken = localStorage.getItem('auth_token');
            // var authTokenParsedData = JSON.parse(authToken);

            // // check if token is set
            // if(authTokenParsedData != undefined && authTokenParsedData != null){
            //     console.log("Token -> " + JSON.stringify(authToken));
            //     console.log("Parsed Token -> " + authTokenParsedData.token);
            //     window.location.assign('/book');
            // }

        });
    };

    var handleFetchWards = function () {
        var wardsBaseURL = 'https://frozen-basin-45055.herokuapp.com/api/wards?county=';
        var county = $("#county").val();
        var county = "Nairobi";
        var wardsURL = wardsBaseURL + county;

        console.log("COUNTY = " + county);
        console.log("Wards = " + wards[0].name);
        console.log("Wards Size = " + wards.length);

        var denomination = document.getElementById("ward")
        for (var i = 0; i < wards.length; i++) {
            var option = document.createElement("OPTION"),
                txt = document.createTextNode(wards[i].name);
            option.appendChild(txt);
            option.setAttribute("value", wards[i].name);
            denomination.insertBefore(option, denomination.lastChild);
        }

    };

    /**
     * Extracts value after Hash
     * @param {*} words 
     */
    function getValueAfterHash(words) {
        var n = words.split("#");
        return n[n.length - 1];

    }
    /**
     * Function to post transaction history
     */
    var handleTransactionHistory = function () {
        console.log("handleTransactionHistory");
        $("#add-transaction-error-bag").hide();

        function readableTime(time) {
            var res = time.split("T");
            var time = readableT(time);
            return res[0] + " , " + time;
        }

        function readableT(time) {
            var d = new Date(time);
            var hours = d.getUTCHours();
            var minutes = d.getUTCMinutes();
            var seconds = d.getUTCSeconds();
            return hours + ":" + minutes + ":" + seconds;
        }

        // Get the model basedon the transaction
        function getModel(transName) {

            if (transName == "getIsConfimedReportHistorian") {
                var IDs = new Object();

                IDs['model'] = "Report";
                IDs['filter'] = "report";

                return IDs;

            } else if (transName == "getOrderStatusHistorian") {

                var IDs = new Object();

                IDs['model'] = "OrderContract";
                IDs['filter'] = "order";

                return IDs;

            } else if (transName == "getBookOwnershipHistorian") {

                var IDs = new Object();

                IDs['model'] = "Shipment";
                IDs['filter'] = "shipmentId";

                return IDs;

            } else if (transName == "getShipmentStatusHistorian") {

                var IDs = new Object();

                IDs['model'] = "Shipment";
                IDs['filter'] = "shipment";

                return IDs;
            } else if (transName == "getShipmentItemStatusHistorian") {

                var IDs = new Object();

                IDs['model'] = "Shipment";
                IDs['filter'] = "shipment";

                return IDs;

            } else if (transName == "getScanBookHistorian") {

                var IDs = new Object();

                IDs['model'] = "Customer";
                IDs['filter'] = "customer";

                return IDs;
            }

        }

        // Format the data
        function formatData(transName, data) {

            var msgHTML = "";

            if (transName == "getIsConfimedReportHistorian") {

                for (var i = 0; i < data.length; i++) {
                    msgHTML += '<tr>'
                        + '<td>' + getValueAfterHash(data[i].report) + '</td>'
                        + '<td>' + data[i].isConfirmed + '</td>'
                        + '<td>' + getValueAfterHash(data[i].participantInvoking) + '</td>'
                        + '<td>' + readableTime(data[i].updatedAt) + '</td>'
                        + '<td>' + readableTime(data[i].timestamp) + '</td>'
                        + '</tr>';
                }

                $("#records").html(msgHTML);

                $('#transactionViewModal').modal('show');

            } else if (transName == "getOrderStatusHistorian") {

                for (var i = 0; i < data.length; i++) {
                    msgHTML += '<tr>'
                        + '<td>' + getValueAfterHash(data[i].order) + '</td>'
                        + '<td>' + data[i].orderStatus + '</td>'
                        + '<td>' + getValueAfterHash(data[i].participantInvoking) + '</td>'
                        + '<td>' + readableTime(data[i].updatedAt) + '</td>'
                        + '<td>' + readableTime(data[i].timestamp) + '</td>'
                        + '</tr>';
                }

                $("#order_status").html(msgHTML);

                $('#orderStatusViewModal').modal('show');

            } else if (transName == "getShipmentStatusHistorian") {

                for (var i = 0; i < data.length; i++) {
                    msgHTML += '<tr>'
                        + '<td>' + getValueAfterHash(data[i].shipment) + '</td>'
                        + '<td>' + data[i].ShipmentStatus + '</td>'
                        + '<td>' + getValueAfterHash(data[i].participantInvoking) + '</td>'
                        + '<td>' + readableTime(data[i].updatedAt) + '</td>'
                        + '<td>' + readableTime(data[i].timestamp) + '</td>'
                        + '</tr>';
                }

                $("#shipment_status").html(msgHTML);

                $('#shipmentStatusViewModal').modal('show');

            } else if (transName == "getBookOwnershipHistorian") {

                for (var i = 0; i < data.length; i++) {
                    msgHTML += '<tr>'
                        + '<td>' + getValueAfterHash(data[i].shipment) + '</td>'
                        + '<td>' + getValueAfterHash(data[i].owner) + '</td>'
                        + '<td>' + getValueAfterHash(data[i].participantInvoking) + '</td>'
                        + '<td>' + readableTime(data[i].timestamp) + '</td>'
                        + '</tr>';
                }

                $("#shipment_book_ownership").html(msgHTML);

                $('#shipmentBookOwnershipStatusViewModal').modal('show');

            } else if (transName == "getShipmentItemStatusHistorian") {

                for (var i = 0; i < data.length; i++) {
                    msgHTML += '<tr>'
                        + '<td>' + getValueAfterHash(data[i].shipment) + '</td>'
                        + '<td>' + data[i].itemStatus + '</td>'
                        + '<td>' + getValueAfterHash(data[i].participantInvoking) + '</td>'
                        + '<td>' + readableTime(data[i].updatedAt) + '</td>'
                        + '<td>' + readableTime(data[i].timestamp) + '</td>'
                        + '</tr>';
                }

                $("#shipment_item_status").html(msgHTML);

                $('#shipmentItemStatusViewModal').modal('show');

            } else if (transName == "getScanBookHistorian") {

                for (var i = 0; i < data.length; i++) {
                    msgHTML += '<tr>'
                        + '<td>' + getValueAfterHash(data[i].customer) + '</td>'
                        + '<td>' + data[i].accountBalance + '</td>'
                        + '<td>' + getValueAfterHash(data[i].participantInvoking) + '</td>'
                        + '<td>' + readableTime(data[i].updatedAt) + '</td>'
                        + '<td>' + readableTime(data[i].timestamp) + '</td>'
                        + '</tr>';
                }

                $("#customer_book_scan_status").html(msgHTML);

                $('#customerBookScanStatusViewModal').modal('show');

            }

        }

        transactionHistorySbtBtn.on('click', function () {
            var json = transactionForm.serializeArray();
            var jsonData = {};

            console.log("handleTransactionHistory");

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            var loggedInUser = jsonData['loggedInUser'];
            var role = jsonData['role'];
            var transName = jsonData['transaction_name'];
            var itemID = jsonData['itemID'];
            var modelName = getModel(transName);

            console.log("Here => " + loggedInUser + " " + role + " " + transName + " " + itemID + " " + modelName['model']);

            console.log("JSON SENT => " + JSON.stringify(jsonData));

            // var saveUrl = "./formdata?view=828:0&KF=" + userID + "&oper=edit";
            console.log("Progress Sent Data =>" + JSON.stringify(jsonData));

            var msgHTML = "";

            var getIsConfimedReportHistorianURL = domainUrl + "/queries/" + transName + "?" + modelName['filter'] + "=resource%3Aorg.evin.book.track." + modelName['model'] + "%23" + itemID;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // data:  JSON.stringify(jsonData),
            $.ajax({
                type: 'GET',
                url: getIsConfimedReportHistorianURL,
                beforeSend: function () {//calls the loader id tag
                    $("#book_form .close").click();
                    $("#loader").show();
                },
                success: function (data) {

                    $("#loader").hide();

                    // console.log("Success +++> " + JSON.stringify(data));
                    console.log(data);
                    console.log(data.length);

                    if (data.length > 0) {

                        formatData(transName, data);

                    } else {
                        msgHTML = '<div class="alert alert-warning" role="alert">'
                            + 'No Transaction history found for ' + itemID + ' item ID.'
                            + '</div>';

                        $("#add-transaction-msgs").html(msgHTML);
                    }



                    // window.location.href = '/verify/book/' + data.id;
                },
                error: function (data) {
                    $("#loader").hide();
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;

                    if (status == 422) {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#add-transaction-msgs").hide();

                        $('#add-transaction-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#add-transaction-errors').append('<li>' + key + ' ' + value + '</li>');
                        });

                    } else {
                        console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                        $('#add-transaction-errors').html(errors.error.message);
                        // $('#add-transaction-errors').html('<li>WARNING!!! The Book is a possible counterfeit.</li>');
                    }
                    // hide loader
                    $("#loader").hide();

                    // Show modal to display error showed
                    // $('#transactionViewModal').modal('show');
                    $("#add-transaction-error-bag").show();
                }
            });

        });
    };


    // function you can use:
    function getAfterHarsh(str) {
        return str.split('#')[1];
    }

    // Check if value contains SHIP_
    // to show book has already been assigned another shipment
    // therefore cannot be reassigned another shipment
    // returns boolean
    function checkShipmentID(str) {
        var shipID = getAfterHarsh(str);
        var bool = shipID.includes("SHIP_");
        return bool;
    }

    // Get current Date Time in GMT+0300 (East Africa Time)
    function currentDateTime() {
        var dt = new Date();
        dt.setHours(dt.getHours() + 3);

        return dt;
    }

    return {
        //main function to initiate the theme
        init: function (Args) {
            args = Args;
            // Handle Book EndPoints
            handlePostBook();
            handleEditBook();
            handleDeleteBook();
            handleVerifyBook();
            handleVerifyBookOthers();

            // Handle Order EndPoints
            handlePostOrder();
            handleEditOrder();
            handleDeleteOrder();

            // Handle Shipment
            handlePostShipment();
            handleEditShipment();
            handlePostBookShipment();
            handlePostSelectDistributor();

            // Handle Publisher
            handlePostPublisher();
            handleEditPublisher();
            handleDeletePublisher();

            // Handle Distributor
            handlePostDistributor();
            handleEditDistributor();
            handleDeleteDistributor();

            // Handle Customer
            handlePostCustomer();
            handleEditCustomer();
            handleDeleteCustomer();

            // Handle Review
            handlePostReview();

            // Login
            handlePostLogin();

            // Register
            handlePostRegistration();

            // Profile
            handleEditProfile();

            // Review
            handlePostReport();
            handlePostReportOthers();

            // Purchase Book
            handleBuyBook();

            // Transaction
            handleTransactionHistory();

            // Fetch Wards
            // handleFetchWards();

            // Verify BookShop
            handleBookShopVerification();
        }
    }

}();
