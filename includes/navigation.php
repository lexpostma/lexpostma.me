<?
# ================================================================= #
# ====     Title bar and secundary navigation are in index.php ==== #
# ================================================================= #
?>

        <div id="navigationElements" class="<? echo $basepageTwo ?>">

<!—------------------------------
   | Primary navigation, tab bar |
   ------------------------------->

            <nav id="tabbarNavigation">
                <ul>

<?
    if( $basepageTwo !== 'home' && $basepageTwo !== 'filtered' ){
?>
                    <li class="tabbarItem" id="tabbarSpecialButton">
                        <a href="<?=$baseURL?>" title="Back to <? echo $pageTitle ?>" class="noLabel"><? include 'navigationIcons/back.svg'  ?></a>
                    </li>
<?        
    } elseif( $basepage == 'about' ){
?>
                    <li class="tabbarItem" id="tabbarSpecialButton">
                        <a href="#" title="Get in touch!" onclick="toggleDrawer(); 
                                                                   changeItem('tabbarTooltip')">
                            <? include 'navigationIcons/contact.svg'  ?>
                            <div id="tabbarTooltip">
                                <span>Get in touch!</span>
                                <div></div>
                            </div>
                            <span class="tabName">Let's talk</span>
                        </a>
                        <? include 'navigationActionDrawer.php'  ?>
                    </li>
<?        
    } elseif( $basepage == 'resume' ){
?>
                    <li class="tabbarItem" id="tabbarSpecialButton">
                        <a href="#" title="Download my resume" onclick="toggleDrawer(); 
                                                                        changeItem('tabbarTooltip')">
                            <? include 'navigationIcons/download.svg'  ?>
                            <div id="tabbarTooltip">
                                <span>Download my resume</span>
                                <div></div>
                            </div>
                            <span class="tabName">Download</span>
                        </a>
                        <? include 'navigationActionDrawer.php'  ?>
                    </li>
<?        
    } else {
?>
                    <li class="tabbarItem" id="tabbarSpecialButton">
                        <a href="#" title="Filter <? echo $pageTitle ?>" onclick="toggleDrawer()"  >
                            <? include 'navigationIcons/filter.svg' ?>
                            <span class="tabName">Filters & more</span>
                        </a>
                        <? include 'navigationActionDrawer.php'  ?>
                    </li>
<?
    }
?>

<!—------------------------
   | Main navigation items |
   ------------------------->

                    <li class="tabbarItem">
                        <a href="<?=$portURL?>" title="Portfolio" class="<? if( $basepage == 'portfolio'){ echo('active'); } ?>" >
                            <? include 'navigationIcons/portfolio.svg'?>
                            <span class="tabName">Portfolio</span>
                        </a>
                    </li>
                    <li class="tabbarItem">
                        <a href="<?=$blogURL?>" title="Blog"      class="<? if( $basepage == 'blog'){      echo('active'); } ?>" >
                            <? include 'navigationIcons/blog.svg'     ?>
                            <span class="tabName">Blog</span>
                        </a>
                    </li>
                    <li class="tabbarItem">
                        <a href="<?=$resuURL?>" title="Resume"    class="<? if( $basepage == 'resume'){    echo('active'); } ?>" >
                            <? include 'navigationIcons/resume.svg'   ?>
                            <span class="tabName">Resumé</span>
                        </a>
                    </li>
                    <li class="tabbarItem">
                        <a href="<?=$abouURL?>" title="About Lex" class="<? if( $basepage == 'about'){     echo('active'); } ?>" >
                            <? include 'navigationIcons/about.svg'    ?>
                            <span class="tabName">About Lex</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>