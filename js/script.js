$(document).ready(function() {
    $('.header__burger').click(function(event) {
        $('.header__burger, .header__menu').toggleClass('active');
        $('body').toggleClass('lock');
    });

    $('.tag').click(function(e) {
        e.preventDefault();
        var target = $(this).data("target");
        $('.photobox.' + target).show();
        $('.photobox:not(.' + target + ')').hide();
    });
});
