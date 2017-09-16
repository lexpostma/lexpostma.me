                    <li class="tabbarItem">
                        <a class="tabbarLink <? if( $basepage == $tabbarItemName){ echo(' active '); }; echo( $tabbarItemName ); ?> " 
                                href="<?=$tabbarItemURL?>" 
                                onclick="ga(<?=$gaMainNavEvent?> '<?=$tabbarItemTitle?>');"
                                title="<?=$tabbarItemTitle?>" >
                            <? 
                                if( $basepage == $tabbarItemName){
                                    include 'navigationIcons/'.$tabbarItemName.'-active.svg';
                                } else {
                                    include 'navigationIcons/'.$tabbarItemName.'.svg';
                                }
                            ?>
                            <span class="tabName"><?=$tabbarItemTitle?></span>
                        </a>
                    </li>