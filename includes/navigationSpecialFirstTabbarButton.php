<?
    if (empty($gaMainNavEvent)){
        $gaMainNavEvent = $gaSecondaryNavEvent;
    }


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
    } else {
?>
                    <li class="tabbarItem drawerToggleButton" id="tabbarSpecialItem">
                        <a class="tabbarLink" href="#" 
                                title="<?=$tabbarSpecialItemTooltipTitle?>" 
                                onclick="toggleDrawer(); ga(<?=$gaMainNavEvent?> 'Toggle drawer on <?=$basepage?>'); changeItem('tabbarTooltip')">
<?
        if($tabbarSpecialItemTooltip){
?>
                            <div id="tabbarTooltip">
                                <span><?=$tabbarSpecialItemTooltipTitle?></span>
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