                    <li class="tabbarItem tabbarItemPageSpecific toggles_<?=$actionDrawerID;?>">
                        <a class="tabbarLink" title="<?=$tabbarItemTitle?>"
<?
    $gaEventForThisTab = "ga($gaMainNavEvent '$tabbarItemName on $basepage')";
    
    if ( $tabbarItemAction == 'toggle' ) { 

        echo 'href="#" onclick="toggleDrawer(\''.$actionDrawerID.'\'); '.$gaEventForThisTab.'"';

    } else { 

        echo 'href="'.$tabbarItemAction.'" onclick="toggleDrawer(); '.$gaEventForThisTab.'"';

    }
?>>

<?
                            include 'navigationIcons/'.$tabbarItemSVG.'.svg';
                            include 'navigationIcons/'.$tabbarItemSVG.'-active.svg';
?>
                            <span class="tabName"><?=$tabbarItemName?></span>
                        </a>
                    </li>