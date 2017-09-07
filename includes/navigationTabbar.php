        <div id="navigationElements" class="<? echo $basepageTwo ?>">

<?
// Title bar and secundary navigation are in index.php

# ===================================== #
# ==== Primary navigation, tab bar ==== #
# ===================================== #


?>
            <nav id="tabbarNavigation">
                <ul id="tabbarItemList">

<?
    if( $basepageTwo !== 'home' && $basepageTwo !== 'filtered' ){
?>
                    <li class="tabbarItem" id="tabbarSpecialItem">
                        <a href="<?=$baseURL?>" title="Back to <? echo $pageTitle ?>" class="tabbarLink noLabel"><? include 'navigationIcons/back.svg'  ?></a>
                    </li>
<?        
    } else {
        if( $basepage == 'about' ){         $tabbarSpecialItemTitle = 'Get in touch!';      $tabbarSpecialItemIconSVG = 'contact.svg';  $tabbarSpecialItemName = 'Let’s talk';     $tabbarSpecialItemTooltip = true; }
        elseif( $basepage == 'resume' ){    $tabbarSpecialItemTitle = 'Download my resume'; $tabbarSpecialItemIconSVG = 'download.svg'; $tabbarSpecialItemName = 'Download';       $tabbarSpecialItemTooltip = true; }
        else {                              $tabbarSpecialItemTitle = 'Filters & more';     $tabbarSpecialItemIconSVG = 'filter.svg';   $tabbarSpecialItemName = 'Filters & more'; $tabbarSpecialItemTooltip = false; }
?>
                    <li class="tabbarItem" id="tabbarSpecialItem">
                        <a class="tabbarLink" href="#" 
                                title="<?=$tabbarSpecialItemTitle?>" 
                                onclick="toggleDrawer(); changeItem('tabbarTooltip')">
<?
        if($tabbarSpecialItemTooltip){
?>
                            <div id="tabbarTooltip">
                                <span><?=$tabbarSpecialItemTitle?></span>
                            </div>
<?
        }
?>
                            <? include 'navigationIcons/'.$tabbarSpecialItemIconSVG;  ?>
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
                        <a href="<?=$portURL?>" title="Portfolio" class="tabbarLink <? if( $basepage == 'portfolio'){ echo('active'); } ?>" >
                            <? include 'navigationIcons/portfolio.svg'?>
                            <span class="tabName">Portfolio</span>
                        </a>
                    </li>
                    <li class="tabbarItem">
                        <a href="<?=$blogURL?>" title="Blog"      class="tabbarLink <? if( $basepage == 'blog'){      echo('active'); } ?>" >
                            <? include 'navigationIcons/blog.svg'     ?>
                            <span class="tabName">Blog</span>
                        </a>
                    </li>
                    <li class="tabbarItem">
                        <a href="<?=$resuURL?>" title="Resume"    class="tabbarLink <? if( $basepage == 'resume'){    echo('active'); } ?>" >
                            <? include 'navigationIcons/resume.svg'   ?>
                            <span class="tabName">Resumé</span>
                        </a>
                    </li>
                    <li class="tabbarItem">
                        <a href="<?=$abouURL?>" title="About Lex" class="tabbarLink <? if( $basepage == 'about'){     echo('active'); } ?>" >
                            <? include 'navigationIcons/about.svg'    ?>
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
            <a id="filterIndicationBar" onclick="toggleDrawer()" href="#">Filtered by date, tag, author and keyword.</a>
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