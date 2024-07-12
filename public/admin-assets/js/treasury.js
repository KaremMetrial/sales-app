$(document).ready(function () {
    $(document).on('input', '#search_by_text', function (e) {
        var search_by_text = $(this).val();
        var token_search = $('#token_search').val();
        var ajax_search_url = $('#ajax_search_url').val();

        jQuery.ajax({
            url: ajax_search_url,
            type: 'POST',
            dataType: 'html',
            cache: false,
            data: {
                search_by_text: search_by_text,
                _token: token_search,
            },
            success: function (data) {
                $('#ajax_response_search').html(data);
            },
            error: function () {
                // Handle the error
            }
        });
    });

    $(document).on('click', '#ajax_pagination_in_search a', function (e) {
        e.preventDefault();
        var search_by_text = $('#search_by_text').val();
        var url = $(this).attr('href');
        var token_search = $('#token_search').val();

        jQuery.ajax({
            url: url,
            type: 'POST',
            dataType: 'html',
            cache: false,
            data: {
                search_by_text: search_by_text,
                _token: token_search,
            },
            success: function (data) {
                $('#ajax_response_search').html(data);
            },
            error: function () {
                // Handle the error
            }
        });
    });
});
