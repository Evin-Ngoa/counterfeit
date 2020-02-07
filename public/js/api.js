var Api = function () {
    // http://localhost:3000/api/Book
    var domainUrl = 'http://localhost:3000/api';
    var postBookURL = domainUrl + '/Book';
    // var postBookURL = '/book';

    // FOrms
    var bookForm = $("#book_form")

    // Buttons
    var bookSbtBtn = $('#book_form .btn-add-book');

    var handlePostBook = function () {
        console.log("Post");
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

                    // $('#book_form').trigger("reset");
                    // $("#book_form .close").click();
                    // window.location.reload();
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
     * Posting the edit form
     */
    var handleEditBook = function () {
            console.log("handleEditBook");

    };


    return {
        //main function to initiate the theme
        init: function (Args) {
            args = Args;
            handlePostBook();
            handleEditBook();

        }
    }

}();
