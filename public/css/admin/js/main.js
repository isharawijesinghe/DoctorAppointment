$('.country').find('.drop').find('a').on('click',function (event) {
    event.preventDefault();
    $('#edit-modal').modal();
});


$('#modal-save').on('click', function () {

    $.ajax({

        method: 'POST',
        url: urlEdit,
        data: {field: $('#post-body').val(),_token: token}
    })
        .done(function () {
            $('#edit-modal').modal('hide');
            location.reload();

        });
});