<div class="portfolioHeader">
    <img class="portfolioHeaderImage" src="<?=$headerImage?>">

</div>

<article class="portfolioPost" id="start">

    <h1><?=$plainTitle?></h1>

<?
    echo $body;

    if ( $photoGallery != '' ){
        echo '<div class="portfolioPhotoGallery" itemscope itemtype="http://schema.org/ImageGallery">'.$photoGallery.'</div>';
        include('photoSwipeElements.php');
    };

?>

    <ul class="cellRowGroup" id="quickDetailsSidebar">
        <div id="quickDetailsSidebarToggler" onclick="toggleDetails()"></div>
        <li class="cellRow" id="quickDetailsRow">
            <a class="cellRowContent" href="#" onclick="toggleDetails()">
                <div class="cellIcon"><i class="fa fa-fw fa-ellipsis-v"></i></div>
                <span class="cellLabel">Quick details</span>
                <div class="cellClosingIcon plus"><? include 'navigationIcons/plus.svg'  ?></div>
            </a>
            
        </li>
        
        
<?
    echo $portfolioFooterCells;  
?>

        <li class="cellRow">
            <a class="cellRowContent" href="mailto:hello@lexpostma.me?subject=<?=$plainTitle?>" title="Email Lex">
                <div class="cellIcon"><i class="fa fa-fw fa-question-circle"></i></div>
                <span class="cellLabel">Want to know more about <?=$plainTitle?>? Don’t hesitate to email me.</span>
                <div class="cellClosingIcon chevron"><? include 'navigationIcons/chevron.svg'  ?></div>
            </a>
        </li>
    
        <li class="cellRow">
            <div class="cellRowContent shareRow">
                <div class="cellIcon sharingGeneralIcon"><i class="fa fa-fw fa-share-square-o"></i></div>
                <span class="cellLabel">
                    <? $shareFrom = 'Portfolio'; include 'sharing.php';?>
                </span>
            </div>
        </li>
    </ul>
</article>

<script>
    
    function toggleDetails() {
        $('#quickDetailsSidebar').toggleClass('open');
    }
    
</script>



<aside class="overviewPortfolio otherProjects">
    <h2>Check out these other projects&hellip;</h2>
<?
    $otherProjectsPortfolioResult = mysqli_query($con,$otherProjectsPortfolioSQLquery);

    while($row = mysqli_fetch_array($otherProjectsPortfolioResult)){
        include 'portfolioOverviewItem.php';

/*
        include 'portfolioVariables.php';
        echo '<div class="otherPortfolioItem">';

?>    
        <a href="/<?=$shortname?>" style="background-image: url(/public-files/images/portfolio/<?=$shortname?>-1.png);" title="<?=$plainTitle?>">
<!--
            <div class="portfolioItemText">
                <span class="portfolioItemTitle"><?=$plainTitle?></span>
                <span class="portfolioItemSummary"><?=$summary?></span>
            </div>
-->
        </a>

<?
        echo '</div>';
*/
    };

?>
</aside>