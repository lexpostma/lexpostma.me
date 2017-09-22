<?
    $gaSecondaryNavEvent = " 'send', 'event', 'Navigation', 'Navigate title bar',";
?>
            <header id="titleHeader">
                <a id="mainTitle" href="<?=$baseURL ?>"><?=$basepageTitle ?></a>
                <div class="logo" id="mainLogo">
                    <a href="/">
                        <? include '../public_html/images/lex-logo.svg'; ?>
                    </a>
                </div>
            </header>
<?
    if ( $basepage == 'bldfdsgog' ) {
?>            
            <nav id="secondNavigation">
                <ul>
                   <li>
                        <a href="<?=$blogFeedURL?>" 
                                title="Subscribe to the RSS feed" 
                                onclick="ga(<?=$gaSecondaryNavEvent?> 'Subscribe to RSS');" ><span><i class="fa fa-rss"></i></span>Subscribe</a>
                    </li>
                    <li>
                        <a href="<?=$blogTwitterURL ?>" 
                                title="Follow @lexpostmame on Twitter" 
                                onclick="ga(<?=$gaSecondaryNavEvent?> 'Follow @lexpostmame');" >
                            <i class="fa fa-twitter"></i><span>@lexpostmame</span>
                        </a>
                    </li>
                    <li>
                        <a href="/archive"
                                <? if( $basepageTwo == 'archive'){ echo(' class="active" '); } ?>
                                title="Archive" 
                                onclick="ga(<?=$gaSecondaryNavEvent?> 'Blog archive');" ><span><i class="fa fa-archive"></i></span>Archive</a>
                    </li>
                </ul>
            </nav>
<?
    }
?>