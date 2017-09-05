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

<?
    if( $basepageTwo !== 'home' && $basepageTwo !== 'filtered' ){
?>
                <a href="<?=$baseURL?>" title="Back to <? echo $pageTitle ?>" class="noLabel"><? include 'navigationIcons/back.svg'  ?></a>
<?        
    } elseif( $basepage == 'about' ){
?>
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
<?        
    } elseif( $basepage == 'resume' ){
?>
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
<?        
    } else {
?>
                <a href="#" title="Filter <? echo $pageTitle ?>" onclick="toggleDrawer()"  >
                    <? include 'navigationIcons/filter.svg' ?>
                    <span class="tabName">Filters & more</span>
                </a>
                        <? include 'navigationActionDrawer.php'  ?>
<?
    }
?>

<!—------------------------
   | Main navigation items |
   ------------------------->

                <a href="<?=$portURL?>" title="Portfolio" class="<? if( $basepage == 'portfolio'){ echo('active'); } ?>" >
                    <? include 'navigationIcons/portfolio.svg'?>
                    <span class="tabName">Portfolio</span>
                </a>
                <a href="<?=$blogURL?>" title="Blog"      class="<? if( $basepage == 'blog'){      echo('active'); } ?>" >
                    <? include 'navigationIcons/blog.svg'     ?>
                    <span class="tabName">Blog</span>
                </a>
                <a href="<?=$resuURL?>" title="Resume"    class="<? if( $basepage == 'resume'){    echo('active'); } ?>" >
                    <? include 'navigationIcons/resume.svg'   ?>
                    <span class="tabName">Resumé</span>
                </a>
                <a href="<?=$abouURL?>" title="About Lex" class="<? if( $basepage == 'about'){     echo('active'); } ?>" >
                    <? include 'navigationIcons/about.svg'    ?>
                    <span class="tabName">About Lex</span>
                </a>
            </nav>
        </div>