                    <li class="tabbarItem tabbarItemPageSpecific <? if(isset($actionDrawerID) ){echo 'toggles_'.$actionDrawerID; } else { echo strtolower($tabbarItemName); }?>">
                        <a class="tabbarLink <?if ( $tabbarItemSVG == 'logo' ) { echo 'noLabel';}?>" title="<?=$tabbarItemTitle?>"
<?
    $gaEventForThisTab = "ga($gaMainNavEvent '$tabbarItemName on $basepage')";
    
    if ( $tabbarItemAction == 'toggle' ) { 

        echo 'href="#" onclick="toggleDrawer(\''.$actionDrawerID.'\'); '.$gaEventForThisTab.'"';

    } else { 

        echo 'href="'.$tabbarItemAction.'" onclick="toggleDrawer(); '.$gaEventForThisTab.'"';

    }
?>>

<?
    if ( $tabbarItemSVG !== 'logo' ) {
        include 'navigationIcons/'.$tabbarItemSVG.'.svg';
        include 'navigationIcons/'.$tabbarItemSVG.'-active.svg';        
    } else {
        include '../public_html/images/lex-logo.svg';
    }
?>
                            <span class="tabName"><?=$tabbarItemName?></span>
                        </a>
                    </li>