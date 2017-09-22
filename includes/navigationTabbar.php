<?
    if( $basepage == 'portfolio' ){
        
        $actionDrawerContentIncludeFile = 'portfolioContact.php'; 
        $actionDrawerTitle = 'Get in touch!';
        
        $tabbarSpecialItemIconSVG = 'contact';
        $tabbarSpecialItemName = 'Let’s talk';
        $tabbarSpecialItemTooltipTitle = $tabbarSpecialItemName;
        $tabbarSpecialItemTooltip = false;

    } elseif( $basepage == 'blog' ){
        
        $actionDrawerContentIncludeFile = 'blogSubscribe.php';
        $actionDrawerTitle = 'Subscribe';
        
        $tabbarSpecialItemIconSVG = 'subscribe';
        $tabbarSpecialItemName = $actionDrawerTitle;
        $tabbarSpecialItemTooltipTitle = $actionDrawerTitle;
        $tabbarSpecialItemTooltip = false;

    } elseif( $basepage == 'resume' ){
        
        $actionDrawerContentIncludeFile = 'resumeDownload.php';
        $actionDrawerTitle = 'Get my resumé';
        
        $tabbarSpecialItemIconSVG = 'download';
        $tabbarSpecialItemName = 'Download';
        $tabbarSpecialItemTooltipTitle = 'Download my resumé';
        $tabbarSpecialItemTooltip = true; 
        
    } elseif( $basepage == 'about' ){
        
        $actionDrawerContentIncludeFile = 'aboutContact.php';
        $actionDrawerTitle = 'Get in touch!';
        
        $tabbarSpecialItemIconSVG = 'contact';
        $tabbarSpecialItemName = 'Let’s talk'; 
        $tabbarSpecialItemTooltipTitle = 'Get in touch!';
        $tabbarSpecialItemTooltip = true;
        
    } else {

        $actionDrawerContentIncludeFile = 'aboutContact.php';
        $actionDrawerTitle = 'Let’s talk';
        
        $tabbarSpecialItemIconSVG = 'contact';
        $tabbarSpecialItemName = 'Oops';
        $tabbarSpecialItemTooltipTitle = 'Oops';
        $tabbarSpecialItemTooltip = false;
    };

    
    if ($tabbarSpecialItemName == 'Filter' && $basepageTwo == 'filtered') {
        $tabbarSpecialItemName = 'Filtered';
    };
    
?>

        <div id="navigationElements">
            <div class="logo" id="mainLogoDesktop">
                <a href="/">
                    <? include '../public_html/images/lex-logo.svg'; ?>
                </a>
            </div>


<?

# ===================================== #
# ==== Primary navigation, tab bar ==== #
# ===================================== #

    $gaMainNavEvent = " 'send', 'event', 'Navigation', 'Navigate tab bar',";
?>
            <nav id="tabbarNavigation">
                <ul id="tabbarItemList">
<?
    include 'navigationSpecialFirstTabbarButton.php';
    
    $tabbarItemName = 'portfolio';
    $tabbarItemTitle = 'Portfolio';
    $tabbarItemURL = $portURL;
    include 'navigationRegularTabbarItem.php';


    $tabbarItemName = 'blog';
    $tabbarItemTitle = 'Blog';
    $tabbarItemURL = $blogURL;
    include 'navigationRegularTabbarItem.php';


    $tabbarItemName = 'resume';
    $tabbarItemTitle = 'Resumé';
    $tabbarItemURL = $resuURL;
    include 'navigationRegularTabbarItem.php';


    $tabbarItemName = 'about';
    $tabbarItemTitle = 'About Lex';
    $tabbarItemURL = $abouURL;
    include 'navigationRegularTabbarItem.php';
    
?>

                </ul>
            </nav>
            
<?

# =============================== #
# ==== Filter indication bar ==== #
# =============================== #

    if($basepageTwo == 'filtered') {
?>
            <a id="filterIndicationBar" onclick="toggleDrawer()" href="#">
                <span class="filteredByDarker">Filtered by: </span>
                <br>
                <?=$filterbarText?>
            </a>
<?
    };

# ======================= #
# ==== Action Drawer ==== #
# ======================= #

    if ( $basepageTwo == 'home' || $basepageTwo == 'filtered' ){
        include 'navigationActionDrawer.php';
    };
    
?>
        </div>