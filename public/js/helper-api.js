
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

