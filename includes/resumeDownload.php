<?
/*
    Original flag icons from 
    https://commons.wikimedia.org/wiki/File:Square_Flag_of_the_United_Kingdom.svg
    https://commons.wikimedia.org/wiki/File:Flag_of_the_Netherlands.svg
*/
?>

<ul class="cellRowGroup">
    <lh><strong>Download pdf</strong></lh>
    <li class="cellRow resumeDownloadItem">
        <a class="cellRowContent" href="/public-files/CV-Lex-Postma-en-web.pdf" 
                download="Lex Postma, web-resume (<? echo date('n/Y')?>).pdf"
                target="_blank" title="Download a pdf of my resumé in English" 
                onclick="ga('send', 'event', 'Navigation', 'Download', 'Resumé pdf English');">
            <div class="cellIcon fileNflag">
                <i class="fa fa-fw fa-file-pdf-o"></i>
                <? include 'navigationIcons/flagGB.svg'  ?>
            </div>
            <span class="cellLabel">Resumé in English</span>
            <div class="cellClosingIcon download"><? include 'navigationIcons/download.svg'  ?></div>
        </a>
    </li>
    <li class="cellRow resumeDownloadItem">
        <a class="cellRowContent" href="/public-files/CV-Lex-Postma-nl-web.pdf" 
                download="Lex Postma, web-CV (<? echo date('n/Y')?>).pdf"
                target="_blank" title="Download een pdf van mijn cv in het Nederlands" 
                onclick="ga('send', 'event', 'Navigation', 'Download', 'Resumé pdf Nederlands');">
            <div class="cellIcon fileNflag">
                <i class="fa fa-fw fa-file-pdf-o"></i>
                <? include 'navigationIcons/flagNL.svg'  ?>
            </div>
            <span class="cellLabel">CV in het Nederlands</span>
            <div class="cellClosingIcon download"><? include 'navigationIcons/download.svg'  ?></div>
        </a>
    </li>
</ul>

<ul class="cellRowGroup">
    <li class="cellRow">
        <a class="cellRowContent" href="<?=$linkedinURL?>">
            <div class="cellIcon linkedin"><i class="fa fa-fw fa-linkedin"></i></div>
            <span class="cellLabel">LinkedIn</span>
            <div class="cellClosingIcon chevron"><? include 'navigationIcons/chevron.svg'  ?></div>
        </a>
    </li>

    <li class="cellRow">
        <a class="cellRowContent" href="javascript:window.print()">
            <div class="cellIcon"><i class="fa fa-fw fa-print"></i></div>
            <span class="cellLabel">Print</span>
            <div class="cellClosingIcon chevron"><? include 'navigationIcons/chevron.svg'  ?></div>
        </a>
    </li>
</ul>

