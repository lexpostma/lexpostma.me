/**
   Hide tabbar on scroll down, show on scroll up
   https://medium.com/@mariusc23/hide-header-on-scroll-down-show-on-scroll-up-67bbaae9a78c
   And show when reaching the bottom
   https://stackoverflow.com/questions/9439725/javascript-how-to-detect-if-browser-window-is-scrolled-to-bottom
**/

var didScroll;
var lastScrollPosition = 0;
var delta = 10;
var titleBarHeight = $('#titleHeader').outerHeight();
var windowHeight = window.innerHeight;

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
    var scrollPosition = window.scrollY;
    var docHeight = document.body.offsetHeight;
    
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollPosition - scrollPosition) <= delta)
        return;
    
    // If they scrolled down and are past the navbar, add class .tabbarHidden.
    // Unless they reached the bottom, or are scrolling up.
    if ((windowHeight + scrollPosition) >= docHeight) {
        // Bottom of the page
        $('#navigationElements').removeClass('tabbarHidden');
    } else if ( (scrollPosition > lastScrollPosition) && (scrollPosition > titleBarHeight) ){
        // Scrolling down
        $('#navigationElements').addClass('tabbarHidden');
    } else {
        // Scrolling up
        $('#navigationElements').removeClass('tabbarHidden');
    }

    lastScrollPosition = scrollPosition;
}