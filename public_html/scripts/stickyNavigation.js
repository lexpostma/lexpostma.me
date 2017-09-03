/**
   Hide tabbar on scroll down, show on scroll up
   https://medium.com/@mariusc23/hide-header-on-scroll-down-show-on-scroll-up-67bbaae9a78c
**/

var didScroll;
var lastScrollTop = 0;
var delta = 10;
var navbarHeight = $('#tabbarNavigation').outerHeight();

$(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    var st = $(this).scrollTop();
    
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;
    
    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('#navigationElements').addClass('tabbarHidden');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            $('#navigationElements').removeClass('tabbarHidden');
        }
    }
    
    lastScrollTop = st;
}
