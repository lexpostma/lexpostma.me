        <div id="navigationElements" class="<? echo $basepageTwo ?>">

<?
// Title bar and secundary navigation are in index.php


# ===================================== #
# ==== Primary navigation, tab bar ==== #
# ===================================== #

    $gaMainNavEvent = " 'send', 'event', 'Navigation', 'Navigate tab bar',";
?>
            <nav id="tabbarNavigation">
                <ul id="tabbarItemList">

<?
    if( $basepageTwo !== 'home' && $basepageTwo !== 'filtered' ){
?>
                    <li class="tabbarItem" id="tabbarSpecialItem">
                        <a href="<?=$baseURL?>" title="Back to <?=$basepageTitle ?>" 
                                class="tabbarLink noLabel" 
                                onclick="ga(<?=$gaMainNavEvent?> 'Back to <?=$basepage?>');">
                            <? include 'navigationIcons/back.svg'  ?>
                        </a>
                    </li>
<?        
    } else {
        if( $basepage == 'about' ){         $tabbarSpecialItemTitle = 'Get in touch!';      $tabbarSpecialItemIconSVG = 'contact';  $tabbarSpecialItemName = 'Let’s talk';     $tabbarSpecialItemTooltip = true; }
        elseif( $basepage == 'resume' ){    $tabbarSpecialItemTitle = 'Download my resume'; $tabbarSpecialItemIconSVG = 'download'; $tabbarSpecialItemName = 'Download';       $tabbarSpecialItemTooltip = true; }
        else {                              $tabbarSpecialItemTitle = 'Filters & more';     $tabbarSpecialItemIconSVG = 'filter';   $tabbarSpecialItemName = 'Filters & more'; $tabbarSpecialItemTooltip = false; }
?>
                    <li class="tabbarItem" id="tabbarSpecialItem">
                        <a class="tabbarLink" href="#" 
                                title="<?=$tabbarSpecialItemTitle?>" 
                                onclick="toggleDrawer(); ga(<?=$gaMainNavEvent?> 'Toggle drawer on <?=$basepage?>'); changeItem('tabbarTooltip')">
<?
        if($tabbarSpecialItemTooltip){
?>
                            <div id="tabbarTooltip">
                                <span><?=$tabbarSpecialItemTitle?></span>
                            </div>
<?
        }
                                include 'navigationIcons/'.$tabbarSpecialItemIconSVG.'.svg';
                                include 'navigationIcons/'.$tabbarSpecialItemIconSVG.'-active.svg';
?>
                            <span class="tabName"><?=$tabbarSpecialItemName?></span>
                        </a>
                    </li>
<?
    };

    
# =============================== #
# ==== Main navigation items ==== #
# =============================== #

?>
                    <li class="tabbarItem">
                        <a class="tabbarLink <? if( $basepage == 'portfolio'){ echo('active'); } ?>" 
                                href="<?=$portURL?>" 
                                onclick="ga(<?=$gaMainNavEvent?> 'Portfolio');"
                                title="Portfolio" >
                            <? 
                                if( $basepage == 'portfolio'){
                                    include 'navigationIcons/portfolio-active.svg';
                                } else {
                                    include 'navigationIcons/portfolio.svg';
                                }
                            ?>
                            <span class="tabName">Portfolio</span>
                        </a>
                    </li>
                    <li class="tabbarItem">
                        <a class="tabbarLink <? if( $basepage == 'blog'){      echo('active'); } ?>"
                                href="<?=$blogURL?>" 
                                onclick="ga(<?=$gaMainNavEvent?> 'Blog');"
                                title="Blog" >
                            <? 
                                if( $basepage == 'blog'){
                                    include 'navigationIcons/blog-active.svg';
                                } else {
                                    include 'navigationIcons/blog.svg';
                                }
                            ?>
                            <span class="tabName">Blog</span>
                        </a>
                    </li>
                    <li class="tabbarItem">
                        <a class="tabbarLink <? if( $basepage == 'resume'){    echo('active'); } ?>" 
                                href="<?=$resuURL?>"
                                onclick="ga(<?=$gaMainNavEvent?> 'Resumé');"
                                title="Resumé" >
                            <? 
                                if( $basepage == 'resume'){
                                    include 'navigationIcons/resume-active.svg';
                                } else {
                                    include 'navigationIcons/resume.svg';
                                }
                            ?>

                            <span class="tabName">Resumé</span>
                        </a>
                    </li>
                    <li class="tabbarItem">
                        <a class="tabbarLink <? if( $basepage == 'about'){     echo('active'); } ?>"
                                href="<?=$abouURL?>" 
                                onclick="ga(<?=$gaMainNavEvent?> 'About');"
                                title="About Lex" >
                            <? 
                                if( $basepage == 'about'){ 
                                    include 'navigationIcons/about-active.svg';
                                } else {
                                    include 'navigationIcons/about.svg';
                                }
                            ?>

                            <span class="tabName">About Lex</span>
                        </a>
                    </li>
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