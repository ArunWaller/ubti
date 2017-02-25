jQuery(document).ready(function($) {
    $('nav#access ul li:hover').click(function() { $(this).children('ul').toggle(); });
    var totalItems = $('#carousel-header .item').length;
    var currentIndex = $('.carousel-inner div.active').index() + 1;
    $('#carousel-header').on('slid.bs.carousel', function() {
        var currentIndex = $('.carousel-inner div.active').index() + 1;
        $('.wrap-sec-nav a').removeClass("active");
        $('.wrap-sec-nav .col-sm-4:nth-of-type(' + currentIndex + ') a').addClass("active"); })
    new WOW().init();
    $(".tabs-vert a").click(false).click(function(event) { $(".tabs-vert a").parent().removeClass('active');
        $(this).parent().addClass('active');
        var tabNumber = $(this).data('tab');
        $(".tabs-vert-content .tab").removeClass("active animated fadeInRight");
        $(".tabs-vert-content #" + tabNumber).addClass("active animated fadeInRight"); });
    $('li.scrolldown a').click(function() { $('html, body').animate({ scrollTop: $($.attr(this, 'href')).offset().top }, 1500);
        return false; });
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) { $('.scrollup').fadeIn(); } else { $('.scrollup').fadeOut(); } });
    $('.scrollup').click(function() { $("html, body").animate({ scrollTop: 0 }, 600);
        return false; });
    $('.modal').on('show.bs.modal', function () {
      if ($(document).height() > $(window).height()) {
        $('body').addClass("modal-open-noscroll");
      }
      else { 
        $('body').removeClass("modal-open-noscroll");
      }
    })
    $('.modal').on('hide.bs.modal', function () {
        $('body').removeClass("modal-open-noscroll");
    })
});
