/* *
   * 
   * Hide tabbar on scroll down, show on scroll up
   * https://medium.com/@mariusc23/hide-header-on-scroll-down-show-on-scroll-up-67bbaae9a78c
   * http://jsfiddle.net/mariusc23/s6mLJ/31/
   * And show when reaching the bottom
   * https://stackoverflow.com/questions/9439725/javascript-how-to-detect-if-browser-window-is-scrolled-to-bottom
   * 
 */
var didScroll;
var lastScrollPosition = 0;
var delta = 20;

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
    if ((window.innerHeight + scrollPosition) >= docHeight) {
        // Bottom of the page
        $('#navigationElements').removeClass('tabbarOnScrollDown');
    } else if ( (scrollPosition > lastScrollPosition) && (scrollPosition > $('#titleHeader').outerHeight()) ){
        // Scrolling down
        $('#navigationElements').addClass('tabbarOnScrollDown');
    } else {
        // Scrolling up
        $('#navigationElements').removeClass('tabbarOnScrollDown');
    }

    lastScrollPosition = scrollPosition;
}

// $('body').addClass('darkBackgroundLaterToFixScrollbarColor');