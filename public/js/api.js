var Api = function () {
    // http://localhost:3000/api/Book
    var domainUrl = 'http://localhost:3000/api';
    var postBookURL = domainUrl + '/Book';
    var postOrderURL = domainUrl + '/OrderContract';
    var postShipmentURL = domainUrl + '/Shipment';
    var updateOrderStatusURL = domainUrl + '/updateOrderStatus';
    var shipOwnershipURL = domainUrl + '/ShipOwnership';
    var postPublisherURL = domainUrl + '/Publisher';
    var postDistributorURL = domainUrl + '/Distributor';
    var postCustomerURL = domainUrl + '/Customer';

    // var postBookURL = '/book';

    /**
     * Forms
     */
    // Book
    var bookForm = $("#book_form");
    var frmEditBook = $("#frmEditBook");

    // Order
    var frmAddOrder = $("#frmAddOrder");
    var frmEditOrder = $("#frmEditOrder");

    // Shipment
    var frmAddShipment = $("#frmAddShipment");

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

    // Buttons
    var bookSbtBtn = $('#book_form .btn-add-book');
    var bookEditSbtBtn = $('#frmEditBook .btn-edit-book');
    var bookDeleteSbtBtn = $('#frmDeleteBook .btn-delete-book');

    var orderSbtBtn = $('#frmAddOrder .btn-add-order');
    var orderEditSbtBtn = $('#frmEditOrder .btn-edit-order');
    var orderDeleteSbtBtn = $('#frmDeleteOrder .btn-delete-order');

    var shipmentSbtBtn = $('#frmAddShipment .btn-add-shipment');

    var publisherSbtBtn = $('#frmAddPublisher .btn-add-publisher');
    var publisherEditSbtBtn = $('#frmEditPublisher .btn-edit-publisher');
    var publisherDeleteSbtBtn = $('#frmDeletePublisher .btn-delete-publisher');

    var distributorSbtBtn = $('#frmAddDistributor .btn-add-distributor');
    var distributorEditSbtBtn = $('#frmEditDistributor .btn-edit-distributor');
    var distributorDeleteSbtBtn = $('#frmDeleteDistributor .btn-delete-distributor');

    var customerSbtBtn = $('#frmAddCustomer .btn-add-customer');
    var customerEditSbtBtn = $('#frmEditCustomer .btn-edit-customer');
    var customerDeleteSbtBtn = $('#frmDeleteCustomer .btn-delete-customer');

    var handlePostBook = function () {
        console.log("handlePostBook");
        $("#add-error-bag").hide();
        var bookId = randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

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
        $("#add-error-bag").hide();
        var orderId = 'CON_' + randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

        orderSbtBtn.on('click', function () {
            var json = frmAddOrder.serializeArray();
            var jsonData = {};

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            // Append ID
            jsonData["contractId"] = orderId;

            // Set default status 
            jsonData["orderStatus"] = 'WAITING';

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
                    $("#add-error-bag").hide();
                    $("#add-order-msgs").show();
                    msgHTML = '<div class="alert alert-primary" role="alert">'
                        + 'Record Added Successfuly '
                        + '</div>';

                    $('#add-order-msgs').html(msgHTML);

                    $('#frmAddOrder').trigger("reset");
                    $("#frmAddOrder .close").click();
                    window.location.reload();
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
                    $("#add-error-bag").show();
                }
            });

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

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            console.log("EDIT JSON SENT => " + JSON.stringify(jsonData));
            console.log('Order ID Edit jsonData ==> ' + jsonData.contractId);

            console.log("Progress Sent Edit Data =>" + JSON.stringify(jsonData));
            var putEditOrderURL = domainUrl + '/OrderContract/' + OrderId;

            var msgHTML = "";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
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
            }); // END Ajax

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
        $("#add-error-bag").hide();
        var shipmentId = 'SHIP_' + randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        var owner = "org.evin.book.track.Publisher#publisher1@gmail.com";
        shipmentSbtBtn.on('click', function () {
            var json = frmAddShipment.serializeArray();
            var jsonData = {};

            var getLocation = $('#location').val();
            // var initialOwner = $('#owner').val();

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            // Append ID
            jsonData["shipmentId"] = shipmentId;

            // Set Default Status
            jsonData["shipmentStatus"] = 'WAITING';

            // update latitude
            jsonData.location = {
                "$class": "org.evin.book.track.Location",
                "latLong": getLocation
            }

            //update owner
            // jsonData.shipOwnership = [{
            //     "$class": "org.evin.book.track.ShipOwnership",
            //     "owner": owner,
            //     "shipment": "resource:org.evin.book.track.Shipment#" + shipmentId
            // }];

            var updateInitialShipOwnership = {
                "$class": "org.evin.book.track.ShipOwnership",
                "owner": owner,
                "shipment": "resource:org.evin.book.track.Shipment#" + shipmentId
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
                        "orderStatus": "PROCESSED"
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

                                    $("#add-error-bag").hide();
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
                                    $("#add-error-bag").show();
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
                            $("#add-error-bag").show();
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
                    $("#add-error-bag").show();
                }
            });

        });
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

            var publisherEmail = $('#email').val();

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
                    // msgHTML = '<div class="alert alert-primary" role="alert">'
                    // + JSON.stringify(data)
                    // + '</div>';
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
                success: function (data) {
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

            var distributorEmail = $('#email').val();

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
                success: function (data) {
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
                success: function (data) {
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

            var customerEmail = $('#email').val();

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


    return {
        //main function to initiate the theme
        init: function (Args) {
            args = Args;
            // Handle Book EndPoints
            handlePostBook();
            handleEditBook();
            handleDeleteBook();

            // Handle Order EndPoints
            handlePostOrder();
            handleEditOrder();
            handleDeleteOrder();

            // Handle Shipment
            handlePostShipment();

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
        }
    }

}();
