        <header id="titleHeader">
            <? echo $pageTitle ?>
            Logo
        </header>
        <nav id="mainNavigation">
            <a href="/"             title="Go back"                                                                        ><? include 'navigationIcons/back.svg'     ?></a>
            <a href="<?=$portURL?>" title="Portfolio" class="<? if( $navigationName == 'portfolio'){ echo('active'); } ?>" ><? include 'navigationIcons/portfolio.svg'?><span>Portfolio</span></a>
            <a href="<?=$blogURL?>" title="Blog"      class="<? if( $navigationName == 'blog'){ echo('active'); }      ?>" ><? include 'navigationIcons/blog.svg'     ?><span>Blog</span></a>
            <a href="<?=$resuURL?>" title="Resume"    class="<? if( $navigationName == 'resume'){ echo('active'); }    ?>" ><? include 'navigationIcons/resume.svg'   ?><span>Resumé</span></a>
            <a href="<?=$abouURL?>" title="About me"  class="<? if( $navigationName == 'about'){ echo('active'); }     ?>" ><? include 'navigationIcons/about.svg'    ?><span>About me</span></a>
        </nav>