        <div id="navigationElements" class="<? echo $basepageTwo ?>">

<?

# ===================================== #
# ==== Primary navigation, tab bar ==== #
# ===================================== #

    $gaMainNavEvent = " 'send', 'event', 'Navigation', 'Navigate tab bar',";
?>
            <nav id="tabbarNavigation">
                <ul id="tabbarItemList">
<?
    $specialButtonLocation = 'tabbar';
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