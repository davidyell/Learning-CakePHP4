$(function () {
    $('div.card.add-comment').hide();

    $('a.add-comment-link').click(function (event) {
        event.preventDefault();
        $(this).hide();
        $(this).siblings('div.card.add-comment').show();
    });
});
