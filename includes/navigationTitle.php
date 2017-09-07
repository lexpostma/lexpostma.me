            <header id="titleHeader">
                <span id="mainTitle"><a href="<?=$baseURL ?>"><?=$basepageTitle ?></a></span>
                <a id="mainLogo" href="/">
                    <? include '../public_html/images/lex-logo.svg'; ?>
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