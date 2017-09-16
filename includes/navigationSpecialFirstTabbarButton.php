<?
    if (empty($gaMainNavEvent)){
        $gaMainNavEvent = $gaSecondaryNavEvent;
    }


    if( $basepageTwo !== 'home' && $basepageTwo !== 'filtered' && $specialButtonLocation == 'tabbar' ) {
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

    } elseif ( $basepageTwo !== 'home' && $basepageTwo !== 'filtered' && $specialButtonLocation == 'secondarybar' ) {
    } else {

        if( $basepage == 'about' ){           $tabbarSpecialItemTitle = 'Get in touch!';       $tabbarSpecialItemIconSVG = 'contact';   $tabbarSpecialItemName = 'Let’s talk'; $tabbarSpecialItemTooltip = true;
        } elseif( $basepage == 'resume' ){    $tabbarSpecialItemTitle = 'Download my resume';  $tabbarSpecialItemIconSVG = 'download';  $tabbarSpecialItemName = 'Download';   $tabbarSpecialItemTooltip = true; 
        } elseif( $basepage == 'portfolio' ){ $tabbarSpecialItemTitle = 'Filter projects';     $tabbarSpecialItemIconSVG = 'filter';    $tabbarSpecialItemName = 'Filter';     $tabbarSpecialItemTooltip = false; 
        } elseif( $basepage == 'blog' ){      $tabbarSpecialItemTitle = 'Filter blog posts';   $tabbarSpecialItemIconSVG = 'filter';    $tabbarSpecialItemName = 'Filter';     $tabbarSpecialItemTooltip = false; 
        } else {                              $tabbarSpecialItemTitle = 'Oops';                $tabbarSpecialItemIconSVG = 'contact';   $tabbarSpecialItemName = 'Oops';       $tabbarSpecialItemTooltip = false;
        };
        
        if ($tabbarSpecialItemName == 'Filter' && $basepageTwo == 'filtered') {
            $tabbarSpecialItemName = 'Filtered';
        };

        if ($specialButtonLocation == 'tabbar') {
?>
                    <li class="tabbarItem drawerToggleButton" id="tabbarSpecialItem">
<?
        } elseif ($specialButtonLocation == 'secondarybar') {
?>
                    <li id="specialItemFromTabbar">
<?
        };

?>
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
    }
?>