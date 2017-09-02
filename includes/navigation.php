        <header id="titleHeader">
            <span id="mainTitle"><? echo $pageTitle ?></span>
            <a id="mainLogo" href="/">
                <svg width="100px" height="100px" viewBox="0 0 1160 1160" preserveAspectRatio="xMinYMin meet">
                    <g fill-rule="evenodd">
                        <path d="M0,0 L1160,0 L1160,1160 L0,1160 L0,0 Z M80,80 L80,1080 L499.462983,1080 L533,1000 L160,1000 L160,80 L80,80 Z M500,80 L240,80.0000026 L240,920 L566,920 L600,840 L320,840 L320,520 L685,520 L651,440 L320,440 L320,160 L534,160 L500,80 Z M665,80 L580,80 L788,580 L580,1080 L665,1080 L830,682 L995,1080 L1080,1080 L872,580 L1080,80 L995,80 L829.999995,477 L665,80 Z"></path>
                    </g>
                </svg>
            </a>
        </header>
        <nav id="mainNavigation">

<?
    if( $basepageTwo !== 'home' ){
?>
            <a href="<?=$baseURL?>" title="Back to <? echo $pageTitle ?>"><? include 'navigationIcons/back.svg'  ?></a>
<?        
    } else {
?>
            <a href="#"             title="Filter <? echo $pageTitle ?>"><? include 'navigationIcons/filter.svg' ?></a>
<?        
    }
?>
            <a href="<?=$portURL?>" title="Portfolio" class="<? if( $basepage == 'portfolio'){ echo('active'); } ?>" ><? include 'navigationIcons/portfolio.svg'?><span>Portfolio</span></a>
            <a href="<?=$blogURL?>" title="Blog"      class="<? if( $basepage == 'blog'){      echo('active'); } ?>" ><? include 'navigationIcons/blog.svg'     ?><span>Blog</span></a>
            <a href="<?=$resuURL?>" title="Resume"    class="<? if( $basepage == 'resume'){    echo('active'); } ?>" ><? include 'navigationIcons/resume.svg'   ?><span>Resumé</span></a>
            <a href="<?=$abouURL?>" title="About me"  class="<? if( $basepage == 'about'){     echo('active'); } ?>" ><? include 'navigationIcons/about.svg'    ?><span>About me</span></a>
        </nav>