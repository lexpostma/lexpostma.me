            <header id="titleHeader">
                <span id="mainTitle"><a href="<? echo $baseURL ?>"><? echo $pageTitle ?></a></span>
                <a id="mainLogo" href="/">
                    <svg width="100px" height="100px" viewBox="0 0 1160 1160" preserveAspectRatio="xMinYMin meet">
                        <g fill-rule="evenodd">
                            <path d="M0,0 L1160,0 L1160,1160 L0,1160 L0,0 Z M80,80 L80,1080 L499.462983,1080 L533,1000 L160,1000 L160,80 L80,80 Z M500,80 L240,80.0000026 L240,920 L566,920 L600,840 L320,840 L320,520 L685,520 L651,440 L320,440 L320,160 L534,160 L500,80 Z M665,80 L580,80 L788,580 L580,1080 L665,1080 L830,682 L995,1080 L1080,1080 L872,580 L1080,80 L995,80 L829.999995,477 L665,80 Z"></path>
                        </g>
                    </svg>
                </a>
            </header>
           <nav id="secondNavigation">
                <ul>
<?
    if( $basepage == 'blog' ){
?>
                    <li><a href="#">Subscribe</a></li>
                    <li><a href="<? echo $blogTwitterURL ?>"><i class="fa fa-twitter"></i></a></li>
<?
    } elseif ( $basepage == 'resume' ){
?>
                    <li><a href="#references">References</a></li>
                    <li><a href="<? echo $linkedinURL ?>"><i class="fa fa-linkedin-square"></i></a></li>
<?
    } 
?>
                </ul>
            </nav>