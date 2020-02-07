
/**
 * Show edit form with the values
* @param {*} task_id 
*/
function editBookForm(book_id) {
    console.log("Clicked Edit form");
    $.ajax({
        type: 'GET',
        url: '/book/' + book_id + '/edit',
        success: function (data) {
            console.log("Data Edit" + data.book.id);
            $("#edit-error-bag").hide();
            $("#id").val(data.book.id);
            // $("#frmEditBook input[name=id]").val(data.book.id);
            $("#frmEditBook input[name=type]").val(data.book.type);
            $("#frmEditBook input[name=author]").val(data.book.author);
            $("#frmEditBook input[name=edition]").val(data.book.edition);
            $("#frmEditBook textarea[name=description]").val(data.book.description);
            $("#frmEditBook input[name=initialOwner]").val(data.book.initialOwner);
            $("#frmEditBook input[name=sold]").val(data.book.sold);
            $("#frmEditBook input[name=price]").val(data.book.price);
            // $("#frmEditBook input[name=$class]").val(data.book.$class);
            $('#editBookModal').modal('show');
        },
        error: function (data) {
            console.log(data);
        }
    });
}
