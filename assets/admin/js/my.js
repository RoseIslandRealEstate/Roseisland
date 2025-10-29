// Remove success alert after 3s
if ($('.alert-success').length) {
    setTimeout(function(){
        $('.alert-success').remove();
    }, 3000);
}

// Use delegated event for dynamically loaded buttons
$(document).on('click', 'div .edit_loader', function() {
    var url = $(this).data('url');
    $('.loader_holder').addClass('active');
    $('#edit_modal').html('');
    $.get(url, function(data) {
        $('.loader_holder').removeClass('active');
        $('#edit_modal').html(data);
        bindEditRow(); // renamed for clar
        
    });
});
// Filter form submit (also fine-tuned)
$(document).on('submit', '.filter_form', function(e) {
    var ex = $('input[name="export"]:checked').val();
    if (ex == 1) {
        return true; 
    }
    e.preventDefault();
    var url = $(this).attr('action');
    var items = $(this).serialize();
    var fullUrl = url + '?' + items;
    window.history.pushState({}, '', fullUrl);
    $('.filter_holder').addClass('active');
    $('.table_div').html('');
    $.get(url, items, function(data) {
        $('.table_div').html(data); 
        $('.filter_holder').removeClass('active');
    });
});

// Function to bind form inside edit modal
function bindEditRow() {
    $(document).on('submit', '#edit_modal .update_row', function(e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var id = $(this).data('id');
        let el = $(this);
        var items = $(this).serialize();

        // Disable form inputs & buttons
        el.find('input, select, textarea, button').prop('disabled', true);
        el.addClass('active');

        $.post(url, items, function(data) {
            // Update row
            el.removeClass('active');
            $('.edit_loader_tr[data-id="' + id + '"]').html(data)
                .addClass('updated_row');

            // Success message
            el.prepend('<div class="success alert-success text-center alert_success_msg">Done Successfully</div>');

            // Re-enable form after short delay
            setTimeout(() => {
                $('.alert-success').remove();
                el.find('input, select, textarea, button').prop('disabled', false);
            
            }, 2000);
        });
    });

}
$('.add_row').submit(function(e){
    e.preventDefault();
    var url = $(this).attr('action');
    var items = $(this).serialize();
    let el = $(this);
    el.addClass('acive');
    el.find('input, select, textarea, button').prop('disabled', true);
    $.post(url,items,function(data){
        $('.table_div tbody').prepend(data);
        el.removeClass('acive');
        $('.add_row')[0].reset();
        el.prepend('<div class="success alert-success text-center alert_success_msg">Add Successfully</div>');
         
        setTimeout(() => {
            $('.alert-success').remove();
            el.find('input, select, textarea, button').prop('disabled', false);
        }, 2000);
    });
})
$(document).on('click', '.table_div .page-link', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
     window.history.pushState({}, '', url);
    $('.filter_holder').addClass('active');
    $.get(url,function(data){
        $('.table_div').html(data); 
        $('.filter_holder').removeClass('active');
    })
    
});
$(document).on('click', '.note_view', function(e) {
    e.preventDefault();
    let url = $(this).data('url'); // URL to mark note as viewed
    let link = $(this).find('a[href^="http"]'); // the real link inside (lead link)

    // Send mark-as-viewed request
    $.get(url, function() {
        // After marking as viewed, redirect
        if (link.length) {
            window.location.href = link.attr('href');
        }
    });
});
$('.add_form').submit(function(e){
    e.preventDefault();
    let el = $(this);
    var url = el.attr('action');
    var items = el.serialize();
    var cl = el.attr('data-class');
     el.find('input, select, textarea, button').prop('disabled', true);
    $.post(url, items, function(data) {
        $(cl).prepend(data);
        el.find('input, select, textarea, button').prop('disabled', false); // ✅ re-enable form elements
        el[0].reset(); // optional: reset the form after submission
    });
})
$(document).on('change', '.update_status', function() {
    let el = $(this);
    let status = el.is(':checked') ? 1 : 0; 
    var url = el.data('url');
    el.prop('disabled',true);
    $.post(url, {
        status: status,
        _token: $('meta[name="csrf-token"]').attr('content')
    }, function(response) {
        el.prop('disabled',false);
    }).fail(function() {
        alert('Error updating status');
    });
});
$(document).ready(function () {
    $('.nestable-with-handle').nestable({
        handleClass: 'dd3-handle'
    }).on('change', function (e) {
        var list = $(this).nestable('serialize');
        $.ajax({
            url: '/roseland/to-do-lists/update-order', // your backend route
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                order: list
            },
            beforeSend: function () {
                console.log('Saving new order...');
            },
            success: function (response) {
                console.log('Order saved:', response);
                toastr.success('Order updated successfully');
            },
            error: function (xhr) {
                console.log('Error saving order:', xhr.responseText);
                toastr.error('Error saving order');
            }
        });
    });
});


