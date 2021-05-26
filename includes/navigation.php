        <header id="nav-header" class="<?=$homepage.' '.$secondpage?> ">
            <div id="nav-container">
                <a id="main-logo" href="/">
                    <svg width="100px" height="100px" viewBox="0 0 1160 1160" preserveAspectRatio="xMinYMin meet">
                        <g fill-rule="evenodd">
                            <path d="M0,0 L1160,0 L1160,1160 L0,1160 L0,0 Z M80,80 L80,1080 L499.462983,1080 L533,1000 L160,1000 L160,80 L80,80 Z M500,80 L240,80.0000026 L240,920 L566,920 L600,840 L320,840 L320,520 L685,520 L651,440 L320,440 L320,160 L534,160 L500,80 Z M665,80 L580,80 L788,580 L580,1080 L665,1080 L830,682 L995,1080 L1080,1080 L872,580 L1080,80 L995,80 L829.999995,477 L665,80 Z"></path>
                        </g>
                    </svg>
                </a>
                <nav>
                        <a href="<?=$portURL?>" onclick="ga('send', 'event', 'Navigation', 'Navigate main menu', 'Portfolio');" title="Portfolio" class="main portfolio">Portfolio
                    </a><a href="<?=$blogURL?>" onclick="ga('send', 'event', 'Navigation', 'Navigate main menu', 'Blog');"      title="Blog"      class="main blog">Blog
                    </a><a href="<?=$resuURL?>" onclick="ga('send', 'event', 'Navigation', 'Navigate main menu', 'Resumé');"    title="Resume"    class="main resume">Resumé
                    </a><a href="<?=$abouURL?>" onclick="ga('send', 'event', 'Navigation', 'Navigate main menu', 'About');"     title="About me"  class="main about">About me
                    </a>
                </nav>
                <script>
                    function toggleFoldbar(id)  { $('#'+id).toggleClass('show'); }
                    function closeOtherBar(id)  { $('#'+id).removeClass('show'); }
                    function focusOnInput(id)   {
                        if ($('#'+id).hasClass('show')) {
                            $('#'+id+' form input[type="search"]').focus();
                        } else {
                            $('#'+id+' form input[type="search"]').blur();
                        }
                    }

                </script>
<?
//     $anyFilter = 1;
    if($homepage == 'portfolio') {
?>
                <div id="portfolioSearchBar" class="foldableExtraNavBar">
                    <? include 'portfolioFilters.php'; ?>
                </div>
<?
    } else if($homepage == 'blog') {

?>
                <div id="blogFilterBar" class="foldableExtraNavBar">
                    <? include 'blogFilters.php'; ?>
                </div>

                <div id="blogSubscribeBar" class="foldableExtraNavBar">
                    <? include 'blogSubscribe.php'; ?>
                </div>

<?
    } else if($homepage == 'resume') {
?>
                <div id="resumeDownloadBar" class="foldableExtraNavBar">
                    <? include 'resumeDownload.php'; ?>
                </div>

<?
    };
?>
                <div id="nav-actions">
<?
    if(isset($navName) && $secondpage != 'home'){ // the back button when not on the homepage
        echo '<a href="/" class="backHome" title="Back to '.$navName.'"><i class="fa fa-angle-left"></i>'.$navName.'</a>';
    };

    // secondary menu, different for each main page
    if($homepage == 'portfolio') {
?>
                            <a href="/videos" class="videos"   onclick="ga('send', 'event', 'Navigation', 'Navigate second menu', 'Videos');" title="Videos I made" >Videos
                        </a><a href="/icons"  class="icons"    onclick="ga('send', 'event', 'Navigation', 'Navigate second menu', 'Icons');"  title="Icons I made"   >Icons
                        </a><a href="#"       class="search"   onclick="ga('send', 'event', 'Navigation', 'Filter', 'Open portfolio search'); toggleFoldbar('portfolioSearchBar'); toggleFoldbar('filtersOpen'); focusOnInput('portfolioSearchBar'); " title="Filter my portfolio projects"  id="filtersOpen">Search
                        </a><a onclick="ga('send', 'event', 'Navigation', 'Social', 'Dribbble');" class="dribbble" href="http://dribbble.com/lexpostma" title="Check out my Dribbble shots" ><i class="fa fa-dribbble" aria-hidden="true"></i>
                        </a>

<?
    } else if($homepage == 'blog') {
?>
                            <a class="archive" href="/archive" title="Blog archive" onclick="ga('send', 'event', 'Navigation', 'Navigate second menu', 'Blog archive');">Archive
                        </a><a id="subscribeOpen" class="rss"  href="#" title="Subscribe to my blog"
                            onclick="
                                toggleFoldbar('blogSubscribeBar');
                                toggleFoldbar('subscribeOpen');
                                closeOtherBar('blogFilterBar');
                                closeOtherBar('filtersOpen');
                                ga('send', 'event', 'Navigation', 'Subscribe', 'RSS blog');"
                            >Subscribe
                        </a><a id="filtersOpen" href="#" title="Filter my blog posts" class="search"
                            onclick="
                                toggleFoldbar('blogFilterBar');
                                toggleFoldbar('filtersOpen');
                                closeOtherBar('blogSubscribeBar');
                                closeOtherBar('subscribeOpen');
                                focusOnInput('blogFilterBar');
                                ga('send', 'event', 'Navigation', 'Filter', 'Open blog filters');"
                            >Search
                        </a><a class="twitter" href="https://twitter.com/lexpostmame" title="Follow my blog on Twitter @lexpostmame" onclick="ga('send', 'event', 'Navigation', 'Social', 'Twitter website');"><i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
<?
    } else if($homepage == 'resume') {
        if(isset($referencesOnline)){?><a class="references" href="/references" title="References: what people are saying about me" onclick="ga('send', 'event', 'Navigation', 'Navigate main menu', 'References');">References</a><?};
?><a id="filtersOpen" class="pdf" href="#" title="Download a pdf of my resumé" onclick="ga('send', 'event', 'Navigation', 'Navigate main menu', 'Open download box'); toggleFoldbar('resumeDownloadBar'); toggleFoldbar('filtersOpen');">Download
                        </a><a class="linkedin" href="http://www.linkedin.com/in/lexpostma" title="Connect with me on LinkedIn" onclick="ga('send', 'event', 'Navigation', 'Social', 'LinkedIn');"><i class="fa fa-linkedin-square" aria-hidden="true"></i>
                        </a>
                    </span>
<?
    } else if($homepage == 'about') {
?>
                            <!-- <a class="more"  href="/more" title="Random stuff worth sharing" onclick="ga('send', 'event', 'Navigation', 'Navigate main menu', 'More about Lex');">Other random stuff
                        </a><a class="twitter"  href="https://twitter.com/lexpostma" title="Follow me on Twitter @lexpostma" onclick="ga('send', 'event', 'Navigation', 'Social', 'Twitter');"><i class="fa fa-twitter" aria-hidden="true"></i>
                        </a> -->
<?
    }
?>
                </div>
            </div>
        </header>