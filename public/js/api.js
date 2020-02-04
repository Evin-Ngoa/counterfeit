var Api = function () {
    // http://localhost:3000/api/Book
    var domainUrl = 'http://localhost:3000/api';
    // var postBookURL = domainUrl + '/Book';
    var postBookURL = '/book';

    // FOrms
    var bookForm = $("#book_form")

    // Buttons
    var bookSbtBtn = $('#book_form .btn-add-book');

    var handlePostBook = function () {
        console.log("Post");
        $("#add-error-bag").hide();

        bookSbtBtn.on('click', function () {
            var json = bookForm.serializeArray();
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
                url: postBookURL,
                data:  jsonData,
                // data: {
                //     initialOwner: $("#book_form select[name=initialOwner]").val(),
                //     type: $("#book_form input[name=type]").val(),
                //     id: $("#book_form input[name=id]").val(),
                //     sold: $("#book_form input[name=sold]").val(),
                //     author: $("#book_form input[name=author]").val(),
                //     edition: $("#book_form input[name=edition]").val(),
                //     price: $("#book_form input[name=price]").val(),
                //     description: $("#book_form textarea[name=description]").val()
                // },
                dataType: 'json',
                success: function (data) {
                    console.log("Success +++> " + JSON.stringify(data));
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
                    // msgHTML = '<div class="alert alert-danger" role="alert">'
                    //     + errors.error.message
                    //     + '</div>';
                    console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error));
                    console.log("Errors >>!!!!!!! " + JSON.stringify(errors.messages));
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

    return {
        //main function to initiate the theme
        init: function (Args) {
            args = Args;
            handlePostBook();

        }
    }

}();