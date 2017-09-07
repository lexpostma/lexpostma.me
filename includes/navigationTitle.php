<?
    $gaSecondaryNavEvent = " 'send', 'event', 'Navigation', 'Navigate title bar',";
?>
            <header id="titleHeader">
                <span id="mainTitle"><a href="<?=$baseURL ?>"><?=$basepageTitle ?></a></span>
                <a id="mainLogo" href="/">
                    <? include '../public_html/images/lex-logo.svg'; ?>
                </a>
            </header>
           <nav id="secondNavigation">
                <ul>
<?
    if( $basepage == 'blog' ){
?>
                    <li>
                        <a href="<?=$blogFeedURL?>" 
                                title="Subscribe to the RSS feed" 
                                onclick="ga(<?=$gaSecondaryNavEvent?> 'Subscribe to RSS');" >Subscribe</a>
                    </li>
                    <li>
                        <a href="<?=$blogTwitterURL ?>"
                                title="Follow @lexpostmame on Twitter" 
                                onclick="ga(<?=$gaSecondaryNavEvent?> 'Follow @lexpostmame');" >
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
<?
    } elseif ( $basepage == 'resume' ){
?>
                    <li>
                        <a href="#references"
                                title="References, what people are saying about me" 
                                onclick="ga(<?=$gaSecondaryNavEvent?> 'References');" >References</a>
                    </li>
                    <li>
                        <a href="<?=$linkedinURL ?>"
                                title="Connect with me on LinkedIn" 
                                onclick="ga(<?=$gaSecondaryNavEvent?> 'LinkedIn');" >
                            <i class="fa fa-linkedin-square"></i>
                        </a>
                    </li>
<?
    } else {
?>
                    <li>
                    </li>
<?
    }
?>
                </ul>
            </nav>