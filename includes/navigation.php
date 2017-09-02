        <header id="titleHeader">
            <span id="mainTitle"><a href="<? echo $baseURL ?>"><? echo $pageTitle ?></a></span>
            <a id="mainLogo" href="/">
                <svg width="100px" height="100px" viewBox="0 0 1160 1160" preserveAspectRatio="xMinYMin meet">
                    <g fill-rule="evenodd">
                        <path d="M0,0 L1160,0 L1160,1160 L0,1160 L0,0 Z M80,80 L80,1080 L499.462983,1080 L533,1000 L160,1000 L160,80 L80,80 Z M500,80 L240,80.0000026 L240,920 L566,920 L600,840 L320,840 L320,520 L685,520 L651,440 L320,440 L320,160 L534,160 L500,80 Z M665,80 L580,80 L788,580 L580,1080 L665,1080 L830,682 L995,1080 L1080,1080 L872,580 L1080,80 L995,80 L829.999995,477 L665,80 Z"></path>
                    </g>
                </svg>
            </a>
        </header>


<!—------------------------------
   | Primary navigation, tab bar |
   ------------------------------->

        <nav id="tabbarNavigation">

<?
    if( $basepageTwo !== 'home' && $basepageTwo !== 'filtered' ){
?>
            <a href="<?=$baseURL?>" title="Back to <? echo $pageTitle ?>"><? include 'navigationIcons/back.svg'  ?></a>
<?        
    } elseif( $basepage == 'about' ){
?>
            <a href="#" title="Get in touch!" onclick="toggleDrawer('navigationActionDrawer'); 
                                                       toggleDrawer('tabbarNavigation');
                                                       changeItem('tabbarTooltip')">
                <? include 'navigationIcons/contact.svg'  ?>
                <div id="tabbarTooltip">
                    <span>Get in touch!</span>
                    <div></div>
                </div>
            </a>
<?        
    } elseif( $basepage == 'resume' ){
?>
            <a href="#" title="Download my resume" onclick="toggleDrawer('navigationActionDrawer'); 
                                                            toggleDrawer('tabbarNavigation'); 
                                                            changeItem('tabbarTooltip')">
                <? include 'navigationIcons/download.svg'  ?>
                <div id="tabbarTooltip">
                    <span>Download my resume</span>
                    <div></div>
                </div>
            </a>
<?        
    } else {
?>
            <a href="#" title="Filter <? echo $pageTitle ?>" onclick="toggleDrawer('navigationActionDrawer'); 
                                                                      toggleDrawer('tabbarNavigation')"  >
                <? include 'navigationIcons/filter.svg' ?>
            </a>
<?
    }
?>

<!—------------------------
   | Main navigation items |
   ------------------------->

            <a href="<?=$portURL?>" title="Portfolio" class="<? if( $basepage == 'portfolio'){ echo('active'); } ?>" >
                <? include 'navigationIcons/portfolio.svg'?>
                <span class="tabName">Portfolio</span>
            </a>
            <a href="<?=$blogURL?>" title="Blog"      class="<? if( $basepage == 'blog'){      echo('active'); } ?>" >
                <? include 'navigationIcons/blog.svg'     ?>
                <span class="tabName">Blog</span>
            </a>
            <a href="<?=$resuURL?>" title="Resume"    class="<? if( $basepage == 'resume'){    echo('active'); } ?>" >
                <? include 'navigationIcons/resume.svg'   ?>
                <span class="tabName">Resumé</span>
            </a>
            <a href="<?=$abouURL?>" title="About Lex" class="<? if( $basepage == 'about'){     echo('active'); } ?>" >
                <? include 'navigationIcons/about.svg'    ?>
                <span class="tabName">About Lex</span>
            </a>
        </nav>


        
<!—-----------------------
   | Secundary navigation |
   ------------------------>

        <nav id="secondNavigation">

<?
    if( $basepage == 'blog' ){
?>
            <a href="#">Subscribe</a>
            <a href="<? echo $blogTwitterURL ?>"><i class="fa fa-twitter"></i></a>
<?
    } elseif ( $basepage == 'resume' ){
?>
            <a href="#references">References</a>
            <a href="<? echo $linkedinURL ?>"><i class="fa fa-linkedin-square"></i></a>
<?
    } 
?>
        </nav>



<!—----------------
   | Action Drawer |
   ----------------->

        <div id="navigationActionDrawer">
            <script>
                function toggleDrawer(id) { $('#'+id).toggleClass('toggled'); }
                function changeItem(id)   { $('#'+id).addClass('changed');  }
            </script>
<?
        if( $basepage == 'portfolio' ){  include 'portfolioFilters.php'; }
    elseif( $basepage == 'blog' ){       include 'blogFilters.php';      }
    elseif( $basepage == 'resume' ){     include 'resumeDownload.php';   }
    elseif( $basepage == 'about' ){      include 'aboutContact.php';     }
?>
        </div>


<!--
        <div>
            <a href="#">Archive</a>
        </div>
-->




<script>
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
            $('#tabbarNavigation').addClass('tabbarHidden');
        } else {
            // Scroll Up
            if(st + $(window).height() < $(document).height()) {
                $('#tabbarNavigation').removeClass('tabbarHidden');
            }
        }
        
        lastScrollTop = st;
    }
    
</script>







