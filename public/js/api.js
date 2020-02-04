var Api = function () {
    // http://localhost:3000/api/Book
    var domainUrl = 'http://localhost:3000/api';
    var postBookURL = domainUrl + '/Book';

    // FOrms
    var bookForm = $("#book_form")

    // Buttons
    var bookSbtBtn = $('#book_form .btn-add-book');

    var handlePostBook = function () {
        console.log("Post");

        bookSbtBtn.on('click', function () {
            var json = bookForm.serializeArray();
            var jsonData = {};

            $.each(json, function (i, field) {
                jsonData[field.name] = field.value;
            });
            console.log("JSON SENT => "+ JSON.stringify(jsonData));

            // var saveUrl = "./formdata?view=828:0&KF=" + userID + "&oper=edit";
            console.log("Progress Sent Data =>" + JSON.stringify(jsonData));

            var msgHTML =  "";

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
                dataType: 'json',
                success: function(data) {
                    console.log("Success +++> " + JSON.stringify(data));
                    msgHTML = '<div class="alert alert-primary" role="alert">'
                    + 'Successfuly Rcord added'
                    + '</div>';
                    // msgHTML = '<div class="alert alert-primary" role="alert">'
                    // + JSON.stringify(data)
                    // + '</div>';
                    $('#add-book-msgs').html(msgHTML);

                    $('#book_form').trigger("reset");
                    $("#book_form .close").click();
                    window.location.reload();
                },
                error: function(data) {
                    var errors = $.parseJSON(data.responseText);
                    msgHTML = '<div class="alert alert-danger" role="alert">'
                    + errors.error.message
                    + '</div>';
                    console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error));
                    $('#add-book-msgs').html(msgHTML);
                    // $.each(errors.messages, function(key, value) {
                    //     $('#add-book-msgs').append('<li>' + value + '</li>');
                    // });
                    // $("#add-error-bag").show();
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