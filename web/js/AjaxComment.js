$(document).ready(function() {

    /** Обнулить данные в модалке */
    $('body').on('click', '.js-main-comment', function(e) {
        cleanFields();
    });

    /** Ответить */
    $('body').on('click', '.js-reply', function(e) {
        cleanFields();
        let pId = $(this).attr('data-comment-id');
        $('#js-p_id').val(pId);
    });

    /** Редактировать */
    $('body').on('click', '.js-edit', function(e) {
        cleanFields();
        let parent = $(this).parent().parent().parent();
        let text = $(parent).find('.card-text').text()
        let author = $(parent).find('.card-author').text()
        $('#js-text').val(text);
        $('#js-author').val(author);
        let id = $(this).attr('data-comment-id');
        $('#js-id').val(id);
    });

    /** Отправить запрос */
    $('body').on('click', '#js-btnCommentSend', function(e) {
        let data = $('#js-commentForm').serializeArray();
        let url = '/site/add-comment';
        if ( $('#js-id').val()) {
            url = '/site/edit-comment';
        }
        $.post(url, data).done( function (result) {
            $('#w0').modal('toggle');
            if (result.success) {
               $('#js-paste-comments').html(result.html);
            } else {
                alert('error!');
            }
        })
    })

    function cleanFields()
    {
        $('#js-text').val('');
        $('#js-author').val('');
        $('#js-p_id').val('');
        $('#js-id').val('');
    }
});