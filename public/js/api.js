var Api = function () {
    // http://localhost:3000/api/Book
    var domainUrl = 'http://localhost:3000/api';
    var postBookURL = domainUrl + '/Book';
    var postOrderURL = domainUrl + '/OrderContract';

    // var postBookURL = '/book';

    // FOrms
    var bookForm = $("#book_form");
    var frmEditBook = $("#frmEditBook");

    var frmAddOrder = $("#frmAddOrder");
    var frmEditOrder = $("#frmEditOrder");

    // Buttons
    var bookSbtBtn = $('#book_form .btn-add-book');
    var bookEditSbtBtn = $('#frmEditBook .btn-edit-book');
    var bookDeleteSbtBtn = $('#frmDeleteBook .btn-delete-book');

    var orderSbtBtn = $('#frmAddOrder .btn-add-order');
    var orderEditSbtBtn = $('#frmEditOrder .btn-edit-order');

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
                success: function (data) {
                    console.log("Success +++> " + JSON.stringify(data));
                    $("#add-error-bag").hide();
                    $("#add-book-msgs").show();
                    msgHTML = '<div class="alert alert-primary" role="alert">'
                        + 'Record Added Successfuly '
                        + '</div>';
                    // msgHTML = '<div class="alert alert-primary" role="alert">'
                    // + JSON.stringify(data)
                    // + '</div>';
                    $('#add-book-msgs').html(msgHTML);

                    $('#book_form').trigger("reset");
                    $("#book_form .close").click();
                    window.location.reload();
                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);

                    console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error));
                    console.log("Errors >>!!!!!!! " + JSON.stringify(errors.messages));
                    $("#add-book-msgs").hide();
                    // $('#add-book-msgs').html(msgHTML);
                    $('#add-book-errors').html('');
                    $.each(errors.messages, function (key, value) {
                        console.log('Error Value' + value);
                        $('#add-book-errors').append('<li>' + value + '</li>');
                    });
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
                success: function (data) {
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

                    console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error));
                    console.log("Errors >>!!!!!!! " + JSON.stringify(errors.messages));
                    $("#edit-book-msgs").hide();
                    // $('#edit-book-msgs').html(msgHTML);
                    $('#edit-book-errors').html('');
                    $.each(errors.messages, function (key, value) {
                        console.log('Error Value' + value);
                        $('#edit-book-errors').append('<li>' + value + '</li>');
                    });
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
                success: function (data) {
                    console.log("Success +++> " + JSON.stringify(data));
                    $("#frmDeleteBook .close").click();
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
        var orderId = randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

        orderSbtBtn.on('click', function () {
            var json = frmAddOrder.serializeArray();
            var jsonData = {};

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });

            // Append ID
            jsonData["contractId"] = orderId;

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
                success: function (data) {
                    console.log("Success +++> " + JSON.stringify(data));
                    $("#add-error-bag").hide();
                    $("#add-order-msgs").show();
                    msgHTML = '<div class="alert alert-primary" role="alert">'
                        + 'Record Added Successfuly '
                        + '</div>';
                    // msgHTML = '<div class="alert alert-primary" role="alert">'
                    // + JSON.stringify(data)
                    // + '</div>';
                    $('#add-order-msgs').html(msgHTML);

                    $('#frmAddOrder').trigger("reset");
                    $("#frmAddOrder .close").click();
                    window.location.reload();
                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    var status = errors.error.statusCode;
                    if (status == 500) {
                        $('#add-order-errors').html(errors.error.message);
                    } else {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#add-order-msgs").hide();
                        // $('#add-order-msgs').html(msgHTML);
                        $('#add-order-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#add-order-errors').append('<li>' + key + ' ' + value + '</li>');
                        });
                    }

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
                success: function (data) {
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
                    if (status == 500) {
                        $('#add-order-errors').html(errors.error.message);
                    } else {
                        console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                        console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                        $("#add-order-msgs").hide();
                        // $('#add-order-msgs').html(msgHTML);
                        $('#add-order-errors').html('');
                        $.each(errors.error.details.messages, function (key, value) {
                            console.log('Error Value' + value + ' Key ' + key);
                            $('#add-order-errors').append('<li>' + key + ' ' + value + '</li>');
                        });
                    }
                    $("#edit-error-bag").show();
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
        }
    }

}();
