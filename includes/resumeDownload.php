<?
/*
    Original flag icons from 
    https://commons.wikimedia.org/wiki/File:Square_Flag_of_the_United_Kingdom.svg
    https://commons.wikimedia.org/wiki/File:Flag_of_the_Netherlands.svg
*/
?>

<ul class="cellRowGroup">
    <li class="cellRow resumeDownloadItem">
        <a href="/public-files/CV-Lex-Postma-en-web.pdf" 
                target="_blank" title="Download a pdf of my resumé in English" 
                onclick="ga('send', 'event', 'Navigation', 'Download', 'Resumé pdf English');">
            <div class="cellIcon"><? include 'navigationIcons/flagGB.svg'  ?></div>
            <span class="cellLabel">Resumé in English</span>
            <div class="cellClosingIcon download"><? include 'navigationIcons/download.svg'  ?></div>
        </a>
    </li>
    <li class="cellRow resumeDownloadItem">
        <a href="/public-files/CV-Lex-Postma-nl-web.pdf" 
                target="_blank" title="Download een pdf van mijn cv in het Nederlands" 
                    onclick="ga('send', 'event', 'Navigation', 'Download', 'Resumé pdf Nederlands');">
            <div class="cellIcon"><? include 'navigationIcons/flagNL.svg'  ?></div>
            <span class="cellLabel">CV in het Nederlands</span>
            <div class="cellClosingIcon download"><? include 'navigationIcons/download.svg'  ?></div>
        </a>
    </li>
</ul>