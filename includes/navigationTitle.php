<?
    $gaSecondaryNavEvent = " 'send', 'event', 'Navigation', 'Navigate title bar',";
?>
            <header id="titleHeader">
                <a id="mainTitle" href="<?=$baseURL ?>"><?=$basepageTitle ?></a>
            </header>

            <div class="logoContainer">
                <div class="logo" id="mainLogo">
                    <a href="/">
                        <? include '../public_html/images/lex-logo.svg'; ?>
                    </a>
                </div>
                <div class="logo" id="mainLogoDesktop">
                    <a href="/">
                        <? include '../public_html/images/lex-logo.svg'; ?>
                    </a>
                </div>
            </div>

            <nav id="secondNavigation">
                <ul>
<?
    $specialButtonLocation = 'secondarybar';
    include 'navigationSpecialFirstTabbarButton.php';

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
                    <li>
                        <a href="/archive"
                                <? if( $basepageTwo == 'archive'){ echo(' class="active" '); } ?>
                                title="Archive" 
                                onclick="ga(<?=$gaSecondaryNavEvent?> 'Blog archive');" >Archive</a>
                    </li>


<?
    } elseif ( $basepage == 'portfolio' ){
?>
                    <li>
                        <a href="<?=$dribbbleURL ?>"
                                title="Check out my Dribbble shots" 
                                onclick="ga(<?=$gaSecondaryNavEvent?> 'Dribbble');" >
                            <i class="fa fa-dribbble"></i>
                        </a>
                    </li>
                    <li>
                        <a href="/archive"
                                <? if( $basepageTwo == 'archive'){ echo(' class="active" '); } ?>
                                title="Older projects" 
                                onclick="ga(<?=$gaSecondaryNavEvent?> 'Portfolio archive');" >Archive</a>
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
    }
?>
                </ul>
            </nav>