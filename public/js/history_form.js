$('.trip_date').change(function() {
    $('.start_check').removeClass('hide').animate({'marginLeft':'3rem'},500);
});

$('.start').change(function() {
    $('.end').removeClass('hide').animate({'marginLeft':'3rem'},500);
});

$('.end').change(function() {
    $('.submit').removeClass('hide').animate({'marginLeft':'3rem'},500);
});