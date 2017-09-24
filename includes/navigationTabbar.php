<?
    

    if( $basepage == 'portfolio' ){

        $actionDrawer1ID          = 'drawerFilter';
        $actionDrawer1Title       = 'Filter projects';
        $actionDrawer1IncludeFile = 'portfolioFilters.php';

        $actionDrawer2ID          = 'drawerContact';
        $actionDrawer2Title       = 'Get in touch!';        
        $actionDrawer2IncludeFile = 'portfolioContact.php';

        $tabbarItem1Name   = 'Filter';
        $tabbarItem1SVG    = 'filter';
        $tabbarItem1Title  = 'Filter projects';
        $tabbarItem1Action = 'toggle';

        $tabbarItem2Name   = 'Let’s talk';
        $tabbarItem2SVG    = 'contact';
        $tabbarItem2Title  = 'Let’s talk';
        $tabbarItem2Action = 'toggle';

    } elseif( $basepage == 'blog' ){
        
        $actionDrawer1ID          = 'drawerFilter';
        $actionDrawer1Title       = 'Filter blog posts';
        $actionDrawer1IncludeFile = 'blogFilters.php';

        $actionDrawer2ID          = 'drawerSubscribe';
        $actionDrawer2Title       = 'Subscribe';
        $actionDrawer2IncludeFile = 'blogSubscribe.php';

        $tabbarItem1Name   = 'Filter';
        $tabbarItem1SVG    = 'filter';
        $tabbarItem1Title  = 'Filter blog posts';
        $tabbarItem1Action = 'toggle';

        $tabbarItem2Name   = 'Subscribe';
        $tabbarItem2SVG    = 'subscribe';
        $tabbarItem2Title  = 'Subscribe';
        $tabbarItem2Action = 'toggle';

    } elseif( $basepage == 'resume' ){


        $actionDrawer2ID          = 'drawerDownload';
        $actionDrawer2Title       = 'Get my resumé';
        $actionDrawer2IncludeFile = 'resumeDownload.php';

        $tabbarItem1Name   = 'References';
        $tabbarItem1SVG    = 'references';
        $tabbarItem1Title  = 'References';
        $tabbarItem1Action = '#references';

        $tabbarItem2Name   = 'Download';
        $tabbarItem2SVG    = 'download';
        $tabbarItem2Title  = 'Download my resumé';
        $tabbarItem2Action = 'toggle';

/*
        $actionDrawer2ID = 'drawerSubscribe';
        $actionDrawer2Title = 'Subscribe';
        $actionDrawer2IncludeFile = 'blogSubscribe.php';

        
        $actionDrawerIncludeFile = 'resumeDownload.php';
        $actionDrawerTitle = 'Get my resumé';
        
        $tabbarSpecialItemIconSVG = 'download';
        $tabbarSpecialItemName = 'Download';
        $tabbarSpecialItemTitle = 'Download my resumé';
*/
        
    } elseif( $basepage == 'about' ){

        $actionDrawer2ID          = 'drawerContact';
        $actionDrawer2Title       = 'Get in touch!';
        $actionDrawer2IncludeFile = 'aboutContact.php';

        $tabbarItem2Name   = 'Let’s talk';
        $tabbarItem2SVG    = 'contact';
        $tabbarItem2Title  = 'Get in touch!';
        $tabbarItem2Action = 'toggle';
        
    } else {

//         $actionDrawerIncludeFile = 'aboutContact.php';
//         $actionDrawerTitle = 'Let’s talk';
        
//         $tabbarSpecialItemIconSVG = 'contact';
//         $tabbarSpecialItemName = 'Oops';
//         $tabbarSpecialItemTitle = 'Oops';
    };

    
/*
    if ($tabbarSpecialItemName == 'Filter' && $basepageTwo == 'filtered') {
        $tabbarSpecialItemName = 'Filtered';
    };
*/
    
?>

        <div id="navigationElements">
            <div class="logo" id="mainLogoDesktop">
                <a href="<?=$abouURL?>">
                    <? include '../public_html/images/lex-logo.svg'; ?>
                </a>
            </div>


<?

# ===================================== #
# ==== Primary navigation, tab bar ==== #
# ===================================== #

    $gaMainNavEvent = " 'send', 'event', 'Navigation', 'Navigate tab bar',";
?>
            <nav id="tabbarNavigation">
                <ul id="tabbarItemList">
<?
    if( $basepageTwo !== 'home' && $basepageTwo !== 'filtered' ) {
?>
                    <li class="tabbarItem" id="tabbarSpecialItem">
                        <a href="<?=$baseURL?>" title="Back to <?=$basepageTitle ?>" 
                                class="tabbarLink noLabel" 
                                onclick="ga(<?=$gaMainNavEvent?> 'Back to <?=$basepage?>');">
                            <? include 'navigationIcons/back.svg'  ?>
                            <span class="tabName"><?=$basepageTitle?></span>
                        </a>
                    </li>
<?
    } elseif ( isset($tabbarItem1SVG) ) {
        
        $tabbarItemName   = $tabbarItem1Name;
        $tabbarItemSVG    = $tabbarItem1SVG;
        $tabbarItemTitle  = $tabbarItem1Title;
        $tabbarItemAction = $tabbarItem1Action;
        
        if ( $tabbarItemAction == 'toggle') {
            $actionDrawerID   = $actionDrawer1ID;            
        }

        include 'navigationPageSpecificTabbarButton.php';
    };

    if ( isset($tabbarItem2SVG) ) {

        $tabbarItemName   = $tabbarItem2Name;
        $tabbarItemSVG    = $tabbarItem2SVG;
        $tabbarItemTitle  = $tabbarItem2Title;
        $tabbarItemAction = $tabbarItem2Action;
        
        if ( $tabbarItemAction == 'toggle') {
            $actionDrawerID   = $actionDrawer2ID;
        }
        
        include 'navigationPageSpecificTabbarButton.php';        
    };
    

    
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


/*
    $tabbarItemName = 'about';
    $tabbarItemTitle = 'About Lex';
    $tabbarItemURL = $abouURL;
    include 'navigationRegularTabbarItem.php';
*/
    
?>

                </ul>
            </nav>
            
<?

# =============================== #
# ==== Filter indication bar ==== #
# =============================== #

    if($basepageTwo == 'filtered') {
?>
            <a id="filterIndicationBar" onclick="toggleDrawer('drawerFilter')" href="#">
                <span class="filteredByDarker">Filtered by: </span>
                <br>
                <?=$filterbarText?>
            </a>
<?
    };

# ======================= #
# ==== Action Drawer ==== #
# ======================= #

    if ( isset($actionDrawer1ID) ){

        $actionDrawerID          = $actionDrawer1ID;
        $actionDrawerTitle       = $actionDrawer1Title;
        $actionDrawerIncludeFile = $actionDrawer1IncludeFile;
        
        include 'navigationActionDrawer.php';
    };

    if ( isset($actionDrawer2ID) ){

        $actionDrawerID          = $actionDrawer2ID;
        $actionDrawerTitle       = $actionDrawer2Title;
        $actionDrawerIncludeFile = $actionDrawer2IncludeFile;
        
        include 'navigationActionDrawer.php';
    };
    
    
?>
        </div>