$('form[method=POST]').each(function() {
    $(this).submit(function() {
        $('button[type=submit]').prop('disabled', true).html('<i class="fa fa-spinner fa-pulse mr-1"></i> Proses...');
    })
})
